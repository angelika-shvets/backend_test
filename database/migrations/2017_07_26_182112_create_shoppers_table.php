<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('name',70);
            $table->string('last_name',70);
            $table->string('phone',20);
            $table->string('city',70);
            $table->string('house_number',70);
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
        Schema::drop('shoppers');
    }
}
