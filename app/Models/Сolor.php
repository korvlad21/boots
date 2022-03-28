<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Сolor extends Model
{
	
	protected $table = 'сolors';
	
    protected $fillable = [
        'name',
        
    ];
	
	public function product()
	{
		return $this->hasMany(Product::class,'model_id');
	}
}
