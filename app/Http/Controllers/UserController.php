<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\User;
use App\ShopItem;
use Auth;

class UserController extends Controller
{
  public function showProfile(User $user, ShopItem $shopItems)
  {
    $shopItems = shopItem::orderBy('id', 'DESC')
      ->where('user_id', $user->id)
      ->paginate(8);
    return view('user-profile', [
      'user' => $user,
      'shopItems' => $shopItems,
    ]);
  }

  public function editProfile(User $user)
  {
    if (Auth::user()->id != $user->id) {
      return back();
    } else {
      return view('user-edit-profile', [
        'user' => $user,
      ]);
    }
  }

  public function update(User $user)
  {
    $inputs = request()->validate([
      'username' => [
        'required',
        'string',
        'max:255',
        'unique:users,username,' . $user->id,
      ],
      'name' => ['required', 'string', 'max:255'],
      'avatar' => ['image:jpeg,jpg,png,webp,jfif'],
      'url' => ['url', 'nullable'],
      'about' => [''],
      'email' => [
        'required',
        'email',
        'max:255',
        'unique:users,email,' . $user->id,
      ],
    ]);

    if (request('avatar')) {
      $inputs['avatar'] = request('avatar')->store('avatars');
      $image = Image::make(public_path($inputs['avatar']))->fit(300, 300);
      $image->save();
    }

    $user->update($inputs);

    return back()->with('success', 'Zmiany w profilu zostały zapisane.');
  }

  public function changePassword(User $user)
  {
    $inputs = request()->validate([
      'password' => ['min:8', 'confirmed'],
    ]);

    $user->update($inputs);
    return back()->with('success', 'Twoje hasło zostało zmienione.');
  }

  public function destroy(User $user)
  {
    $user->delete();
    return redirect()
      ->route('home')
      ->with('danger', 'Twój profil został usunięty.');
  }
}
