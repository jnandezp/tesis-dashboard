<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Blog\Entities\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Tag::create([
            'name' => 'db',
        ]);

        $category = Tag::create([
            'name' => 'code',
        ]);

        $category = Tag::create([
            'name' => 'tip',
        ]);

        if (config('app.debug') == 'local'){
            Tag::factory(20)->create();
        }

    }
}
