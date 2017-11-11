<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_homeworks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chapter_id');
            $table->text('q');
            $table->json('a');
            $table->boolean('select_any')->default(false);
            $table->text('solution');
            $table->text('correct');
            $table->text('incorrect');
            $table->date('due_date');
            $table->integer('level')->default(0);
            $table->integer('points')->default(7);
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
        Schema::dropIfExists('chapter_homeworks');
    }
}
