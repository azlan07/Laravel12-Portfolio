<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string'
        ]);

        // Send email
        Mail::to('contact@azlan.dev')->send(new ContactFormMail($validated));

        return back()->with('success', 'Thank you for your message. I will get back to you soon!');
    }
}