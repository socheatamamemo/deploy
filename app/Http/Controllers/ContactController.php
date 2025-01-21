<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function createGuest()
    {
        return view('guest.contactUsGuest');
    }

    public function createAuth()
    {
        $user = Auth::user();
        return view('user.contactUsAuth',compact('user'));
    }

    public function storeGuest(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        try {
            Contact::create($validatedData);
            return redirect()->route('contact.guestCreate')->with('success', 'Your message has been sent!Support Team will respond you back as soon as possible.Thank You!');
        } catch (\Exception $e) {
            return redirect()->route('contact.guestCreate')->withErrors(['error' => 'Failed to save data: ' . $e->getMessage()]);
        }
    }

    public function storeAuth(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        try {
            $contact = new Contact($validatedData);
            $contact->user_id = Auth::id(); // Associate the contact with the authenticated user
            $contact->email_address = Auth::user()->email; // Use authenticated user's email
            $contact->save();

            return redirect()->route('user.contactUsAuth')->with('success', 'Your message has been sent!');
        } catch (\Exception $e) {
            return redirect()->route('user.contactUsAuth')->withErrors(['error' => 'Failed to save data: ' . $e->getMessage()]);
        }
    }
}
