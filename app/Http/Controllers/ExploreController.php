<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use App\Models\FormField;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Models\FormSubmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ExploreController extends Controller
{
    public function show()
    {
        return Inertia('Explore')
            ->with([
                'forms' => Form::with(['creator'])->where('creator_id', '!=', Auth::id())
                    ->whereNotIn('id', FormSubmission::where('user_id', Auth::id())->pluck('form_id'))
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

    public function checkForm(Request $request, Form $form)
        {
            $request->validate([
                'password' => 'required|string',
            ]);

            if (!Hash::check($request->input('password'), $form->password)) {
                return redirect()->back()->withErrors(['password' => 'Incorrect password']);
            }

            return redirect()->route('explore.form.show', $form->id);
        }

    public function storeSubmission(Request $request)
    {
        $form = Form::findOrFail($request->input('form_id'));

        $form->submission_count += 1;
        $form->save();

        $submission = FormSubmission::create([
            'form_id' => $form->id,
            'user_id' => Auth::id(),
            'content' => json_encode($request->input('content')),
        ]);

        return redirect()->route('explore.show', $submission->form_id);
    }
}
