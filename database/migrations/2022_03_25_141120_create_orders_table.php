<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedBigInteger('userid');
            $table->unsignedInteger('ordertypeid');
            $table->unsignedInteger('orderinfoid')->nullable();

            $table->float('totalprice', 8, 2)->unsigned();
            $table->integer('totalitems')->unsigned();
            $table->longText('Notes')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
