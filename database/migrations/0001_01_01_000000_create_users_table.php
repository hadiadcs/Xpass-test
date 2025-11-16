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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

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

        Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('event_id')->constrained()->onDelete('cascade');
        $table->integer('quantity');
        $table->decimal('total_amount', 10, 2);
        $table->string('booking_reference')->unique();
        $table->enum('status', ['pending', 'confirmed', 'cancelled'])
              ->default('pending');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('events');
        Schema::dropIfExists('bookings');
    }
};
