<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormSubmission;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        return Inertia::render('Profile', [
            'user' => $request->user(),
            'forms' => Form::with(['creator'])
                ->where('creator_id', $request->user()->id)
                ->orderBy('created_at', 'asc')
                ->get(),
            'formSubmissions' => FormSubmission::with(['form'])
                ->where('user_id', $request->user()->id)
                ->orderBy('created_at', 'asc')
                ->get(),
        ]);
    }
}
