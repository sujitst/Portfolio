<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Works;


class WorksController extends Controller
{
   public function index() {
      $works = Works::latest()->get();
      return response()->json([
         'success' => true,
         'message' => 'successfully works retrieved.',
         'data' => $works,
      ], 200);
   }



   public function store(Request $request) {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'number' => 'required',
         'picture' => 'required|mimes:jpg,jpeg,png',
      ]);

      if($validator->fails()) {
         return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
         ], 422);
      } else {
         $pictureName = '';
         if ($picture = $request->file('picture')) {
            $pictureName = time() . '-' . uniqid() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('upload/works'), $pictureName);
         }

         $works = Works::create([
            'name' => $request->name,
            'number' => $request->number,
            'picture' => $pictureName,
         ]);

         return response()->json([
            "success" => true,
            "message" => "Works saved successfully!",
            "data" => $works
         ], 201); 
      } 
   }



   public function edit($id) {
      $work = Works::find($id);

      if (!$work) {
         return response()->json([
               'success' => false,
               'message' => 'Work not found',
               'errors' => [],
         ], 404);
      }

      return response()->json([
         'success' => true,
         'message' => 'Work retrieved successfully',
         'data' => $work,
      ], 200);
   }




   public function update(Request $request, $id) {
      $work = Works::find($id);

      if (!$work) {
         return response()->json([
               'success' => false,
               'message' => 'Work not found',
               'errors' => [],
         ], 404);
      }

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|max:255',
         'number' => 'required|string|max:50',
         'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
      ]);

      if ($validator->fails()) {
         return response()->json([
               'success' => false,
               'message' => 'Validation failed',
               'errors' => $validator->errors(),
         ], 422);
      }

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
         'name' => $request->name,
         'number' => $request->number,
         'picture' => $pictureName,
      ]);

      return response()->json([
         'success' => true,
         'message' => 'Work updated successfully',
         'data' => $work,
      ], 200);
   }



   public function destroy($id) {
      $work = Works::find($id);

      if (!$work) {
         return response()->json([
               'success' => false,
               'message' => 'Work not found',
               'errors' => [],
         ], 404);
      }

      if ($work->picture && file_exists(public_path('upload/works/' . $work->picture))) {
         unlink(public_path('upload/works/' . $work->picture));
      }
      $work->delete();

      return response()->json([
         'success' => true,
         'message' => 'Work deleted successfully',
      ], 200);
   }

}
