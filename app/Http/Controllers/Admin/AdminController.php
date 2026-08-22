<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skills;


class AdminController extends Controller
{
    public function dashboard() {
        $totalTestimonial = Testimonial::count();
        $totalProject = Project::count();
        $totalService = Service::count();
        $totalTotal = Skills::count();

        //=====|| Line chart: Projects completed per month (last 6 months)
        $months = collect();
        $projectsPerMonth = collect();
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i)->format('F');
            $count = Project::whereMonth('created_at', now()->subMonths($i)->month)->count();
            $months->push($month);
            $projectsPerMonth->push($count);
        }

        //=====|| Pie chart: Top 5 testimonials by rating
        $topCustomers = Testimonial::orderBy('rating', 'desc')->take(5)->pluck('name');
        $topCustomersData = Testimonial::orderBy('rating', 'desc')->take(5)->pluck('rating');

        //=====|| Site settings (for header)
        $siteseting = SiteSetting::first();

        return view('admin.dashboard', compact(
            'totalProject', 'totalService', 'totalTotal', 'totalTestimonial',
            'months', 'projectsPerMonth', 'topCustomers', 'topCustomersData', 'siteseting'
        ));
    }



    public function langChange(Request $request) {
        $lang = $request->query('lang');
        $allowedLangs = ['en', 'bn', 'ar', 'hi', 'sp', 'fr'];

        if (in_array($lang, $allowedLangs)) {
            session([
                'lang_code' => $lang,
                'text_dir'  => $lang === 'ar' ? 'rtl' : 'ltr',
            ]);
        }
        return redirect()->back();
    }
}