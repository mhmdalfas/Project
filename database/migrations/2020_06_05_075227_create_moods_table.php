<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moods', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->integer('slno')->nullable();
            $table->string('stomonth')->nullable();
            $table->integer('deliveryno')->nullable();
            $table->date('goodsissue')->nullable();
            $table->integer('qtytodespatch')->nullable();
            $table->string('scheme')->nullable();
            $table->string('batchno')->nullable();
            $table->integer('readyboxes')->nullable();
            $table->date('readydate')->nullable();
            $table->date('despatchdate')->nullable();
            $table->string("consignee")->nullable();
            $table->integer('balance')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moods');
    }
}
