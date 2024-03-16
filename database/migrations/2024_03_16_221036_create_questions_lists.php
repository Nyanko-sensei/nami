<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('questions_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_public')->default(false);
            $table->timestamps();
        });

        Schema::create('question_questions_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('questions_list_id');
            $table->timestamps();

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');

            $table->foreign('questions_list_id')
                ->references('id')
                ->on('questions_lists')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_questions_list');
        Schema::dropIfExists('questions_lists');
    }
};
