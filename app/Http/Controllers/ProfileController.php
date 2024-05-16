<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    //Update phonr_no and address only
    public function updatePhoneAndAddress(Request $request)
    {
        $request->validate([
            'phone_no' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);
    
        $user = $request->user();
        $user->phone_no = $request->phone_no;
        $user->address = $request->address;
        $user->save();
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
    
        $user = $request->user();
    
        \DB::transaction(function () use ($user, $request) {
            // Delete related records in the carts table
            \DB::table('carts')->where('user_id', $user->id)->delete();
    
            // Delete the user
            $user->delete();
    
            // Log out the user and invalidate the session within the transaction
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        });
    
        return Redirect::to('/');
    }
    
}
