<?php

namespace Database\Seeders;

use App\Models\DrinkType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DrinkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '全球首創虎紋系列',
            ],
            [
                'name' => '日式麻糬波波系列',
            ],
            [
                'name' => '老虎芝士奶霜系列',
            ],
            [
                'name' => '鮮果系列',
            ],
            [
                'name' => '原茶系列系列',
            ],
            [
                'name' => '茶拿鐵系列',
            ],
            [
                'name' => '黑糖波霸咖啡系列',
            ],
            [
                'name' => '黑糖粉粿系列系列',
            ],
        ];

        foreach ($data as $value) {
            DrinkType::create([
                'name' => $value['name'],
            ]);
        };
    }
}
