<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('grade_id')->constrained()->onDelete('cascade');
            $table->json('curriculum_ids')->nullable(); // Store array of curriculum IDs
            $table->json('content')->nullable(); // Array of {subtitle, image, question}
            $table->string('type')->default('notes');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
}