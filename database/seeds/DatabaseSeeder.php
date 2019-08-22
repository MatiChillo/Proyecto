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
        $product_shopping_cart = factory(App\product_shoppingCart::class)->times(10)->create();
        // $this->call(UsersTableSeeder::class);

        foreach ($products as $oneProduct) {
  				$oneProduct->category()->associate($categories->random(1)->first()->id);
          $oneProduct->save();
          $oneProduct->shoppingCarts()->sync($shopping_carts->random(2));

        }

        foreach ($shopping_carts as $oneShoppingCart) {
          $oneShoppingCart->customer()->associate($customers->random(1)->first()->id);
          $oneShoppingCart->save();
          $oneShoppingCart->products()->sync($products->random(2));

        }

    }
}
