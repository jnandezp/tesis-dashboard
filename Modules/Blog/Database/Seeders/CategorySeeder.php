<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Blog\Entities\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name' => 'Laravel',
        ]);

        $category = Category::create([
            'name' => 'Php',
        ]);

        $category = Category::create([
            'name' => 'Javascript',
        ]);

        if (config('app.debug') == 'local'){
            Category::factory(20)->create();
        }

    }
}
