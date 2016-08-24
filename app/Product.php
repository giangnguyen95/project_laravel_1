<?php

namespace App;

use App\Cate;
use App\ProductImage;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name', 'alias', 'price', 'intro', 'content', 'image', 'keywords', 'user_id', 'cate_id', 'description',];

    public function cate(){
    	return $this->belongTo(Cate::class);
    }

    public function product_images(){
    	return $this->hasMany(ProductImage::class);
    }

    public function user(){
    	return $this->belogTo(User::class);
    }
}
