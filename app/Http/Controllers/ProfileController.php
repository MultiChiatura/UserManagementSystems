<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileUpdatePasswordRequest;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('pages.profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        User::where('id', auth()->id())->update($request->validated());
        return redirect()->back()->with([
            'success' => 'User Information Updated'
        ]);
    }

    public function updatePassword(ProfileUpdatePasswordRequest $request)
    {
        User::where('id', auth()->id())->update([
            'password' => Hash::make($request->get('password'))
        ]);
        return redirect()->back()->with([
            'success' => 'User Password Updated'
        ]);
    }
}
