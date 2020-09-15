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

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Belt::class,7)->create();
        factory(Subcategory::class,10)->create();
        factory(Item::class,10)->create();
        factory(Student::class,50)->create();
        factory(Cost::class,40)->create();
        factory(Responsable::class,50)->create();
        factory(Paymment::class,50)->create();
        factory(Graduation::class,50)->create();
    }
}
