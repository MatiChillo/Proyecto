<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $customers = factory(App\Customer::class)->times(10)->create();
        $products = factory(App\Product::class)->times(10)->create();
        $categories = factory(App\Category::class)->times(10)->create();
        $shopping_carts = factory(App\shoppingCart::class)->times(10)->create();
        $shopping_lists= factory(App\shoppingList::class)->times(10)->create();
        // $this->call(UsersTableSeeder::class);

        foreach ($products as $oneProduct) {
  				$oneProduct->category()->associate($categories->random(1)->first()->id);
          //$oneProduct->shopping_lists()-saveMany($shopping_lists->random(1));
  				$oneProduct->save();
        }

        foreach ($shopping_carts as $oneShoppingCart) {
          $oneShoppingCart->customer()->associate($customers->random(1)->first()->id);
          //$oneShoppingCart->shopping_lists()-saveMany($shopping_lists->random(1));
          $oneShoppingCart->save();
        }

        foreach ($shopping_lists as $oneShoppingList) {
          $oneShoppingList->products()->saveMany($products->random(1));
          $oneShoppingList->shoppingCarts()->saveMany($shopping_carts->random(1));
          $oneShoppingList->save();
        }

        }
}
