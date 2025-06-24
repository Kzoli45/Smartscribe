<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormField;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function show()
    {
        return Inertia('Explore')
            ->with([
                'forms' => Form::with(['creator'])->where('creator_id', '!=', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->get()
            ]);
    }

    public function showForm(Form $form)
    {
        $form->load('creator');

        return Inertia('Take Form')
            ->with([
                'form' => $form,
                'creator' => User::find($form->creator_id),
                'fields' => FormField::where('form_id', $form->id)
                    ->get()
            ]);
    }
}
