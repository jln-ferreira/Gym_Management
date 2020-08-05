<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->text('phoneNumber');
            $table->date('databirth');
            $table->text('address');
            $table->integer('belt_id')->unsigned();
            $table->string('status');
            $table->text('comment')->nullable();

            //graduation
            $table->integer('total_attendance')->default(0);
            $table->integer('attendance_graduation')->default(0);

            //foreing key


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
