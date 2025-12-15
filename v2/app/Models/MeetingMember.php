<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting_id',
        'user_id',
        'role', // 0: Chairman, 1: Recorder, 2: Member
    ];

    const ROLE_CHAIRMAN = 0;
    const ROLE_RECORDER = 1;
    const ROLE_MEMBER = 2;

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function user()
    {
        return $this->belongsTo(AdminUser::class, 'user_id');
    }
}
