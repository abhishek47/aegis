<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterExtraProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_extra_problems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chapter_id');
            $table->text('q');
            $table->json('a');
            $table->boolean('select_any')->default(false);
            $table->text('solution');
            $table->text('correct');
            $table->text('incorrect');
            $table->integer('points')->default(0);
            $table->integer('section')->default(1);
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
        Schema::dropIfExists('chapter_extra_problems');
    }
}
