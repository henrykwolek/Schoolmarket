<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ShopItem;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //$this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(ShopItem $shopItem, User $user)
  {
    $shopItems = shopItem::orderBy('id', 'DESC')->paginate(9);
    return view('home', [
      'shopItems' => $shopItems,
    ]);
  }
}
