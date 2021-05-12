<?php

namespace App\Controllers;

use App\Models\UrlModel;

class S extends BaseController
{
	public function index($code)
	{
		$model = new UrlModel();
		$url = $model->where('short_code', $code)->first();
		if (!empty($url))
			return redirect()->to($url['original_url']);
		else
			return redirect()->to( base_url());
	}

}
