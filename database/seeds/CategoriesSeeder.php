<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Informatica']);
        Category::create(['name' => 'Livro']);
        Category::create(['name' => 'Moveis']);
        Category::create(['name' => 'Livros']);
        Category::create(['name' => 'Cozinha']);
        Category::create(['name' => 'Lazer']);
        Category::create(['name' => 'Celular']);
        Category::create(['name' => 'Cama']);
        Category::create(['name' => 'Banheiro']);
    }
}
