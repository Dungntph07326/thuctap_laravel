<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $fillable = ['name' , 'image','cate_id','price','short_desc','detail','star','views'];
}
