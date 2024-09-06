<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'emp_id',
        'name',
        'lastname',
        'email',
        'password',
        'mobile',
        'alternatemobile',
        'address',
        'permanentaddress',
        'city_id',
        'state_id',
        'country_id',
        'pincode',
        'pcity_id',
        'pstate_id',
        'pcountry_id',
        'p_pincode',
        'role_id',
        'gender',
        'marital_status',
        'dob',
        'company_id',
        'department_id',
        'designation_id',
        'joindate',
        'confirmdate',
        'exitdate',
        'bankname',
        'accountnumber',
        'ifsccode',
        'bankaddress',
        'bankdoc1',
        'bankdoc2',
        'aadhar',
        'pancard',
        'domicile',
        'aadharno',
        'pancardno',
        'educationdocument',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // Remove 'educationdocument' from here as it's handled manually
    ];

    /**
     * Accessor for educationdocument attribute.
     *
     * @param  string  $value
     * @return array
     */
    public function educationDocuments()
    {
        return $this->hasMany(EducationDocument::class);
    }
    /**
     * Mutator for educationdocument attribute.
     *
     * @param  array  $value
     * @return void
     */
    public function setEducationdocumentAttribute($value)
    {
        $this->attributes['educationdocument'] = json_encode($value); // Encode array to JSON string
    }
}
