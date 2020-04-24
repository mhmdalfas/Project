<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsigneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignees', function (Blueprint $table) {
            $table->bigincrements('id');
        //    $table->unsignedinteger('cid');
            $table->unsignedbiginteger('oid');
            $table->string('consignee');
            $table->integer('cqty');
            $table->integer('PFT');
            $table->integer('KFB');
            $table->integer('KFC');
            $table->integer('ANo');
            $table->integer('plantd');
            $table->integer('Q1');
            $table->integer('Q2');
            $table->integer('Q3');
            $table->integer('Q4');
            $table->timestamps();
            $table->foreign('oid')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->unique('oid','Ano');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consignees');
    }
}