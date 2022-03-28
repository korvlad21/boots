<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;


class Type extends Model
{
    protected $table = 'types';
	
    protected $fillable = [
      
        'name',
        
    ];
	
	public function product()
	{
		return $this->hasMany(Product::class,'model_id');
	}
}
