<?php

use App\Models\Job;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DownloadsController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\Applies;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

use function Pest\Laravel\get;

function generateOtp($length = 6)
{
    return mt_rand(100000, 999999); // Generates a 6-digit OTP
}

//All of the views

Route::view('/login', 'Jobs/login')->name('login');
Route::view('/register', 'Jobs/signup');

Route::get('/apply/{id}', function ($id) {

    return view('Components/application',['job_id' => $id]);
});

Route::get('/candidate/show/{id}', function ($id) {
    // Get the records from the applies table where job_id = $id
    $applies = Applies::where('job_id', $id)->with('belongsTojob')->paginate(1);
    
    // Ensure $applies is not empty and check the structure
    if ($applies->isEmpty()) {
        abort(404, 'No applications found for this job.');
    }
    // $employee_info = $applies->user()->get();
    // dd($employee_info);
    return view('Jobs/cadlist', ['apps' => $applies]);

});

Route::view('/contact', 'contact');
Route::view('/about', 'about');
Route::view('/login', 'Jobs/login')->name('login');
Route::view('/register', 'Jobs/signup');
Route::view('/register', 'Jobs/signup');





// All JOB controllers

Route::get('/index', [JobController::class, 'index'])->middleware('auth')->name('jobs.index');
Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->middleware('auth')->name('jobs.edit');
Route::patch('/jobs/{id}', [JobController::class, 'update'])->middleware('auth')->name('jobs.update');
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->middleware('auth')->name('jobs.destroy');
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth')->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth')->name('jobs.store');


//Applicants controllers
Route::post('/apply/store/{id}', [ApplyController::class, 'store'])->name('apply.store');


// User Registration and OTP Verification
Route::post('/register/store', [AuthController::class, 'register'])->name('register.store');
Route::get('/verify-otp', [AuthController::class, 'showOtpForm'])->name('verify-otp');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify-otp.post');


// Login and Logout
Route::post('/login/store', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//Download the resume

Route::get('/download/{file_path}', [DownloadsController::class, 'download'])->where('file_path', '.*')->name('download');





