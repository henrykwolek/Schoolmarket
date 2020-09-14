<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Auth;
use App\User;
use App\ShopItem;

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
            'category' => ['required']
        ]);

        if(request('post_image'))
        {
            $inputs['post_image'] = request('post_image')->store('images');
            $image = Image::make(public_path($inputs['post_image']))->fit(1400, 800);
            $image->save();
        }

        auth()->user()->shopItems()->create($inputs);

        return back()->with('success', 'Zapisano ogłoszenie');
    }

    public function show(ShopItem $shopItem)
    {
        return view('shop-item', [
            'shopItem' => $shopItem
        ]);
    }

    public function categoryItems(ShopItem $shopItem, $category)
    {
        $shopItems = shopItem::orderBy('id', 'DESC')->where('category', $category)->paginate(15);
        return view('home', [
            'shopItems' => $shopItems,
        ]);
    }
}
