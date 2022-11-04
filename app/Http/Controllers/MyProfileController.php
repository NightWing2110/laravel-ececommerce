<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProfileController extends Controller
{
    public function profile()
    {
        $information = User::where('id', Auth::id())->first();
        return view('frontend.myprofile.myprofile', compact('information'));
    }

    public function edit($id)
    {
        $information = User::find($id);
        return view('frontend.myprofile.edit', compact('information'));
    }

    public function update(Request $request, $id)
    {
        $information = User::find($id);
        $information->name = $request->name;
        $information->lname = $request->lname;
        $information->email = $request->email;
        $information->phone = $request->phone;
        $information->address1 = $request->address1;
        $information->address2 = $request->address2;
        $information->city = $request->city;
        $information->state = $request->state;
        $information->country = $request->country;
        $information->pincode = $request->pincode;
        $information->update();

        return redirect()->route('my-profile')->with('status', 'Updated Profile Successfully');
    }
}
