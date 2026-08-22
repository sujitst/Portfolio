<?php
namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\MyInformation;
use App\Models\SiteSetting;
use App\Models\SocialMedia;
use App\Models\Project;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $info           = MyInformation::latest()->first();
        $totalProject   = Project::count();
        $medias         = SocialMedia::latest()->get();
        $siteseting     = SiteSetting::latest()->first();



        View::share([
            'info'          => $info,
            'totalProject'  => $totalProject,
            'medias'        => $medias,
            'siteseting'    => $siteseting,
        ]);
    }
}
