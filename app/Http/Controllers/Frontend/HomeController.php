<?php
namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\SocialMedia;
use App\Models\Mycontact;
use App\Models\Experienc;
use App\Models\Category;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Skills;
use App\Models\Image;
use App\Models\About;
use App\Models\Works;
use App\Models\User;
use App\Models\Blog;
use App\Models\Faq;


class HomeController extends Controller
{
    //=====|| HOME PAGE
    public function home() {
        $data['testimonials']   = Testimonial::where('status', 1)->latest()->get();
        $data['experiences']    = Experienc::latest()->get();
        $data['categories']     = Category::latest()->take(6)->get();
        $data['galleries']      = Image::with('category')->latest()->take(6)->get();
        $data['services']       = Service::latest()->get();
        $data['mycontacts']     = Mycontact::latest()->get();
        $data['contacts']       = Contact::latest()->get();
        $data['projects']       = Project::where('status', 1)->latest()->get();
        $data['skills']         = Skills::latest()->get();
        $data['about']          = About::latest()->first();
        $data['works']          = Works::latest()->take(4)->get();
        $data['users']          = User::latest()->get();
        $data['blogs']          = Blog::where('status', 1)->latest()->get();
        $data['faqs']           = Faq::latest()->get();

        return view('frontend.index', $data);
    }



    //=====|| CONTACT MESSAGE ANY USER
    public function contact(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'number'      => 'required',
            'email'       => 'required|email|unique:contacts,email',
            'address'     => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        Contact::create($request->all());

        return response()->json([
            'message' => 'Submit Successfully.'
        ]);
    }



    //=====|| BLOG PAGE
    public function blog($id) {
        $blog   = Blog::findOrFail($id);
        $blogs  = Blog::latest()->get();
        $medias = SocialMedia::latest()->take(7)->get();

        $shareUrl   = urlencode(URL::current());
        $shareTitle = urlencode($blog->title);

        return view('frontend.blog', compact( 'blogs', 'blog', 'medias', 'shareUrl', 'shareTitle' ));
    }
}