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
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullale();
            $table->string('profile')->nullable();
            // $table->string('address')->nullable();
            // $table->string('phone')->nullable();
            // $table->string('position')->nullable();
            // $table->string('gender')->nullable();
            // $table->string('department')->nullable();
            // $table->date('start_date')->nullable();
            // $table->date('end_date')->nullable();
            // $table->string('salary')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
