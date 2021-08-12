<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnatounsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ena_tounsi_forms', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->enum('civility', array("Mr","Mrs","Miss"));
            $table->enum('civilstatus', array("Single","Married","Divorced","Widow"));
            $table->string('nationality');
            $table->date('bd');
            $table->string('bd_place');
            $table->tinyInteger("children");
            $table->string('cin');
            $table->date('cindate');
            $table->string('cinplace');
            $table->string('cincopy');
            $table->enum('por', array("passport","rpermit","cid"));
            $table->string('pornumber');
            $table->date('porexdate');
            $table->string('porcopy');
            $table->string('tadress');
            $table->string('tcity');
            $table->string('tpostalcode');
            $table->string('tnumber');
            $table->string('fadress');
            $table->string('fcountry');
            $table->string('fcity');
            $table->string('fpostalcode');
            $table->string('fnumber');
            $table->string('email');
            $table->string('profession');
            $table->string('ds');
            $table->string('do');
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
        Schema::dropIfExists('ena_tounsi_forms');
    }
}
