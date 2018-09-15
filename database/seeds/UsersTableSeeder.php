<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function ($u) {
            $trips = factory(App\Trip::class, 10)->make();
//            $u->trips()->saveMany($trips);

//            $trips->each(function ($t) {
//                $points = factory(App\Point::class, 50)->make();
//
//                $t->points()->saveMany($points);
//            });
        });
    }
}
