<?php

use Illuminate\Database\Seeder;

use App\Student;
use App\Responsable;
use App\Paymment;
use App\Belt;
use App\Graduation;
use App\Item;
use App\Subcategory;
use App\Cost;
use App\User;
use App\Gym;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Gym::class,2)->create();
        factory(User::class,20)->create();
        factory(Belt::class,20)->create();
        factory(Subcategory::class,30)->create();
        factory(Item::class,56)->create();
        factory(Student::class,100)->create();
        factory(Cost::class,120)->create();
        factory(Responsable::class,50)->create();
        factory(Paymment::class,120)->create();
        factory(Graduation::class,200)->create();
    }
}
