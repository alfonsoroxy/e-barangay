<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BHERT extends Model
{
    use HasFactory;

    protected $fillable = [
        'bhertFname',
        'bhertLname',
        'bhertMname',
        'bhertSuffix',
        'bhertHousenumber',
        'bhertStreetname',
        'bhertPurpose',
        'bhertAge',
        'bhertImage',
    ];

    protected $table = 'bherts';

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
