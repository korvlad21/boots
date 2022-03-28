<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $list = [
            [
                'id' => 1,
                'name' => 'Клёвые',
            ],
            [
                'id' => 2,
                'name' => 'Модные',
            ],
            [
                'id' => 3,
                'name' => 'Странные',
            ],
            [
                'id' => 4,
                'name' => 'Весёлые',
            ],
			[
                'id' => 5,
                'name' => 'Понтовые',
            ],

        ];

        foreach ($list as $item) {
            Type::query()->firstOrCreate([
                'id' => $item['id']
            ], $item);
        }
	}
}
