<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $projects = Project::latest()->get();
        return view('admin.project.index', compact('projects'));
    }

    
    
    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.project.create');
    }

    
    
    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'rating'    => 'required|numeric|min:0|max:5',
            'price'     => 'required|numeric|min:0',
            'link'      => 'nullable',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
           $imageName = '';
            if ($image = $request->file('image')) {
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/project'), $imageName);
            }

            $project = Project::create([
                'name'      => $request->name,
                'rating'    => $request->rating,
                'price'     => $request->price,
                'link'      => $request->link,
                'image'     => $imageName,
            ]);

            return response()->json([
                "status" => 200,
                "message" => "Project saved successfully!",
            ]); 
        }
    }

    
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $project = Project::findOrFail($id);
        return view('admin.project.view', compact('project'));
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact('project'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'rating'    => 'required|numeric|min:0|max:5',
            'price'     => 'required|numeric|min:0',
            'link'      => 'nullable',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
           $imageName = '';
            if ($image = $request->file('image')) {
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/project'), $imageName);
            } else {
                $existingProject = Project::findOrFail($id);
                $imageName = $existingProject->image;
            }

            $project = Project::findOrFail($id);
            $project->update([
                'name'      => $request->name,
                'rating'    => $request->rating,
                'price'     => $request->price,
                'link'      => $request->link,
                'image'     => $imageName,
            ]);

            return response()->json([
                "status" => 200,
                "message" => "Project updated successfully!",
            ]);
        }
    }

    
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $project = Project::findOrFail($id);

        if ($project->image && file_exists(public_path('upload/project/' . $project->image))) {
            unlink(public_path('upload/project/' . $project->image));
        }

        $project->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Project deleted successfully!'
        ]);
    }


    
    //=====|| PROJECT TOGGLE STATUS 
    public function toggleStatus(Request $request) {
        $request->validate([
            'id' => 'required|exists:projects,id',
            'status' => 'required|boolean',
        ]);

        $project = Project::find($request->id);
        $project->status = $request->status;
        $project->save();

        return response()->json([
            'status' => 'success',
            'new_status' => $project->status
        ]);
    }
}