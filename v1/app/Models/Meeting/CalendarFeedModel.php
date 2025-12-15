<?php

namespace App\Models\Meeting;

use Illuminate\Database\Eloquent\Model;

class CalendarFeedModel extends Model
{
	protected $table = 'meeting_event';
	public $timestamps = false;
}
