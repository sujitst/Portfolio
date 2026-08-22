<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Mycontact;


class MyContactController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $contacts = Mycontact::latest()->get();
        return view('admin.my_contact.index', compact('contacts'));
    }

    
    
    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.my_contact.create');
    }

    
    
    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'info'  => 'required',
            'icon'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $mycontact = Mycontact::create([
            'name'  => $request->name,
            'info'  => $request->info,
            'icon' => $request->icon,
        ]);

        return response()->json([
            'status'  => 200,
            'message' => 'My contact created Successfully',
        ]);
    }

    
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $contact = Mycontact::findOrFail($id);
        return view('admin.my_contact.show', compact('contact'));
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $contact = Mycontact::findOrFail($id);
        return view('admin.my_contact.edit', compact('contact'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'info' => 'required|string',
            'icon' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $myContact = MyContact::findOrFail($id);
        $myContact->update([
            'name' => $request->name,
            'info' => $request->info,
            'icon' => $request->icon,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'My Contact updated successfully',
        ]);
    }


    
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $myContact = MyContact::findOrFail($id);

        $myContact->delete();

        return response()->json([
            'status' => 200,
            'message' => 'My contact deleted successfully',
        ]);
    }
}
