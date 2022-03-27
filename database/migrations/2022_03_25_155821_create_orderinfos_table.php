<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('orderid');
            $table->string('name');
            $table->float('deleveryfees', 8, 2)->unsigned()->nullable();
            $table->integer('phone')->unsigned()->nullable();
            $table->integer('table')->unsigned()->nullable();
            $table->float('servicecharge', 8, 2)->unsigned()->nullable();
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
        Schema::dropIfExists('orderinfos');
    }
}
