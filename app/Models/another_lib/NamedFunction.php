<?php
namespace App\Models\another_lib;

require_once __DIR__ . '/../../../public/recaptcha-master/src/autoload.php';

use Illuminate\Database\Eloquent\Model;
use DB;

//re-chaptcha Register API keys at https://www.google.com/recaptcha/admin
class NamedFunction
{
	private $siteKey = '6LdhkSEUAAAAAC_L6Jfi_oJkLBnjg1CCaMHSpdff';
	private $secretKey = '6LdhkSEUAAAAABBV8st_ZqoHTr2IgtNX6taqAEHc';
	private $lang = 'zh-TW';

	public function get_key($k_name){
		switch($k_name){
			case 'site':
				return $this->siteKey;
			break;
			case 'secret':
				return $this->secretKey;
			break;
			default:
				return null;
			break;
		}
	}
	public function get_lang(){
		return $this->lang;
	} 

	public function verify($g_recaptcha_response)
	{
		$response = $g_recaptcha_response;
		$recaptcha = new \ReCaptcha\ReCaptcha($this->secretKey);
		$resp = $recaptcha->verify($response, $_SERVER['REMOTE_ADDR']);
		if ($resp->isSuccess()){
			return true;
		}else{
			foreach ($resp->getErrorCodes() as $code) {
                echo '<tt>' , $code , '</tt> ';
            }
		}
	}
}
?>
