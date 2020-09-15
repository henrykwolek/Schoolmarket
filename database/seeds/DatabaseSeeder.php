<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        factory('App\User', 10)->create()->each(function($user){
            $user->shopItems()->save(factory('App\ShopItem')->make());

        });

    }
}
