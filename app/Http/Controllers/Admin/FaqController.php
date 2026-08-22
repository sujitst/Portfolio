<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Faq;


class FaqController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $faqs = Faq::latest()->get();
        return view('admin.faq.index', compact('faqs'));
    }

    
    
    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.faq.create');
    }

    

    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = validator::make($request->all(), [
            'question'          => 'required',
            'answer'            => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'       => 400,
                'errors'       => $validator->errors(),
            ]);
        } else {
            $faq = Faq::create([
                'question'      => $request->question,
                'answer'        => $request->answer,
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => 'FAQ saved successfully.',
            ]);
        }
    }

    
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.show', compact('faq'));
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }



    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = validator::make($request->all(), [
            'question'          => 'required',
            'answer'            => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'       => 400,
                'errors'       => $validator->errors(),
            ]);
        } else {
            $faq = Faq::findOrFail($id);
            $faq->update([
                'question'      => $request->question,
                'answer'        => $request->answer,
            ]);

            return response()->json([
                'status'    => 200,
                'message'   => 'FAQ updated successfully.',
            ]);
        }
    }

    
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy($id) {
        FAQ::findOrFail($id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'FAQ deleted successfully'
        ]);
    }

}