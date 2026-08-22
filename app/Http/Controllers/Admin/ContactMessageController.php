<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class ContactMessageController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function contact() {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }



    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show($id) {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.show', compact('contact'));
    }




    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy($id) {
        Contact::findOrFail($id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Contact deleted successfully'
        ]);
    }
}
