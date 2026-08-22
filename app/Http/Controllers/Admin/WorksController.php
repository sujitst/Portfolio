<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Works;


class WorksController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $works = Works::orderBy('id', 'desc')->get();
        return view('admin.home.works.index', compact('works'));
    }



    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.home.works.create');
    }



    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'number'    => 'required',
            'picture'   => 'required|mimes:jpg,jpeg,png',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
           $pictureName = '';
            if ($picture = $request->file('picture')) {
                $pictureName = time() . '-' . uniqid() . '.' . $picture->getClientOriginalExtension();
                $picture->move(public_path('upload/works'), $pictureName);
            }

            $works = Works::create([
                'name'      => $request->name,
                'number'    => $request->number,
                'picture'   => $pictureName,
            ]);

            return response()->json([
                "status"    => 200,
                "message"   => "Works saved successfully!",
            ]); 
        } 
    }




    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $work = Works::findOrFail($id);
        return view('admin.home.works.view', compact('work'));
    }



    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $work = Works::findOrFail($id);
        return view('admin.home.works.edit', compact('work'));
    }



    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'name'      => 'nullable',
            'number'    => 'nullable',
            'picture'   => 'nullable|mimes:jpg,jpeg,png',
        ]);

        $work = Works::findOrFail($id);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $pictureName = $work->picture;
            if ($request->hasFile('picture')) {
                if ($pictureName && file_exists(public_path('upload/works/' . $pictureName))) {
                    unlink(public_path('upload/works/' . $pictureName));
                }
                $picture = $request->file('picture');
                $pictureName = time() . '-' . uniqid() . '.' . $picture->getClientOriginalExtension();
                $picture->move(public_path('upload/works'), $pictureName);
            }

            $work->update([
                'name'    => $request->name,
                'number'  => $request->number,
                'picture' => $pictureName,
            ]);

            return response()->json([
                'status'  => 200,
                'message' => 'Work updated successfully!',
            ]);
        }
    }



    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $works = Works::findOrFail($id);

        $imagePath = public_path('upload/works/' . $works->picture);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        if($works) {
            $works->delete();
            return response()->json([
                'status'    => 200,
                'message'   => 'Works Sucessfully deleted.',
            ]);
        }else {
            return response()->json([
                'status'    => 404,
                'message'   => 'Works Not Found.',
            ]);
        }
    }
}