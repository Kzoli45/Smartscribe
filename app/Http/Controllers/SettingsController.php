<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function show(Request $request)
    {
        return inertia('Settings', [
            'user' => $request->user(),
        ]);
    }
}
