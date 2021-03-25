<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Супы
        DB::table('dishes')->insert([
            'title' => 'Чечевичный',
            'description' => 'Питательный и насыщенный! Лидер по содержанию белка, - лучший выбор для тех кто
            предпочитает активный образ жизни.',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'Чечевица, морковь, лук репчатый, растительное масло, сок лимона.',
            'category_id' => 1,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Сырный',
            'description' => 'Особый кремовый вкус, благодаря использованию нескольких видов сыра. Настоящее открытие
             для ценителей супа',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'Несколько видов сыра, сливки, картофель, морковь, лук, растительное масло и специи.',
            'category_id' => 1,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Грибной',
            'description' => 'Бархатная текстура, невероятный запах шампиньонов... Заканчивается мгновенно,
            поторопитесь!',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'Шампиньоны, сливки, картофель, лук, растительное масло и специи.',
            'category_id' => 1,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Шпинатный с нутом',
            'description' => 'Настоящая еда чемпионов, белки, витамины, клетчатка. Идеальный суп для тех кто хочет быть
            в форме. Шпинат - это железо, калий, витамины A, B1, B2, B6, PP, E. Такое сочетание зарядит организм
            энергией и обновит после напряженой умственной работы.',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'Шпинат, морковь, лук, чеснок, нут, сливки.',
            'category_id' => 1,
            'seasonal' => true,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Тыквенный',
            'description' => 'Тыквенный - любимый многими вкус, который не так часто готовят дома, порадуйте себя этим
            особым супом, знакомым, каждому. Если суп может быть романтичным, то он тыквенный.',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'Лук, тыква, морковь, масло сливочное, яблоки, имбирь.',
            'category_id' => 1,
            'seasonal' => true,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Свекольный',
            'description' => 'Свекольный - холодный суп, пикантное летнее наслаждение. Легкий и освежающий. Абсолютный
            MUST TRY в жаркое время года.',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'Лук, свекла, морковь, сливки (или кокосовое молоко).',
            'category_id' => 1,
            'seasonal' => true,
        ]);

//        Фалафель
        DB::table('dishes')->insert([
            'title' => 'Фалафель1',
            'description' => 'Описание для Фалафель1',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 2,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Фалафель2',
            'description' => 'Описание для Фалафель2',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 2,
        ]);

//        Десерты
        DB::table('dishes')->insert([
            'title' => 'Десерт1',
            'description' => 'Описание для Десерт1',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 3,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Десерт2',
            'description' => 'Описание для Десерт2',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 3,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Десерт3',
            'description' => 'Описание для Десерт3',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 3,
        ]);

//        Напитки
        DB::table('dishes')->insert([
            'title' => 'Напиток1',
            'description' => 'Описание для Напиток1',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 4,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Напиток2',
            'description' => 'Описание для Напиток2',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 4,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Напиток3',
            'description' => 'Описание для Напиток3',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 4,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Напиток4',
            'description' => 'Описание для Напиток4',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 4,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Напиток5',
            'description' => 'Описание для Напиток5',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 4,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Напиток6',
            'description' => 'Описание для Напиток6',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 4,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Напиток7',
            'description' => 'Описание для Напиток7',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 4,
        ]);

//        Другое
        DB::table('dishes')->insert([
            'title' => 'Другое1',
            'description' => 'Описание для Другое1',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 5,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Другое2',
            'description' => 'Описание для Другое2',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 5,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Другое3',
            'description' => 'Описание для Другое3',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 5,
        ]);
        DB::table('dishes')->insert([
            'title' => 'Другое4',
            'description' => 'Описание для Другое4',
            'img' => 'http://loremflickr.com/640/480/food',
            'composition' => 'ингридиент1, ингридиент2, ингридиент3, ингридиент4.',
            'category_id' => 5,
        ]);
    }
}
