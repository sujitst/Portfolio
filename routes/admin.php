<?php
use Illuminate\Support\Facades\Route;




// =====|| ADMIN MIDDLEWARE
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\ReadOnlyAdmin;




// =====|| ADMIN CONTROLLER
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\MyContactController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\WorksController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FaqController;





// =====|| GROUP ROUTES THAT REQUIRE AUTHENTICATION AND ADMIN ACCESS
Route::middleware(['auth',AuthAdmin::class])->group(function() 
// Route::middleware(['auth', 'authadmin', 'readonlyadmin'])->group(function() 
{

    //=====|| DASHBOARD ROUTE
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/lang/change', [AdminController::class, 'langChange'])->name('admin.lang.change');

    
    //=====|| ACCOUNT ROUTE
    Route::get('admin/account', [AccountController::class, 'account'])->name('admin.account');
    Route::put('admin/account/{id}', [AccountController::class, 'accountupdate'])->name('account.update');
    Route::get('admin/account/password-change', [AccountController::class, 'showChangePassword'])->name('admin.password.change');
    Route::post('admin/account/password-change', [AccountController::class, 'changePassword'])->name('password.change');


    //=====|| HOME ROUTE 
    Route::resource('/admin/home/info', InformationController::class);


    //=====|| SIDEBAR ROUTE
    Route::resource('/admin/home/works', WorksController::class);


    //=====|| ABOUT ROUT
    Route::resource('/admin/about', AboutController::class);


    //=====|| EXPERIENCE ROUTE
    Route::resource('/admin/experience', ExperienceController::class);


    //=====|| SKILLS ROUTE
    Route::resource('admin/skills', SkillController::class);


    //=====|| CATEGORY ROUTE
    Route::resource('admin/gallery/category', CategoryController::class);


    //=====|| IMAGE ROUTE
    Route::resource('admin/gallery/image', ImageController::class);


    //=====|| SERVICE ROUTE
    Route::resource('admin/service', ServiceController::class);


    //=====|| MY PROJECT ROUTE
    Route::resource('admin/project', ProjectController::class);
    Route::post('/admin/project/status', [ProjectController::class, 'toggleStatus'])->name('project.toggleStatus');

    
    //=====|| TESTIMONIAL ROUTE
    Route::resource('admin/testimonial', TestimonialController::class);
    Route::post('/admin/testimonial/status', [TestimonialController::class, 'toggleStatus'])->name('testimonial.toggleStatus');


    //=====|| BLOG ROUTE
    Route::resource('admin/blog', BlogController::class);
    Route::post('/admin/blog/status', [BlogController::class, 'toggleStatus'])->name('blog.toggleStatus');


    //=====|| FAQ ROUTE
    Route::resource('admin/faq', FaqController::class);

    
    //=====|| CONTACT MESSAGE ROUTE
    Route::get('/contact', [ContactMessageController::class, 'contact'])->name('user.contact');
    Route::get('/contact/{id}', [ContactMessageController::class, 'show'])->name('user.contact.show');
    Route::delete('/contact/{id}', [ContactMessageController::class, 'destroy'])->name('user.contact.destroy');


    //=====|| SOCIAL MEDIA ROUTE
    Route::resource('/social-media', SocialMediaController::class);


    //=====|| MY CONTACT ROUTE
    Route::resource('/my-contact', MyContactController::class);


    //=====|| MY SITE SETTING ROUTE
    Route::resource('/site-setting', SiteSettingController::class);
});