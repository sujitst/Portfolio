<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\SocialMedia;


class SocialMediaController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $medias = SocialMedia::latest()->get();
        return view('admin.social_media.index', compact('medias'));
    }

    
    
    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.social_media.create');
    }

    
    
    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
     public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255|unique:social_media,name',
            'link'  => 'required|url',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/media'), $imageName);
        }

        $media = SocialMedia::create([
            'name'  => $request->name,
            'link'  => $request->link,
            'image' => $imageName,
        ]);

        return response()->json([
            'status'  => 200,
            'message' => 'Social Media Created Successfully',
        ]);
    }

    
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $media = SocialMedia::findOrFail($id);
        return view('admin.social_media.show', compact('media'));
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $media = SocialMedia::findOrFail($id);
        return view('admin.social_media.edit', compact('media'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'name'  => 'nullable|string|max:255',
            'link'  => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $media = SocialMedia::findOrFail($id);

        if ($image = $request->file('image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/media'), $imageName);

            if ($media->image && file_exists(public_path('upload/media/' . $media->image))) {
                unlink(public_path('upload/media/' . $media->image));
            }

            $media->image = $imageName;
        }


        if($request->name) {
            $media->name = $request->name;
        }
        if($request->link) {
            $media->link = $request->link;
        }

        $media->save();

        return response()->json([
            'status'    => 200,
            'message'   => 'Social Media Updated Successfully',
        ]);
    }

    

    
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $media = SocialMedia::findOrFail($id);

        if ($media->image && file_exists(public_path('upload/media/' . $media->image))) {
            unlink(public_path('upload/media/' . $media->image));
        }
        $media->delete();

        return response()->json([
            'status'    => 200,
            'message'   => 'Social Media Deleted Successfully',
        ]);
    }
}
