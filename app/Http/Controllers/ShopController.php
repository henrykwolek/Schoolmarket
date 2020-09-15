<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\User;
use App\ShopItem;
use Auth;

class ShopController extends Controller
{
  public function createView()
  {
    return view('user-create-post');
  }

  public function storeItems()
  {
    $inputs = request()->validate([
      'title' => ['required', 'max:255'],
      'post_image' => ['image:jpeg,jpg,png,webp,jfif'],
      'post_price' => ['required', 'string'],
      'body' => ['required'],
      'category' => ['required'],
    ]);

    if (request('post_image')) {
      $inputs['post_image'] = request('post_image')->store('images');
      $image = Image::make(public_path($inputs['post_image']))->fit(1400, 800);
      $image->save();
    }

    auth()
      ->user()
      ->shopItems()
      ->create($inputs);

    return back()->with('success', 'Zapisano ogłoszenie');
  }

  public function show(ShopItem $shopItem)
  {
    return view('shop-item', [
      'shopItem' => $shopItem,
    ]);
  }

  public function categoryItems(ShopItem $shopItem, $category)
  {
    $shopItems = shopItem::orderBy('id', 'DESC')
      ->where('category', $category)
      ->paginate(15);
    return view('home', [
      'shopItems' => $shopItems,
    ]);
  }

  public function editItem(ShopItem $shopItem, User $user)
  {
    if (Auth::user()->id == $shopItem->user->id) {
      return view('item-edit', [
        'shopItem' => $shopItem,
        'user' => $user,
      ]);
    } else {
      return back();
    }
  }

  public function update(ShopItem $shopItem)
  {
    $inputs = request()->validate([
      'title' => ['required', 'max:255'],
      'post_image' => ['image:jpeg,jpg,png,webp,jfif'],
      'post_price' => ['required'],
      'status' => ['string', 'required'],
      'body' => ['required'],
    ]);

    if (request('post_image')) {
      $inputs['post_image'] = request('post_image')->store('images');
      $image = Image::make(public_path($inputs['post_image']))->fit(1400, 800);
      $image->save();
      $shopItem->post_image = $inputs['post_image'];
    }

    $shopItem->title = $inputs['title'];
    $shopItem->post_price = $inputs['post_price'];
    $shopItem->body = $inputs['body'];
    $shopItem->status = $inputs['status'];

    auth()
      ->user()
      ->shopItems()
      ->save($shopItem);

    return back()->with('success', 'Zmiany zostały zapisane.');
  }

  public function destroy(ShopItem $shopItem)
  {
    $shopItem->delete();
    return redirect()
      ->route('user-show-profile', Auth::user())
      ->with('danger', 'Usunięto ogłoszenie.');
  }
}
