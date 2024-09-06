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
        Schema::table('users', function (Blueprint $table) {
            // Remove old columns
            $table->dropColumn(['educationdoc1', 'educationdoc2', 'educationdoc3']);

            // Add new columns
            $table->string('aadharno')->after('aadhar')->nullable();
            $table->string('pancardno')->after('pancard')->nullable();
            $table->string('educationdocument')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the removed columns back
            $table->string('educationdoc1')->nullable();
            $table->string('educationdoc2')->nullable();
            $table->string('educationdoc3')->nullable();

            // Remove the newly added columns
            $table->dropColumn(['aadharno', 'pancardno', 'educationdocument']);
        });
    }
};
