<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigincrements('id');

            $table->string('orderno');
            $table->string('scheme');
            $table->integer('quantity');
            $table->integer('ANo');
        //    $table->unsignedinteger('oid');
          //  $table->unique('oid');
            $table->timestamps();
             $table->unique(['orderno','scheme']);






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
