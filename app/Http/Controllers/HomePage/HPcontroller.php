<?php
namespace App\Http\Controllers\HomePage;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HPcontroller extends Controller
{
    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('HomePage.resume');
    }
    public function pratice($tag)
    {
    	switch ($tag) {
    		case 'sub1':
    			return view('HomePage.sub1_practice');
    			break;
    		case 'sub2':
    			return view('HomePage.sub2_practice');
    			break;
    		default:
    			return view('HomePage.pratice');
    			break;
    	}
    }
    public function submit(Request $request)
    {
        // 取得表單欄位內容
        $info = $request->all();
        $to = $info["To"];
		$from = $info["From"];
		$subject = $info["Subject"];
		$body = $info["TextBody"];
		// 建立郵件標頭
		$header = "From: $from \nReply-To: $from \n"; 
		// 送出郵件
		$MailResponse = array();
		if (mail($to, $subject, $body, $header)){
			$MailResponse['flag'] = 1;
			$MailResponse['msg'] = "郵件已經成功的寄出!";
		}else{
			$MailResponse['flag'] = 0;
			$MailResponse['msg'] = "郵件寄送失敗!";
		}
        return view('HomePage.sub2_practice')->with('MailResponse',$MailResponse);
    }
}
