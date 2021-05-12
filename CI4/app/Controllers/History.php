<?php

namespace App\Controllers;
use App\Models\UrlModel;

class History extends BaseController
{
	public function index()
	{
		$data = [];
        $model = new UrlModel();

        $data['urls'] = $model->urlList(10);
        return view('history', $data);
	}
	
	
}
