<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function validation( Request $request)
    {
    	$validator =Validator::make($request->all(),[
            'tenloai'    =>  'required|unique:loai_mon,tenloai',
        ],
        [
                'tenloai.required'=>'Vui lòng nhập tên loại',
                'tenloai.unique'=>'Tên loại đã tồn tại',
        ]);
        return $validator;
    }
}
