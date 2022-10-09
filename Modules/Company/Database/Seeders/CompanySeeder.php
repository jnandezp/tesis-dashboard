<?php

namespace Modules\Company\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Company\Entities\Company;
use Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $company = Company::create([
            'name' => 'NightCoders',
            'name-slug' => Str::slug('NightCoders', '-'),
            'description' => 'NightCoders Studio',
            'rfc' => 'XAXX010101000',
            'address' => 'cale uno #133',
            'phone' => '2225996709', // password
            'web' => 'https://dashboard.nightcoders.dev/',
            'email' => 'jnandezp@gmail.com',
            'logo' => 'https://placekitten.com/1920/1080',
            'slogan' => 'NightCoders Studio Slogan',
        ]);

        if (config('app.debug') == 'local'){
            Company::factory(50)->create();
        }
    }
}
