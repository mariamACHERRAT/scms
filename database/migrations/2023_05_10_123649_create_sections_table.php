<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('small_title')->nullable();
            $table->text('section_file')->nullable();
            $table->enum('type', ['video', 'text', 'test', 'task']);
            $table->string('video_link')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('students_answers')->nullable();
            $table->unsignedInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
