<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Applies;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class ApplyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
    //     Log::info('Store method called', ['request' => $request->all(), 'job_id' => $id]);

    //    return dd($request->all(), $id);
        // $request->validate([
        //     'email' => 'required|email',
        //     'cv' => 'required|file|mimes:pdf,doc,docx|max:2048', 
        // ]);

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $path = $file->store('cvs', 'public'); 
        }
        Applies::create([
            'employee_id' => Auth::user()->id,
            'job_id' => $id,
            'email' => $request->email,
            'cv' =>  $path ?? $request->cv,
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
}
