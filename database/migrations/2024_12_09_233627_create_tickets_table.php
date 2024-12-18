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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_function_id')->constrained()->onDelete('cascade');
            $table->string('seat_number', 10);
            $table->string('ticket_code', 8)->unique();
            $table->enum('status', ['ocupado', 'libre'])->default('ocupado'); // Para marcar si el asiento está ocupado o libre
            $table->timestamp('purchased_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
