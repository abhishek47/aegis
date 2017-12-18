<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHintsSourceToQuiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->string('source')->nullable();
            $table->text('hint_1')->nullable();
            $table->text('hint_2')->nullable();
            $table->text('hint_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizzes', function (Blueprint $table) {
           $table->dropColumn('source');
           $table->dropColumn('hint_1');
           $table->dropColumn('hint_2');
           $table->dropColumn('hint_3');
        });
    }
}
