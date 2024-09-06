<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('education_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('document_type');
            $table->string('document_name')->nullable();
            $table->string('certificate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('education_documents');
    }
};
