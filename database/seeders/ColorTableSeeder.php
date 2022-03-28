<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Сolor;

class ColorTableSeeder extends Seeder
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
                'name' => 'Красный',
            ],
            [
                'id' => 2,
                'name' => 'Чёрный',
            ],
            [
                'id' => 3,
                'name' => 'Зелёный',
            ],
            [
                'id' => 4,
                'name' => 'Синий',
            ],

        ];
		for($i = 2; $i<=5; $i++){
			$data [] = [
				'name'=>'Пользователь '.$i,
				'email'=>'ueser'.$i.'@testmailg.ru',
				'password'=>bcrypt(str_random(16)),
			];
		}

        foreach ($list as $item) {
            Сolor::query()->firstOrCreate([
                'id' => $item['id']
            ], $item);
        }
    }
}
