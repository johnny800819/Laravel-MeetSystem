<?php

namespace App\Models\Meeting;

use Illuminate\Database\Eloquent\Model;
use DB;

class MeetModel extends Model
{
	public function __construct()
	{

	}

	public function get_user_info()
	{
		/* return json array */
		$result = array();
		$users = DB::table('users')->get();
		
	    foreach ($users as $data) {
	    	$item = array();
	    	$item['name'] = $data->name;

	    	array_push($result, $item);
	    }
	    return json_encode($result);
	}

	public function save_meet_event($info)
	{
		/* void */
		DB::table('meeting_event')->insert([
		    [
		     'mt_name' => $info['mt_name'], 
		     'mt_position' => $info['mt_position'],
		     'mt_context' => $info['mt_context'],
		     'mt_date' => $info['mt_date'],
		     'mt_cycle' => 0,
		     'mt_status' => 0
		    ]
		]);
	}

	public function save_meet_member($info)
	{
		/* void */
		if(!empty($info))
		{
			$mt_id = DB::table('meeting_event')->where([
			    ['mt_name', '=', $info['mt_name']],
			    ['mt_date', '=', $info['mt_date'].':00'],
			    ['mt_status', '=', '0']
			])->value('mt_id');

			DB::table('meeting_member')->insert([
			    [
			     'mt_user_id' => $info['chairman_selected'], 
			     'mt_id' => $mt_id,
			     'mt_identity' => 0
			    ],
			    [
			     'mt_user_id' => $info['recordman_selected'], 
			     'mt_id' => $mt_id,
			     'mt_identity' => 1
			    ]
			]);

			$member_array = explode(' ', $info['member_selected']);
			foreach ($member_array as $member_name) {
				if(!empty($member_name)) {
					DB::table('meeting_member')->insert([
					    [
					     'mt_user_id' => $member_name, 
					     'mt_id' => $mt_id,
					     'mt_identity' => 2
					    ]
					]);
				}
			}
		}
	}
}
