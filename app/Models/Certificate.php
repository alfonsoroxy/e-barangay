<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificateFname',
        'certificateLname',
        'certificateMname',
        'certificateSuffix',
        'certificateHousenumber',
        'certificateStreetname',
        'certificatePurpose',
        'certificateImage',
    ];

    protected $table = 'certificates';

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
