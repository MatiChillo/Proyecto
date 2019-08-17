<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shoppingList extends Model
{
  //La clase se llama shopping_list (AGREGUE Mati)
  protected $table = "shopping_lists";
  //Se define cuáles son las columnas que se pueden escribir
  protected $fillable = ['quantity', 'shopping_cart_id', 'product_id', 'total_purchase'];

  // Se aclara la relación con product
  public function products(){
    return $this->belongsToMany("App\Product", "shopping_lists", "shopping_cart_id", "product_id");
  }

  public function shoppingCarts(){
    return $this->belongsToMany("App\shoppingCart", "shopping_lists", "product_id", "shopping_cart_id");
  }

}
