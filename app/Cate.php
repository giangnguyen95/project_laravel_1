<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    protected $table = 'cates';
    protected $fillable = ['name', 'alias', 'order', 'parent_id', 'keywords', 'description',];

    public function product(){
    	return $this->hasMany(Product::class);
    }
}

