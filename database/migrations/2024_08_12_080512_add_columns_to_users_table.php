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
            $table->string('emp_id')->after('id')->nullable();
            $table->string('lastname')->after('name')->nullable();
            $table->string('alternatemobile')->after('mobile')->nullable();
            $table->string('country_id')->after('address')->nullable();
            $table->string('pcountry_id')->after('country_id')->nullable();
            $table->string('state_id')->after('pcountry_id')->nullable();
            $table->string('pstate_id')->after('state_id')->nullable();
            $table->string('city_id')->after('pstate_id')->nullable();
            $table->string('pcity_id')->after('city_id')->nullable();
            $table->string('pincode')->after('pcity_id')->nullable();
            $table->string('p_pincode')->after('pincode')->nullable();
            $table->string('marital_status')->after('p_pincode')->nullable();
            $table->string('gender')->after('marital_status')->nullable();
            $table->string('dob')->after('gender')->nullable();
            $table->string('company_id')->after('dob')->nullable();
            $table->string('department_id')->after('company_id')->nullable();
            $table->string('designation_id')->after('department_id')->nullable();
            $table->string('joindate')->after('designation_id')->nullable();
            $table->string('confirmdate')->after('joindate')->nullable();
            $table->string('exitdate')->after('confirmdate')->nullable();
            $table->string('bankname')->after('exitdate')->nullable();
            $table->string('accountnumber')->after('bankname')->nullable();
            $table->string('ifsccode')->after('accountnumber')->nullable();
            $table->string('bankaddress')->after('ifsccode')->nullable();
            $table->string('bankdoc1')->after('bankaddress')->nullable();
            $table->string('bankdoc2')->after('bankdoc1')->nullable();
            $table->string('aadhar')->after('bankdoc2')->nullable();
            $table->string('pancard')->after('aadhar')->nullable();
            $table->string('domicile')->after('pancard')->nullable();
            $table->string('educationdoc1')->after('domicile')->nullable();
            $table->string('educationdoc2')->after('educationdoc1')->nullable();
            $table->string('educationdoc3')->after('educationdoc2')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['emp_id', 'lastname', 'alternatemobile', 'country_id', 'pcountry_id', 'state_id', 'pstate_id', 'city_id', 'pcity_id', 'pincode',
        
            'p_pincode', 'marital_status', 'gender', 'dob', 'company_id', 'department_id', 'designation_id', 'joindate', 'confirmdate', 'exitdate',
        
            'bankname', 'accountnumber', 'ifsccode', 'bankaddress', 'bankdoc1', 'bankdoc2', 'aadhar', 'pancard', 'domicile', 'educationdoc1', 'educationdoc2', 'educationdoc3']);
        });
    }
};
