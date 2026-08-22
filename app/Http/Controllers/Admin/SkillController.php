<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Skills;


class SkillController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $skills = Skills::latest()->get();
        return view('admin.skills.index', compact('skills'));
    }

    
    
    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.skills.create');
    }

    
    
    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'percent'   => 'required|numeric|min:0|max:100',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'errors'    => $validator->errors(),
            ]);
        }

        $skills = Skills::create([
            'name'      => $request->name,
            'percent'   => $request->percent, 
        ]);

        return response()->json([
            'status'  => 200,
            'message' => 'Skill created successfully.',
        ]);
    }


    
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $skill = Skills::findOrFail($id);
        return view('admin.skills.view', compact('skill'));
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $skill = Skills::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'percent'   => 'required|numeric|min:0|max:100',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'      => 400,
                'errors'      => $validator->errors(),
            ]);
        }

        $skill = Skills::findOrFail($id);

        if(!$skill) {
            return response()->json([
                'status'    => 400,
                'message'   => 'Data Not Found',
            ]);
        } else {
            $skill->update([
                'name'      => $request->name,
                'percent'   => $request->percent,
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => 'Skill Update Sucessfully',
            ]);
        }
    }

    
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $skill = Skills::findOrFail($id);

        if($skill) {
           $skill->delete();
           return response()->json([
                'status'    => 200,
                'message'   => 'Skill Sucessfully deleted.',
           ]);
        } else {
            return response()->json([
                'status'    => 200,
                'message'   => 'Skill Not Found!',
            ]);
        } 
    }
}