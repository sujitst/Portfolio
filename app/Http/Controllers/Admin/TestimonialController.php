<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Testimonial;


class TestimonialController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    
    
    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
       return view('admin.testimonial.create');
    }

    
    
    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'comment'   => 'required|string',
            'rating'    => 'required|numeric|min:0|max:5',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
           $imageName = '';
            if ($image = $request->file('image')) {
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/testimonial'), $imageName);
            }

            $testimonial = Testimonial::create([
                'name'      => $request->name,
                'position'  => $request->position,
                'comment'   => $request->comment,
                'rating'    => $request->rating,
                'image'     => $imageName,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Testimonial Created Successfully',
            ]);
        }
    }

    
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.show', compact('testimonial'));  
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'comment'   => 'required|string',
            'rating'    => 'required|numeric|min:0|max:5',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
           $testimonial = Testimonial::findOrFail($id);

           if ($image = $request->file('image')) {
               $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
               $image->move(public_path('upload/testimonial'), $imageName);
               if ($testimonial->image && file_exists(public_path('upload/testimonial/' . $testimonial->image))) {
                   unlink(public_path('upload/testimonial/' . $testimonial->image));
               }
               $testimonial->image = $imageName;
           }

           $testimonial->name = $request->name;
           $testimonial->position = $request->position;
           $testimonial->comment = $request->comment;
           $testimonial->rating = $request->rating;
           $testimonial->save();

            return response()->json([
                'status'    => 200,
                'message'   => 'Testimonial Updated Successfully',
            ]);
        }
    }

    
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->image && file_exists(public_path('upload/testimonial/' . $testimonial->image))) {
            unlink(public_path('upload/testimonial/' . $testimonial->image));
        }
        $testimonial->delete();

        return response()->json([
            'status'    => 200,
            'message'   => 'Testimonial Deleted Successfully',
        ]);
    }



    //=====|| TOGGLE THE STATUS OF THE SPECIFIED RESOURCE.
    public function toggleStatus(Request $request) {
         $request->validate([
            'id' => 'required|exists:testimonials,id',
            'status' => 'required|boolean',
        ]);

        $testimonial = Testimonial::find($request->id);
        $testimonial->status = $request->status;
        $testimonial->save();

        return response()->json([
            'status' => 'success',
            'new_status' => $testimonial->status
        ]);
    }
}