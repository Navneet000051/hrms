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
        Schema::create('leavequota', function (Blueprint $table) {
            $table->id();
            $table->string('leavetype');
            $table->float('duration');
            $table->boolean('status')->default(1);
            $table->integer('position_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leavequota');
    }
};
