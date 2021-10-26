<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();

        $user->name = 'andregio';
        $user->email = 'giorgio@gmail.com';
        $user->password = bcrypt('password'); //^bcrypt serve per far arrivare nel db la password criptata.

        $user->save();

        for ($i = 0; $i < 9; $i++) {
            $new_user = new User();

            $new_user->name = $faker->username();
            $new_user->email = $faker->email();
            $new_user->password = bcrypt($faker->word());

            $new_user->save();
        }
    }
}
