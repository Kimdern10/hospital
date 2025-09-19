<?php 

namespace App\Providers;

use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            // Frontend data
            $blogFrontend     = BlogPost::with('admin')->latest()->paginate(3);
            $contactInfo      = Contact::latest()->first();
            $doctorFrontend   = Doctor::latest()->paginate(3);
            $allDoctors       = Doctor::latest()->get();
            $allDepartments   = Department::latest()->get();

            // Hospital admin dashboard data
            $totalUsers       = User::count();
            $totalBlogs       = BlogPost::count();
            $totalDoctors     = Doctor::count();

            // 🔥 Popular posts (Top 5 by views)
            $popularPosts = BlogPost::orderBy('views', 'desc')
                                    ->take(3)
                                    ->get();

            // Share with all views
            $view->with([
                'blogFrontend'   => $blogFrontend,
                'contactInfo'    => $contactInfo,
                'doctorFrontend' => $doctorFrontend,
                'allDoctors'     => $allDoctors,
                'allDepartments' => $allDepartments,

                'totalUsers'     => $totalUsers,
                'totalBlogs'     => $totalBlogs,
                'totalDoctors'   => $totalDoctors,

                // Popular posts available everywhere
                'popularPosts'   => $popularPosts,
            ]);
        });
    }
}
