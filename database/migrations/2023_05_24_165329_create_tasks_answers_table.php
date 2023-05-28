<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

           
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('section_id');
            $table->text('task_answer')->nullable();
            $table->text('note')->nullable();
            $table->decimal('point')->nullable();
            $table->text('answer_file')->nullable();
            
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks_answers');
    }
};
