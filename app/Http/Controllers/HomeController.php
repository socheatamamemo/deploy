<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Crime;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.home', compact('user'));
    }

    public function map(Request $request)
    {
        $user = Auth::user();
        $crimes = $request->session()->get('crimes', collect());
        return view('map', compact('user', 'crimes'));
    }

    public function mappage(Request $request)
    {
        $crimes = $request->session()->get('crimes', collect());
        return view('guest.mappage', compact('crimes'));
    }

    public function aboutUspage()
    {
        $user = Auth::user();
        return view('user.aboutUspage', compact('user'));
    }
    
    public function term_policy()
    {
        $user = Auth::user();
        return view('user.term_policy', compact('user'));
    }
    public function overview()
    {
        $user = Auth::user();
        $crimes = Crime::where('reportedby_user_id', $user->id)->get();
        return view('user.overview', compact('user', 'crimes'));
    }

    public function activity()
    {
        $user = Auth::user();
        $activities = Crime::where('reportedby_user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('user.activity', compact('user', 'activities'));
    }

    public function search(Request $request)
    {
        $search_address = $request->input('address');
        $search_date = $request->input('date');

        $crimes = Crime::where('address', 'LIKE', '%' . $search_address . '%')
            ->whereDate('date', $search_date)
            ->get();

        if ($crimes->isEmpty()) {
            return redirect()->back()->with('error', 'No crimes found for the specified address and date.');
        }

        // Store crimes in session and redirect to the map page
        $request->session()->put('crimes', $crimes);
        return redirect()->route('map');
    }
}
