<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run(): void
    {

        $gender = fake()->randomElement([CLIENT::MALE, CLIENT::FEMALE ]);

        for($clients=0; $clients<60 ;$clients++)
        {

            DB::table('clients')->insert([
                'first_name' =>fake()->firstName($gender),
                'last_name' => fake()->lastName(),
                'email' =>fake()->unique()->email,
                'passport_num' => generate_passport_num(),
                'gender' =>$gender,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }



    }
}
