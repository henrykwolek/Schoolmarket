<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function showProfile(User $user)
    {
        return view('user-profile', [
            'user' => $user
        ]);
    }

    public function editProfile(User $user)
    {
        if(Auth::user()->id != $user->id)
        {
            return back();
        }
        else
        {
            return view('user-edit-profile', [
            'user' => $user
            ]);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('danger', 'Usunięto profil użytkownika');
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$user->id],
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['file'],
            'about' => [''],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id]
        ]);

        if(request('avatar'))
        {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);
        
        return back()->with('success', 'Zmiany w profilu zostały zapisane');
     }

     public function changePassword(User $user)
     {
         $inputs = request()->validate([
            'password' => ['min:8', 'confirmed']
         ]);

         $user->update($inputs);
         return back()->with('success', 'Twoje hasło zostało zmienione');
     }
}
