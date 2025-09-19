<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\AboutUs;
use App\Models\User;
use App\Models\BlogPost;
use App\Models\Department;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //
    public function signUp()
    {
        return view ('auth.register');
    }

    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email|max:255|string',
            'password' => 'required|min:5|max:40',
            'confirm_password' => 'required|min:5|max:40|same:password',
        ], [
            "email.unique" => "This email is already registered, please sign in or use a different email",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // Generate OTP and expiration
        $user->email_verification_otp = rand(100000, 999999);
        $user->otp_expires_at = Carbon::now()->addMinutes(5);

        if ($user->save()) {
            try {
                Mail::to($user->email)->send(new OtpMail($user->email_verification_otp));
            } catch (\Exception $e) {
                // Log the error
                Log::error("Failed to send OTP email: " . $e->getMessage());

                // Redirect user with a friendly message
                return redirect()->route('verify.otp', ['email' => $user->email])
                                 ->with('warning', 'Registered successfully but OTP email could not be sent. Please check your network connection and request a new OTP.');
            }

            return redirect()->route('verify.otp', ['email' => $user->email]);
        } else {
            return redirect()->back()->with('error', 'Registration Failed');
        }
    }

    public function user_dashboard()
    {
        return view('welcome');
    }

    public function showOtpForm($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user || !$user->otp_expires_at) {
            return redirect()->route('login')->with('error', 'Invalid request. Please register again.');
        }

        $otpExpiresAt = Carbon::parse($user->otp_expires_at)->timestamp;

        return view('auth.verify-otp', compact('email', 'otpExpiresAt'));
    }

    public function submitOtp(Request $request, $email)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6'
        ]);

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        if ($user->otp_expires_at === null || Carbon::now()->greaterThan($user->otp_expires_at)) {
            return redirect()->back()->with('error', 'OTP has expired, please request a new one.');
        }

        if ($user->email_verification_otp != $request->otp) {
            return redirect()->back()->with('error', 'The code you entered is invalid');
        }

        $user->email_verified_at = Carbon::now();
        $user->email_verification_otp = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect()->route('login')->with('message', 'Email verified successfully, please login');
    }

    public function resendOtp($email)
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            $user->email_verification_otp = rand(100000, 999999);
            $user->otp_expires_at = Carbon::now()->addMinutes(5);
            $user->save();

            try {
                Mail::to($user->email)->send(new OtpMail($user->email_verification_otp));
            } catch (\Exception $e) {
                Log::error("Failed to resend OTP email: " . $e->getMessage());
                return redirect()->back()->with('warning', 'Could not send OTP email. Please check your network connection and try again later.');
            }

            return redirect()->back()->with('message', 'A new OTP has been sent to your email');
        }

        return redirect()->route('login')->with('error', 'User not found');
    }

    // Blog list page
    public function blog(Request $request)
    {
        $query = BlogPost::query();

        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%')
                  ->orWhere('content', 'like', '%' . $request->q . '%');
        }

        $posts = $query->latest()->paginate(3);
        $popularPosts = BlogPost::orderBy('views', 'desc')->take(3)->get();

        return view('blog', compact('posts', 'popularPosts'));
    }

    public function show($slug)
    {
        $post = BlogPost::with('topic')->where('slug', $slug)->firstOrFail();
        $post->increment('views');

        $relatedPosts = BlogPost::where('topic_id', $post->topic_id)
                                ->where('id', '!=', $post->id)
                                ->take(5)
                                ->get();

        return view('blogdetail', compact('post', 'relatedPosts'));
    }

    public function departments()
    {
        $departments = Department::whereNull('deleted_at')->paginate(6);
        return view('departments', compact('departments'));
    }

    public function departmentDetails($slug)
    {
        $department = Department::where('slug', $slug)->firstOrFail();
        $doctors = $department->doctors()->get();
        return view('department-details', compact('department', 'doctors'));
    }

    public function doctors()
    {
        $doctors = Doctor::with(['department', 'specialities'])->paginate(6);
        return view('doctors', compact('doctors'));
    }

    public function doctorDetail($slug)
    {
        $doctor = Doctor::with(['department', 'specialities'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedDoctors = Doctor::where('department_id', $doctor->department_id)
            ->where('id', '!=', $doctor->id)
            ->take(4)
            ->get();

        return view('doctorsdetail', compact('doctor', 'relatedDoctors'));
    }

    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('About', compact('aboutUs'));
    }
}
