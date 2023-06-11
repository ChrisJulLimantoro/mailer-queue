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
        Schema::create('mail', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('subject');
            $table->string('to',50);
            $table->text('message');
            $table->text('file')->nullable();
            $table->integer('status')->default(0);
            $table->text('cc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail');
    }
};
