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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 150);
            $table->string('email', 150)->unique();
            $table->string('phone', 15);
            $table->string('date_of_birth', 10);
            $table->string('address', 150);
            $table->foreignId('department_id')->constrained();
            // $table->unsignedBigInteger('department_id');
            // $table->foreign('department_id')->references('id')->on('departments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
