<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiMon;
use Validator;
use App\Mon;
use Illuminate\Support\Facades\Input;
class LoaiMonController extends Controller
{
    public function index()
    {
        $khuvuc = LoaiMon::all();
        if(request()->ajax())
        {
            return datatables()->of(LoaiMon::latest()->get())
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.loaisanpham.danhsach');
    }
    public function add( Request $request)
    {
        $validator =Validator::make($request->all(),[
            'tenloai'    =>  'required|unique:loai_mon,tenloai',
            'note'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
        ],
        [
            'tenloai.unique'=>'Tên đã tồn tại',
            //'note.regex'=>'Mô tả không hợp lệ',
            //'note.max'=>'Mô tả quá dài',
        ]);

        //$validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        else
        {
            $data = new LoaiMon;
            $data->tenloai=$request->tenloai;
            $data->created_at=date('Y-m-d H:i:s');
            $data->save();
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
        $data = LoaiMon::find($id);
        return response()->json(['data' => $data]);
    }
}
public function update(Request $request)
{
    $validator =Validator::make($request->all(),[
        'tenloai'    =>  'required|unique:loai_mon,tenloai,'.$request->hidden_id,
            //'note'=>'regex:/(([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,9})+([\s]*)+([0-9a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{0,9}))$/|max:255|nullable'
    ],
    [
        'tenloai.unique'=>'Tên đã tồn tại',
            //'note.regex'=>'Mô tả không hợp lệ',
            //'note.max'=>'Mô tả quá dài',
    ]);
    if($validator->fails())
    {
        return response()->json(['errors' => $validator->errors()->all()]);
    }
    else
    {
        $data = LoaiMon::find($request->hidden_id);
        $data->tenloai=$request->tenloai;
        $data->updated_at=date('Y-m-d H:i:s');
        $data->save();
        return response()->json(['success' => 'Cập Nhật Thành Công']);
    }

}

}
