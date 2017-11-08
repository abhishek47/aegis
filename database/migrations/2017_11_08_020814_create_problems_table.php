<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('type')->default(0);
            $table->text('q');
            $table->json('a');
            $table->boolean('select_any')->default(false);
            $table->text('correct');
            $table->text('incorrect');
            $table->integer('likes')->default(0);
            $table->integer('solvers')->default(0);
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
        Schema::dropIfExists('problems');
    }
}
