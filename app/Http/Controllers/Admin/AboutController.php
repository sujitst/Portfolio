<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\MyInformation;
use App\Models\About;


class AboutController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $data['abouts'] = About::orderBy('id', 'desc')->get();
        return view('admin.about.index', $data);
    }



    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        $data['info'] = MyInformation::first();
        return view('admin.about.create', $data);
    }




    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'age'               => 'required',
            'number'            => 'required',
            'nationality'       => 'required',
            'gender'            => 'required',
            'marital_status'    => 'required',
            'dob'               => 'required',
            'description'       => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $abouts = About::create([
                'info_id'        => $request->info_id, 
                'age'            => $request->age,
                'number'         => $request->number,
                'nationality'    => $request->nationality, 
                'gender'         => $request->gender, 
                'marital_status' => $request->marital_status, 
                'dob'            => $request->dob, 
                'description'    => $request->description, 
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => 'About saved sucessfully',
            ]);
        } 
    }



    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $about = About::findOrFail($id);
        return view('admin.about.view', compact('about'));
    }



    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $data['about'] = About::findOrFail($id);
        $data['info'] = MyInformation::first();

        return view('admin.about.edit', $data);
    }



    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'age'            => 'required',
            'number'         => 'required',
            'nationality'    => 'required',
            'gender'         => 'required',
            'marital_status' => 'required',
            'dob'            => 'required',
            'description'    => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'message'   => $validator->errors(),
            ]);
        }

        $about = About::findOrFail($id);

        $about->update([
            'info_id'        => $request->info_id,
            'age'            => $request->age,
            'number'         => $request->number,
            'nationality'    => $request->nationality,
            'gender'         => $request->gender,
            'marital_status' => $request->marital_status,
            'dob'            => $request->dob,
            'description'    => $request->description
        ]);

        return response()->json([
            'status'    => 200,
            'message'   => 'About updated successfully',
        ]);
    }



    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $about = About::findOrFail($id);

        if($about) {
            $about->delete();
            return response()->json([
                'status'    => 200,
                'message'   => 'About Sucessfully deleted.',
            ]);
        }else {
            return response()->json([
                'status'    => 404,
                'message'   => 'About Not Found.',
            ]);
        }
    }
}
