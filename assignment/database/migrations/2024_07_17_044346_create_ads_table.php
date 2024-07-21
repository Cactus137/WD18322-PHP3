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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('description', 255);
            $table->text('link');
            $table->bigInteger('status_id')->unsigned();
            $table->integer('clicks')->default(0);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->foreign('status_id')->references('id')->on('ads_status');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
