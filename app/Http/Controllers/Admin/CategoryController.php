<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $categories = Category::latest()->get();
        return view('admin.gallery.category.index', compact('categories'));
    }

    
    
    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.gallery.category.create');
    }

    

    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'errors'    => $validator->errors(),
            ]);
        } else {
            $categories = Category::create([
                'name'  => $request->name,
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => 'Category create sucessfully.',
            ]);
        }
    }

   
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $category = Category::findOrFail($id);
        return view('admin.gallery.category.show', compact('category'));
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $category = Category::findOrFail($id);
        return view('admin.gallery.category.edit', compact('category'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 400,
                'errors'    => $validator->errors(),
            ]);
        }

        $category = Category::findOrFail($id);

        if(!$category) {
            return response()->json([
                'status'    => 400,
                'message'   => 'Data NOt Found',
            ]);
        } else {
            $category->update([
                'name'  => $request->name,
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => 'Category Update Sucessfully.',
            ]);
        }
    }

    
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $category = Category::findOrFail($id);
        
        if($category) {
            $category->delete();
            return response()->json([
                'status'    => 200,
                'message'   => 'Category Sucessfully deleted.',
            ]);
        } else {
            return response()->json([
                'status'    => 400,
                'message'   => 'Category Not Found.',
            ]);
        }
    }
}
