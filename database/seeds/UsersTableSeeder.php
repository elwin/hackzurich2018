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
        factory(App\User::class, 20)->create()->each(function ($u) {
            $trips = factory(App\Trip::class, 20)->make();
            $u->trips()->saveMany($trips);

            $trips->each(function ($t) {
                $points = factory(App\Point::class, 20)->make();

                $t->points()->saveMany($points);
            });
        });
    }
}
