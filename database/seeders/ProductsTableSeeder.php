<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
		$i=1;
		for($model=1;$model<=5;$model++)
		{
			for($color=1;$color<=4;$color++){
				for($size=40;$size<=44;$size++)
				{
					if($color==1)
					{
						$c='RED';
					}
					else if($color==2)
					{
						$c='BLACK';
					}
					else if($color==3)
					{
						$c='GREEN';
					}
					else if($color==4)
					{
						$c='BLUE';
					}
					
					if($model==1)
					{
						$m='KL';
					}
					else if($model==2)
					{
						$m='MOD';
					}
					else if($model==3)
					{
						$m='STR';
					}
					else if($model==4)
					{
						$m='VES';
					}
					else if($model==5)
					{
						$m='PON';
					}
					$list[] =	
					[
						'id' => $i,
						'vendorCode' => $m.' '.$c. ' '.$size.' RU',
						'model_id' => $model,
						'сolor_id' => $color,
						'size' => $size,
						'price' => rand(10, 50)*100,
						'availability' => rand(0, 5),
					];
					$i++;
				}
				
			}
		}
        

        foreach ($list as $item) {
            Product::query()->firstOrCreate([
                'id' => $item['id']
            ], $item);
        }
    }
}
