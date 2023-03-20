<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indigency extends Model
{
    use HasFactory;

    protected $fillable = [
        'indigencyFname',
        'indigencyLname',
        'indigencyMname',
        'indigencySuffix',
        'indigencyHousenumber',
        'indigencyStreetname',
        'indigencyPurpose',
        'indigencyImage',
    ];

    protected $table = "indigencies";

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
