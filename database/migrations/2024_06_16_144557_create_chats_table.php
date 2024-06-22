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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('video');
            $table->string('title');
            $table->text('content');
            $table->string('category', 500);
            $table->string('pay');
            $table->string('zalo');
            $table->string('birthday');
            $table->string('height');
            $table->string('weight');
            $table->string('work');
            $table->string('price');
            $table->string('telegram');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
