<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\CrimePending;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CrimeType;

class CrimeController extends Controller
{
    public function displayCrimereport()
    {
        $user = Auth::user();
        $crimeTypes = CrimeType::all()->sortBy(function($type) {
            return strtolower($type->crime_type_name) === 'other' ? 1 : 0;
        });
        return view('user.report', compact('user', 'crimeTypes'));
    }

    public function reportCrime(Request $request)
    {
        // Validate the request data with custom messages
        $validated = $request->validate([
            'report_by' => 'required|string',
            'crime_type' => 'required|string',
            'date' => 'required|date',
            'description' => 'required|string',
            'address' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ], [
            'report_by.required' => 'The Alerter Name is required.',
            'crime_type.required' => 'The Alert Type is required.',
            'date.required' => 'The Report Date is required.',
            'description.required' => 'The Description is required.',
            'latitude.required' => 'Please click on the map to select the incident location.',
            'longitude.required' => 'Please click on the map to select the incident location.',
        ]);
    
        $crimeType = CrimeType::where('crime_type_name', $validated['crime_type'])->first();
    
        if (!$crimeType) {
            return back()->withErrors(['crime_type' => 'Invalid crime type selected.']);
        }
    
        // Create the pending crime record
        CrimePending::create([
            'description' => $validated['description'],
            'date' => $validated['date'],
            'status' => 'pending',
            'longitude' => $validated['longitude'],
            'latitude' => $validated['latitude'],
            'address' => $validated['address'],
            'crime_type' => $crimeType->crime_type_name,
            'reportedby_user_id' => auth()->user()->id,
        ]);
    
        return redirect()->back()->with('success', 'Crime reported successfully!');
    }
    
}
