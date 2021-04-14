<?php

use App\Models\Serving;
use Illuminate\Database\Seeder;

class DishServingTableSeeder extends Seeder
{
    protected $currentDishes;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mappingDishServings = [
            [
                'dishes' => [1, 2, 3, 4, 5, 6],
                'servings' => [1, 2],
            ],
            [
                'dishes' => [7, 8],
                'servings' => [3, 4],
            ],
            [
                'dishes' => [9, 10, 11],
                'servings' => [5],
            ],
            [
                'dishes' => [12, 13, 14, 15, 16, 17, 18],
                'servings' => [6, 7],
            ],
            [
                'dishes' => [19, 20, 21, 22],
                'servings' => [5],
            ],
        ];

        foreach ($mappingDishServings as $dishServing) {
            $this->currentDishes = array_flip($dishServing['dishes']);
            $servings = Serving::findMany($dishServing['servings']);
            $servings->each(function ($serving) {
                $this->makeCurrentDishesPrises();
                $serving->dishes()->syncWithoutDetaching($this->currentDishes);
            });
        }
    }

    protected function makeCurrentDishesPrises(): void
    {
        foreach ($this->currentDishes as $key => $value) {
            $this->currentDishes[$key] = ['price' => rand(50, 100)];
        }
    }
}
