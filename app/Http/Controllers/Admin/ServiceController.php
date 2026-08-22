<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Service;


class ServiceController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }



    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.service.create');
    }

    
    
    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'errors'    => $validator->messages(),
            ]);
        } else {
           $imageName = '';
            if ($image = $request->file('image')) {
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/services'), $imageName);
            }

            $service = Service::create([
                'name'          => $request->name,
                'description'   => $request->description,
                'image'         => $imageName,
            ]);

            return response()->json([
                "status"    => 200,
                "message"   => "Service saved successfully!",
            ]); 
        }
    }

    
    

    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $service = Service::findOrFail($id);
        return view('admin.service.show', compact('service'));
    }

    

    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'description'   => 'required',
            'image'         => 'nullable|mimes:jpg,jpeg,png,svg',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $service = Service::findOrFail($id);

            $imageName = $service->image;
            if ($image = $request->file('image')) {
                if ($service->image && file_exists(public_path('upload/services/' . $service->image))) {
                    unlink(public_path('upload/services/' . $service->image));
                }

                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/services'), $imageName);
            }

            $service->update([
                'name'          => $request->name,
                'description'   => $request->description,
                'image'         => $imageName,
            ]);

            return response()->json([
                "status"    => 200,
                "message"   => "Service updated successfully!",
            ]);
        }
    }



    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $service = Service::findOrFail($id);

        if ($service->image && file_exists(public_path('upload/services/' . $service->image))) {
            unlink(public_path('upload/services/' . $service->image));
        }

        $service->delete();

        return response()->json([
            'status'    => 200,
            'message' => 'Service deleted successfully!'
        ]);
    }
}
