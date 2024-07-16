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
        Schema::table('roles', function (Blueprint $table) {
             $table->integer('position_by'); // replace 'some_column' with the column name after which you want to add 'position_by'
        });

        Schema::table('departments', function (Blueprint $table) {
             $table->integer('position_by'); // replace 'some_column' with the column name after which you want to add 'position_by'
        });

        Schema::table('designations', function (Blueprint $table) {
             $table->integer('position_by'); // replace 'some_column' with the column name after which you want to add 'position_by'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('position_by');
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('position_by');
        });

        Schema::table('designations', function (Blueprint $table) {
            $table->dropColumn('position_by');
        });
    }
};
