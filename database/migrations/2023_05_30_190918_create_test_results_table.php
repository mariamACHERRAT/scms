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
        
            Schema::create('test_results', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('section_id');
                $table->unsignedInteger('user_id');
                $table->integer('score')->nullable();
                $table->timestamps();
    
                $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_results');
    }
};
