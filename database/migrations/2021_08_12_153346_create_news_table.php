<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('summary',200);
            $table->text('main',20000);
            $table->text('secondary',20000)->nullable();
            $table->text('list',10000)->nullable();
            $table->text('gallery',20000)->nullable();
            $table->timestamp('date');
            $table->integer('user_id');
            $table->integer('updated_by')->nullable();
            $table->timestamp('edited_at')->nullable();
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
        Schema::dropIfExists('news');
    }
}
