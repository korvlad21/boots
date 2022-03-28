<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Type;
use App\Models\Сolor;

class Product extends Model
{
    protected $table = 'products';
	
    protected $fillable = [
      
        'vendorCode',
		'model_id',
		'сolor_id',
		'size',
		'price',
		'availability',
        
    ];
	
	public function type()
	{
		return $this->belongsTo(Type::class,'model_id');
	}
	
	public function color()
	{
		return $this->belongsTo(Сolor::class,'сolor_id');
	}
}
