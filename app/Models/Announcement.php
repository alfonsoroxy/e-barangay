<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'announcementSubject',
        'announcementFrom',
        'announcementMessage',
    ];

    use HasFactory;

    protected $table = 'announcements';
}
