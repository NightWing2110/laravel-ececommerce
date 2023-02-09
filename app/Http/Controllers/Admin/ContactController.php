<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function contacts()
    {
        $contact = DB::table('contacts')->simplePaginate(5);
        return view('admin.contact', compact('contact'));
    }

    public function delete($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('contact')->with('status', 'Delete Contact Successfully');
    }
}
