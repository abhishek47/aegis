<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeekToChapterHomeworks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chapter_homeworks', function (Blueprint $table) {
            $table->integer('chapter_id')->nullable()->change();
            $table->integer('classroom_id');
           $table->integer('week')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chapter_homeworks', function (Blueprint $table) {
            $table->integer('chapter_id')->change();
            $table->dropColumn('week');
            $table->dropColumn('classroom_id');
        });
    }
}
