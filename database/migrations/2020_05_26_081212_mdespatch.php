<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class mdespatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mdespatches', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->integer('slno');
            $table->date('date');
            $table->string('transporter');
            $table->string('lrno');
            $table->date('lrdate');
            $table->date('pickupdate');
            $table->string('scheme');
            $table->string('destination');
            $table->string('nobox');
            $table->string("weight");
            $table->string('rate');
            $table->string('amount');
            $table->integer('inn');

           
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
