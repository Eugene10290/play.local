<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for( $i = 0; $i<=5; $i++) {
            $product = new Product([
                'imagePath' => 'public/images/notes.jpg',
                'Title' => 'Сонаты для фортепиано. Ноты',
                'description' => 'Великий австрийский композитор писал сонаты для фортепиано на протяжении всей своей жизни. Это своеобразный дневник композитора. Сонаты Моцарта сопровождают пианистов на протяжении всей их творческой карьеры. Впервые с ними встречаются в детств',
                'price' => 1
            ]);

            $product->save();
        }

    }
}
