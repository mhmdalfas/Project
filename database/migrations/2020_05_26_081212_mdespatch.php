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
            $table->year('year')->nullable();
            $table->bigincrements('id')->nullable();
            $table->integer('slno')->nullable();
            $table->date('date')->nullable();
            $table->string('transporter')->nullable();
            $table->string('lrno')->nullable();
            $table->date('lrdate')->nullable();
            $table->date('pickupdate')->nullable();
            $table->string('scheme')->nullable();
            $table->integer('inn')->nullable();
            $table->string('destination')->nullable();
            $table->string('nobox')->nullable();
            $table->string("weight")->nullable();
            $table->integer('rate')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('total')->nullable();
           
           
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
