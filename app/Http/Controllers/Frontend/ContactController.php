<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('frontend.contact');
    }

    public function sendcontact(Request $request)
    {
        Contact::create($request->all());
        return redirect('/')->with('status', 'Send Contact Successfully');
    }
}
