<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Product;

class Order extends Model
{
     protected $table = 'orders';
	
    protected $fillable = [
      
        'user_id',
		'product_id',
		'price',
        
    ];
	
	public function product()
	{
		return $this->belongsTo(Product::class,'product_id');
	}
}
