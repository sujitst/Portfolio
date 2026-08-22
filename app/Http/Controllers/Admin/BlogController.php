<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Blog;



class BlogController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

    

    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        $users = User::all();
        return view('admin.blog.create', compact('users'));
    }

    
    
    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'user_id'       => 'required|exists:users,id',
            'image'         => 'required|array',
            'image.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       if($validator->fails()) {
           return response()->json([
            'status'    => 400,
            'errors'    => $validator->errors(),
            ]);
       } else {
           $imageNames = [];
            if($request->hasFile('image')) {
                foreach($request->file('image') as $image) {
                    $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('upload/blog'), $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $blog = Blog::create([
               'title'          => $request->title,
               'description'    => $request->description,
               'user_id'        => $request->user_id,
               'image'          => json_encode($imageNames),
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => 'Blog Created Successfully',
            ]);
       }
    }

    
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.show', compact('blog'));
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $blog = Blog::findOrFail($id);
        $users = User::all();
        return view('admin.blog.edit', compact('blog', 'users'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'user_id'       => 'required|exists:users,id',
            'image'         => 'nullable|array',
            'image.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors'    => $validator->errors(),
            ]);
        } else {
            $blog = Blog::findOrFail($id);
            $imageNames = json_decode($blog->image, true) ?? [];

            if($request->has('removed_images')) {
                foreach($request->removed_images as $removed) {
                    if(($key = array_search($removed, $imageNames)) !== false) {
                        unset($imageNames[$key]);
                        if(file_exists(public_path('upload/blog/' . $removed))) {
                            unlink(public_path('upload/blog/' . $removed));
                        }
                    }
                }
                $imageNames = array_values($imageNames);
            }

            if($request->hasFile('image')) {
                foreach($request->file('image') as $image) {
                    $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('upload/blog'), $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $blog->update([
                'title'          => $request->title,
                'description'    => $request->description,
                'user_id'        => $request->user_id,
                'image'          => json_encode($imageNames),
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => 'Blog Updated Successfully',
            ]);
        }
    }


    
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $blog = Blog::findOrFail($id);
        $images = json_decode($blog->image, true) ?? [];

        foreach ($images as $image) {
            if (file_exists(public_path('upload/blog/' . $image))) {
                unlink(public_path('upload/blog/' . $image));
            }
        }

        $blog->delete();

        return response()->json([
            'status'    => 200,
            'message'   => 'Blog Deleted Successfully',
        ]);
    }



    //=====|| TOGGLE THE STATUS OF THE SPECIFIED RESOURCE.
    public function toggleStatus(Request $request) {
         $request->validate([
            'id' => 'required|exists:blogs,id',
            'status' => 'required|boolean',
        ]);

        $blog = Blog::find($request->id);
        $blog->status = $request->status;
        $blog->save();

        return response()->json([
            'status' => 'success',
            'new_status' => $blog->status
        ]);
    }
}