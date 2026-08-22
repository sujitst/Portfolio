<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\MyInformation;


class InformationController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index(Request $request) {
        $infos = MyInformation::latest()->get();
        return view('admin.home.information.index', compact('infos'));
    }




    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.home.information.create');
    }



    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'skills'      => 'required|array|min:1',
            'skills.*'    => 'required|string',
            'cv'          => 'required|mimes:pdf,doc,docx|max:2048',
            'picture'     => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $cvName = '';
        if ($cv = $request->file('cv')) {
            $cvName = time() . '-' . uniqid() . '.' . $cv->getClientOriginalExtension();
            $cv->move(public_path('upload/cv'), $cvName);
        }

        $pictureName = '';
        if ($picture = $request->file('picture')) {
            $pictureName = time() . '-' . uniqid() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('upload/information'), $pictureName);
        }

        $info = MyInformation::create([
            'name'        => $request->name,
            'title'       => $request->title,
            'description' => $request->description,
            'skills'      => json_encode($request->skills),
            'cv'          => $cvName,
            'picture'     => $pictureName,
        ]);

        return response()->json([
            'status'  => 200,
            'message' => 'Information saved successfully!',
        ]);
    }



    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $info = MyInformation::findOrFail($id);
        return view('admin.home.information.show', compact('info'));
    }



    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $info = MyInformation::findOrFail($id);
        return view('admin.home.information.edit', compact('info'));
    }



    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'skills'      => 'required|array|min:1',
            'skills.*'    => 'required|string',
            'cv'          => 'nullable|mimes:pdf,doc,docx|max:2048',
            'picture'     => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $info = MyInformation::findOrFail($id);

        // ===== CV Update =====
        $cvName = $info->cv;
        if ($request->hasFile('cv')) {
            $oldCvPath = public_path('upload/cv/' . $info->cv);
            if ($info->cv && file_exists($oldCvPath)) {
                unlink($oldCvPath);
            }

            $cv = $request->file('cv');
            $cvName = time() . '-' . uniqid() . '.' . $cv->getClientOriginalExtension();
            $cv->move(public_path('upload/cv'), $cvName);
        }

        // ===== Picture Update =====
        $pictureName = $info->picture;
        if ($request->hasFile('picture')) {
            $oldPicPath = public_path('upload/information/' . $info->picture);
            if ($info->picture && file_exists($oldPicPath)) {
                unlink($oldPicPath);
            }

            $picture = $request->file('picture');
            $pictureName = time() . '-' . uniqid() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('upload/information'), $pictureName);
        }

        $info->update([
            'name'        => $request->name,
            'title'       => $request->title,
            'description' => $request->description,
            'skills'      => json_encode($request->skills),
            'cv'          => $cvName,
            'picture'     => $pictureName,
        ]);

        return response()->json([
            'status'  => 200,
            'message' => 'Information updated successfully!',
        ]);
    }




    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $info = MyInformation::findOrFail($id);

        $cvPath = public_path('upload/cv/' . $info->cv);
        if (file_exists($cvPath)) {
            unlink($cvPath);
        }

        $picturePath = public_path('upload/information/' . $info->picture);
        if (file_exists($picturePath)) {
            unlink($picturePath);
        }

        if ($info) {
            $info->delete();
            return response()->json([
                'status'    => 200,
                'message'   => 'Information Successfully deleted.',
            ]);
        } else {
            return response()->json([
                'status'    => 404,
                'message'   => 'Information Not Found.',
            ]);
        }
    }
}