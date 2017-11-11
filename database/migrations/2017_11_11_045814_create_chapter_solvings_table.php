<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterSolvingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_solvings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('attempts')->default(3);
            $table->integer('chapter_homework_id');
            $table->integer('solved')->default(0);
            $table->integer('score')->default(0);
            $table->string('answer');
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
        Schema::dropIfExists('chapter_solvings');
    }
}
