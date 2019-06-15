<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiMon;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class LoaiMonController extends Controller
{
    public function index()
    {
    	$loaimon=LoaiMon::all();
    	return view('admin.loaimon.danhsach',['loaimon'=>$loaimon]);
    }
    public function store()
    {

    }
    public function addPost( Request $request)
    {
      // $rules = array(
      //       'first_name'    =>  'required|unique:loai_mon,tenloai',
      //       //'last_name'     =>  'required'
      //   );

      // $error = Validator::make($request->all(), $rules);
        // $validator =Validator::make($request->all(),[
        //     'tenloai'    =>  'required|unique:loai_mon,tenloai',
        // ],
        // [
        //         'tenloai.required'=>'Vui lòng nhập tên loại',
        //         'tenloai.unique'=>'Tên loại đã tồn tại',
        // ]);

      if(validation($request)->fails())
      {
        return response()->json(['errors' => validation($request)->errors()->all()]);
    }

        // $image = $request->file('image');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();

        // $image->move(public_path('images'), $new_name);
    else
    {
        $loaimon = new LoaiMon;
        $loaimon->tenloai=$request->tenloai;
        $loaimon->created_at=date('Y-m-d H:m:s');
        $loaimon->save();
        //LoaiMon::create($form_data);

        return response()->json(['success' => 'Thêm Thành Công!']);
    }

}
public function destroy($id)
{
    $loaimon = LoaiMon::find($id);
    $loaimon->delete();
    return response()->json(['success' => 'Xóa Thành Công!']);
}
public function edit($id)
{
 if(request()->ajax())
 {
    $loaimon = LoaiMon::find($id);
    return response()->json(['loaimon' => $loaimon]);
}
}
public function update(Request $request)
{
        $validator =Validator::make($request->all(),[
            'tenloai'    =>  'required|unique:loai_mon,tenloai',
        ],
        [
                'tenloai.required'=>'Vui lòng nhập tên loại',
                'tenloai.unique'=>'Tên loại đã tồn tại',
        ]);

        //$validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
    

    // $form_data = array(
    //     'first_name'       =>   $request->first_name,
    //     'last_name'        =>   $request->last_name,
    //     'image'            =>   $image_name
    // );
        $loaimon = LoaiMon::find($request->hidden_id);
        $loaimon->tenloai=$request->tenloai;
        $loaimon->updated_at=date('Y-m-d H:m:s');
        $loaimon->save();
    //AjaxCrud::whereId($request->hidden_id)->update($form_data);

    return response()->json(['success' => 'Cập Nhật Thành Công']);
    //$image_name = $request->hidden_image;
    //$image = $request->file('image');
    // if($image != '')
    // {
    //     $rules = array(
    //         'first_name'    =>  'required',
    //         'last_name'     =>  'required',
    //         'image'         =>  'image|max:2048'
    //     );
    //     $error = Validator::make($request->all(), $rules);
    //     if($error->fails())
    //     {
    //         return response()->json(['errors' => $error->errors()->all()]);
    //     }

    //     $image_name = rand() . '.' . $image->getClientOriginalExtension();
    //     $image->move(public_path('images'), $image_name);
    // }
    // else
    // {
    //     $rules = array(
    //         'first_name'    =>  'required',
    //         'last_name'     =>  'required'
    //     );

    //     $error = Validator::make($request->all(), $rules);

    //     if($error->fails())
    //     {
    //         return response()->json(['errors' => $error->errors()->all()]);
    //     }
    // }

    // $form_data = array(
    //     'first_name'       =>   $request->first_name,
    //     'last_name'        =>   $request->last_name,
    //     'image'            =>   $image_name
    // );
    // AjaxCrud::whereId($request->hidden_id)->update($form_data);

    // return response()->json(['success' => 'Data is successfully updated']);
}

}
