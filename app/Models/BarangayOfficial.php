<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayOfficial extends Model
{
    use HasFactory;

    protected $fillable = [
        'brgyOfficialFname',
        'brgyOfficialLname',
        'brgyOfficialMname',
        'brgyOfficialSuffix',
        'brgyOfficialPosition',
        'brgyOfficialHousenumber',
        'brgyOfficialStreetname',
        'brgyOfficialEmail',
        'brgyOfficialContact',
        'brgyImage',
    ];

    protected $table = 'barangay_officials';
}
