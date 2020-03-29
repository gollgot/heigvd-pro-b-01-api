<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('quantity');
            $table->string('label', 50);
            $table->date('dueDate');
            $table->unsignedInteger('interval'); // Unit (day, week, ...)
            $table->unsignedInteger('intervalValue'); // Amount (1,2, ...)
            $table->timestamps();

            // Foreign keys constraints
            // User deleted => goal deleted
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Table options
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goals');
    }
}