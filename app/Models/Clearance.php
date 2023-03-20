<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clearance extends Model
{
    use HasFactory;

    protected $fillable = [
        'clearanceFname',
        'clearanceLname',
        'clearanceMname',
        'clearanceSuffix',
        'clearanceHousenumber',
        'clearanceStreetname',
        'clearanceNationality',
        'clearanceGender',
        'clearanceMaritalstatus',
        'clearanceImage',
    ];

    protected $table = "clearances";

    //Including User Table for Foreign Key Purposes
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Including Barangay Official Table for Foreign Key Purposes
    public function barangay_official()
    {
        return $this->belongsTo(BarangayOfficial::class);
    }
}
