<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Storage;

class CvController extends Controller
{
    public function index(Job $job, JobApplication $jobApplication)
    {
        $this->authorize('download', $job);

        $storage = Storage::disk('private');

        if (!$jobApplication->cv_path || !$storage->exists($jobApplication->cv_path)) {
            return redirect()->back()
                ->with('error', 'File wat not found');
        }

        return Storage::disk('private')->download($jobApplication->cv_path);
    }
}
