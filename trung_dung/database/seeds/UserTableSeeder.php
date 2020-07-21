<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();
        for ($i= 0 ; $i < 100 ; $i++) {
            $item = [
                'name' => $fake->name ,
                'email' => $fake->freeEmail,
                'password' => Hash::make('12345')
            ];
            $user = new User();
            $user->fill($item);
            $user->save();
        }
    }
}
