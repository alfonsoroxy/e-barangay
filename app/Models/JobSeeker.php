<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JobSeeker extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobSeekerFname',
        'jobSeekerLname',
        'jobSeekerMname',
        'jobSeekerSuffix',
        'jobSeekerHousenumber',
        'jobSeekerStreetname',
        'jobSeekerNationality',
        'jobSeekerGender',
        'jobSeekerMaritalstatus',
        'jobSeekerAge',
        'jobSeekerResidentstayyears',
        'jobSeekerImage',
    ];

    protected $table = "job_seekers";

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

    //Calculate Age
    public function age()
    {
        return \Carbon\Carbon::parse($this->jobSeekerAge)->diff(\Carbon\Carbon::now())
            ->format('%y years old');
    }

    //Calculate Stay of Years
    public function getStayYears()
    {
        return \Carbon\Carbon::parse($this->jobSeekerResidentstayyears)->diff(\Carbon\Carbon::now())
            ->format('%y years and %m months');
    }
}
