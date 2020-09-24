<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
    "name", "description", "price", "image"
  ];
  
  public function search ($filter = null){
 
    $results = $this
    ->where("name", "LIKE", "%{$filter}%")
    ->orWhere("description", "LIKE", "%{$filter}%")
    ->paginate(10);

    return $results;
  }
}
