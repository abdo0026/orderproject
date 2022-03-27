<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foriegns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ordertypeid')->references('id')->on('ordertypes');
            $table->foreign('orderinfoid')->references('id')->on('orderinfos')->onDelete('cascade');
        });

        Schema::table('orderitems', function (Blueprint $table) {
            $table->foreign('orderid')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('itemid')->references('id')->on('items');
        });

        Schema::table('orderinfos', function (Blueprint $table) {
             $table->foreign('orderid')->references('id')->on('orders')->onDelete('cascade');
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
