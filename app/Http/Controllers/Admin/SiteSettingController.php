<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\SiteSetting;


class SiteSettingController extends Controller
{
    //=====|| DISPLAY A LISTING OF THE RESOURCE.
    public function index() {
        $settings = SiteSetting::all();
        return view('admin.site_setting.index', compact('settings'));
    }

    
    
    //=====|| SHOW THE FORM FOR CREATING A NEW RESOURCE.
    public function create() {
        return view('admin.site_setting.create');
    }

    
    
    //=====|| STORE A NEWLY CREATED RESOURCE IN STORAGE.
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title'             => 'required|string|max:255',
            'sub_title'         => 'required|string|max:255',
            'copyright_name'    => 'required|string|max:255',
            'link'              => 'required|string|max:255',
            'year'              => 'required|string|max:255',
            'logo'              => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
            'fave_icon'         => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        $logoName = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time().'_logo_'.uniqid().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('upload/site-setting'), $logoName);
        }

        $faveIconName = null;
        if ($request->hasFile('fave_icon')) {
            $icon = $request->file('fave_icon');
            $faveIconName = time().'_icon_'.uniqid().'.'.$icon->getClientOriginalExtension();
            $icon->move(public_path('upload/site-setting'), $faveIconName);
        }

        SiteSetting::create([
            'title'             => $request->title,
            'sub_title'         => $request->sub_title,
            'copyright_name'    => $request->copyright_name,
            'link'              => $request->link,
            'year'              => $request->year,
            'logo'              => $logoName,
            'fave_icon'         => $faveIconName,
        ]);

        return response()->json([
            'status'  => 200,
            'message' => 'Site Setting Created Successfully',
        ]);
    }


    
    
    //=====|| DISPLAY THE SPECIFIED RESOURCE.
    public function show(string $id) {
        $setting = SiteSetting::findOrFail($id);
        return view('admin.site_setting.show', compact('setting'));
    }

    
    
    //=====|| SHOW THE FORM FOR EDITING THE SPECIFIED RESOURCE.
    public function edit(string $id) {
        $setting = SiteSetting::findOrFail($id);
        return view('admin.site_setting.edit', compact('setting'));
    }

    
    
    //=====|| UPDATE THE SPECIFIED RESOURCE IN STORAGE.
    public function update(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'title'             => 'required|string|max:255',
            'sub_title'         => 'required|string|max:255',
            'copyright_name'    => 'nullable|string|max:255',
            'link'              => 'nullable|string|max:255',
            'year'              => 'nullable|string|max:255',
            'logo'              => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
            'fave_icon'         => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        $setting = SiteSetting::findOrFail($id);

        $logoName = $setting->logo;
        $faveIconName = $setting->fave_icon;

        if ($request->hasFile('logo')) {
            if ($setting->logo && file_exists(public_path('upload/site-setting/'.$setting->logo))) {
                unlink(public_path('upload/site-setting/'.$setting->logo));
            }
            $logo = $request->file('logo');
            $logoName = time().'_logo_'.uniqid().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('upload/site-setting'), $logoName);
        }

        if ($request->hasFile('fave_icon')) {
            if ($setting->fave_icon && file_exists(public_path('upload/site-setting/'.$setting->fave_icon))) {
                unlink(public_path('upload/site-setting/'.$setting->fave_icon));
            }
            $icon = $request->file('fave_icon');
            $faveIconName = time().'_icon_'.uniqid().'.'.$icon->getClientOriginalExtension();
            $icon->move(public_path('upload/site-setting'), $faveIconName);
        }

        $setting->update([
            'title'             => $request->title,
            'sub_title'         => $request->sub_title,
            'copyright_name'    => $request->copyright_name,
            'link'              => $request->link,
            'year'              => $request->year,
            'logo'              => $logoName,
            'fave_icon'         => $faveIconName,
        ]);

        return response()->json([
            'status'  => 200,
            'message' => 'Site Setting Updated Successfully',
        ]);
    }


  
    
    //=====|| REMOVE THE SPECIFIED RESOURCE FROM STORAGE.
    public function destroy(string $id) {
        $setting = SiteSetting::findOrFail($id);

        if ($setting->logo && file_exists(public_path('upload/site-setting/' . $setting->logo))) {
            unlink(public_path('upload/site-setting/' . $setting->logo));
        }

        if ($setting->fave_icon && file_exists(public_path('upload/site-setting/' . $setting->fave_icon))) {
            unlink(public_path('upload/site-setting/' . $setting->fave_icon));
        }

        $setting->delete();

        return response()->json([
            'status'  => 200,
            'message' => 'Site Setting Deleted Successfully',
        ]);
    }
}