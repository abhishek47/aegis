<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterExtraProblemSolvingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_extra_problem_solvings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('attempts')->default(0);
            $table->integer('chapter_extra_problem_id');
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
        Schema::dropIfExists('chapter_extra_problem_solvings');
    }
}
