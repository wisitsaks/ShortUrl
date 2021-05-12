<?php

namespace App\Controllers;

use Endroid\QrCode\QrCode;
use App\Models\UrlModel;


class Home extends BaseController
{
	public function index()
	{
		$data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'url' => 'required|min_length[6]|max_length[200]'
            ];
			
			$errors = [
                'url' => [
                    'validateUrl' => "กรุณาระบุ URL ให้ถูกต้อง",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('home', [
                    "validation" => $this->validator,
                ]);

            } else {
				
				$data['url'] = trim($this->request->getVar('url'));
				
				
				// check exists url
				$model = new UrlModel();
				$url = $model->where('original_url', $data['url'])->first();
				
				if (!empty($url))
				{
					//load from db if exists 
					$data['short'] = base_url('s')."/".$url['short_code'];
					$data['qr'] = 'qr/'.$url['short_code'].'.png';
					return view('home', $data);
				}
				else {
					// loop to find same Code
					$length = 8;
					$shortCode = $this->getToken($length);
					$url = $model->where('short_code', $shortCode)->first();
					while(!empty($url))
					{
						$shortCode = $this->getToken($length);
						$url = $model->where('short_code', $shortCode)->first();
					}
										
					$data['short'] = base_url('s')."/".$shortCode;
					
					// save Data
					$model = new UrlModel();
					$newData = [
						'short_code' => $shortCode,
						'original_url' => $data['url']
					];
					$model->save($newData);
					
					//gen QR code;
					$data['qr'] = $this->createQrCode($data['short'], $shortCode);
					
					return view('home', $data);
				}
            }
        }
		
		return view('home');
	}

	private function getToken($length)
	{
		$token = "";
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet.= "0123456789";
		$max = strlen($codeAlphabet); // edited

		for ($i=0; $i < $length; $i++) {
			$token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
		}

		return $token;
	}
	
	function crypto_rand_secure($min, $max)
	{
		$range = $max - $min;
		if ($range < 1) return $min; // not so random...
		$log = ceil(log($range, 2));
		$bytes = (int) ($log / 8) + 1; // length in bytes
		$bits = (int) $log + 1; // length in bits
		$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
		do {
			$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd = $rnd & $filter; // discard irrelevant bits
		} while ($rnd > $range);
		return $min + $rnd;
	}
	
	function createQrCode($url, $code)
	{
		$qrCode = new QrCode($url);


		$file_name = FCPATH.'/qr/'.$code.'.png';
		$qrCode->getContentType();
		$qrCode->writeFile($file_name);
		return 'qr/'.$code.'.png';

	}
	
}
