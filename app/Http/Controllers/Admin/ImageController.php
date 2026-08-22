<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;


class ImageController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $images = Image::latest()->get();
        return view('admin.gallery.images.index', compact('images'));
    }

    
    
    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        $category = Category::all();
        return view('admin.gallery.images.create', compact('category'));
    }

    
    
    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
            'image'         => 'required|mimes:jpg,jpeg,png,gif,webp',
            'video'         => 'required|mimes:mp4,avi,mov,wmv|max:20000',
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
                $image->move(public_path('upload/gallery/images'), $imageName);
            }

            $videoName = '';
            if ($video = $request->file('video')) {
                $videoName = time() . '-' . uniqid() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('upload/gallery/videos'), $videoName);
            }

            $image = Image::create([
                'category_id' => $request->category_id,
                'image'       => $imageName,
                'video'       => $videoName,
                // 'link'        => $request->link,
            ]);

            return response()->json([
                "status"    => 200,
                "message"   => "Image saved successfully!",
            ]); 
        }
    }

    
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $image = Image::findOrFail($id);
        return view('admin.gallery.images.view', compact('image'));
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $image = Image::findOrFail($id);
        $category = Category::all();
        
        return view('admin.gallery.images.edit', compact('image', 'category'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
            'image'         => 'nullable|mimes:jpg,jpeg,png,gif,webp',
            'video'         => 'nullable|mimes:mp4,avi,mov,wmv|max:20000',
        ]); 
        if($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'errors'    => $validator->messages(),
            ]);
        } else {
            $image = Image::findOrFail($id);

            if ($img = $request->file('image')) {
                if ($image->image && file_exists(public_path('upload/gallery/images/' . $image->image))) {
                    unlink(public_path('upload/gallery/images/' . $image->image));
                }
                $imageName = time() . '-' . uniqid() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('upload/gallery/images'), $imageName);
                $image->image = $imageName;
            }

            if ($vid = $request->file('video')) {
                if ($image->video && file_exists(public_path('upload/gallery/videos/' . $image->video))) {
                    unlink(public_path('upload/gallery/videos/' . $image->video));
                }
                $videoName = time() . '-' . uniqid() . '.' . $vid->getClientOriginalExtension();
                $vid->move(public_path('upload/gallery/videos'), $videoName);
                $image->video = $videoName;
            }

            $image->category_id = $request->category_id;
            $image->save(); 

            return response()->json([
                "status"    => 200,
                "message"   => "Image updated successfully!",
            ]);
        }
    }

    
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $image = Image::findOrFail($id);
        if ($image->image && file_exists(public_path('upload/gallery/images/' . $image->image))) {
            unlink(public_path('upload/gallery/images/' . $image->image));
        }
        if ($image->video && file_exists(public_path('upload/gallery/videos/' . $image->video))) {
            unlink(public_path('upload/gallery/videos/' . $image->video));
        }
        $image->delete();

        return response()->json([
            "status"    => 200,
            "message" => "Image deleted successfully!"
        ]);
    }
}