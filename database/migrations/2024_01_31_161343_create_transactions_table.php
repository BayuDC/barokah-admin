<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('status', ['created', 'confirmed', 'canceled', 'finished'])->nullable();
            $table->enum('payment', ['cash', 'debit'])->nullable();
            $table->unsignedBigInteger('final_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('transactions');
    }
};
