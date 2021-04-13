<?php

use App\Models\Dish;
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
            $this->makeCurrentDishes($dishServing['servings']);

            $servings = Serving::findMany($dishServing['servings']);
            $servings->each(function ($serving) {
                $serving->dishes()->sync(Dish::findMany($this->currentDishes));
            });
        }
    }

    protected function makeCurrentDishes(array $servings): void {
        $this->currentDishes = array_flip($servings);
        foreach ($this->currentDishes as $key => $value) {
            $this->currentDishes[$key] = rand(50, 100);
        }
    }
}
