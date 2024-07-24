<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DownloadsController extends Controller
{
    public function download($file_path) {
        // Extract the file name from the path
        $file_name = basename($file_path);

        // Construct the full storage path
        $full_path = storage_path('app/public/cvs/' . $file_name);

        // Check if file exists
        if (!file_exists($full_path)) {
            abort(404, 'File not found.');
        }

        return response()->download($full_path);
    }
}
