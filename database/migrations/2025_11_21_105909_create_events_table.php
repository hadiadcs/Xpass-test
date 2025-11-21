<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('location');
        $table->dateTime('start_date');
        $table->dateTime('end_date');
        $table->decimal('price', 8, 2);
        $table->integer('total_tickets');
        $table->integer('available_tickets');
        $table->string('image')->nullable();
        $table->string('category');
        $table->enum('status', ['active', 'cancelled', 'completed'])
              ->default('active');
        $table->foreignId('organizer_id')->constrained('users')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
