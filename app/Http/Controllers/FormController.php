<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use Inertia\Inertia;
use App\Models\FormField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function showForm()
    {
        return Inertia('Create Form');
    }

    public function storeForm(Request $request)
    {
        $user = User::find(Auth::id());

         $form = Form::create([
             'creator_id' => $user->id,
             'title' => $request->input('title'),
             'description' => $request->input('description'),
             'color' => $request->input('color'),
             'password' => $request->input('isPublic') ? Hash::make($request->input('password')) : null,
             'is_public' => $request->input('isPublic') ? false : true,
             'tags' => $request->input('tags', []) ? json_encode($request->input('tags')) : null,
             'field_count' => count($request->input('fields', [])),
         ]);

         foreach ($request->input('fields', []) as $field) {
              FormField::create([
                  'form_id' => $form->id,
                  'field_name' => $field['fieldName'],
                  'field_description' => $field['fieldDescription'] ?? null,
                  'field_type' => $field['fieldType'],
                  'is_required' => $field['isRequired'] ?? false,
                  'field_options' => empty($field['options']) ? null : json_encode($field['options']),
              ]);
         }

        return redirect()->back()->with('success', 'Form created successfully!');
    }
};