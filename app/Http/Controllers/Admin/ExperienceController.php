<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Experienc;


class ExperienceController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $experience = Experienc::latest()->get();
        return view('admin.experience.index', compact('experience'));
    }

    
    
    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.experience.create');
    }

    
    
    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = validator::make($request->all(), [
            'exp_name'          => 'required',
            'exp_date_time'     => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'       => 400,
                'errors'       => $validator->errors(),
            ]);
        } else {
            $experience = Experienc::create([
                'exp_name'      => $request->exp_name,
                'exp_date_time' => $request->exp_date_time,
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => 'Experience save sucessfully.',
            ]);
        }
    }

    
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $experience = Experienc::findOrFail($id);
        return view('admin.experience.view', compact('experience'));
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $experience = Experienc::findOrFail($id);
        return view('admin.experience.edit', compact('experience'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = validator::make($request->all(), [
            'exp_name'          => 'required',
            'exp_date_time'     => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'errors'    => $validator->errors(),
            ]);
        }

        $experience = Experienc::findOrFail($id);

        if(!$experience) {
            return response()->json([
                'status'    => 400,
                'message'   => 'Data not Found!',
            ]);
        } else {
            $experience->update([
                'exp_name'      => $request->exp_name,
                'exp_date_time' => $request->exp_date_time,
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => 'Experience Update sucessfully.',
            ]);
        }
    }

    
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $experience = Experienc::findOrFail($id);
        if($experience) {
            $experience->delete();
            return response()->json([
                'status'    => 200,
                'message'   => 'Experience Sucessfully deleted.',
            ]);
        }else {
            return response()->json([
                'status'    => 404,
                'message'   => 'Experience Not Found.',
            ]);
        }    
    }
}