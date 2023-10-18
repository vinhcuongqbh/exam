<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cauhoi;


class CauhoiController extends Controller
{    
    public function index()
    {
        //Hiển thị danh sách câu hỏi
        $cauhoi = cauhoi::where('trangthai', 1)->paginate(20);     

        return view('admin.cauhoi.index',['cauhoi' => $cauhoi]);
    }

    public function daxoa()
    {
        //Hiển thị danh sách câu hỏi
        $cauhoi = cauhoi::where('trangthai', 0)->paginate(20);     

        return view('admin.cauhoi.index',['cauhoi' => $cauhoi]);
    }

    public function timkiem(Request $request)
    {
        //Hiển thị danh sách câu hỏi
        $cauhoi = cauhoi::where('cauhoi', 'LIKE', "%{$request->timkiem}%")->paginate(20);
        $cauhoi->appends(['timkiem' => $request->timkiem]);

        return view('admin.cauhoi.index',['cauhoi' => $cauhoi]);
    }

   
    public function create()
    {
        //Hiển thị form tạo câu hỏi mới
        return view('admin.cauhoi.create');
    }

   
    public function store(Request $request)
    {        
        //Kiểm tra thông tin đầu vào
        $validated = $request->validate([
            'linhvuc' => 'required',
            'cauhoi' => 'required',
            'dapan1' => 'required',
            'dapan2' => 'required',
            'dapan3' => 'required',
            'dapan4' => 'required',
            'dapandung' => 'required',
        ]);

        //Tạo câu hỏi mới
        $cauhoi = new cauhoi;
        $cauhoi->linhvuc = $request->linhvuc;
        $cauhoi->trangthai = 1;
        $cauhoi->cauhoi = $request->cauhoi; 
        $cauhoi->dapan1 = $request->dapan1;
        $cauhoi->dapan2 = $request->dapan2; 
        $cauhoi->dapan3 = $request->dapan3; 
        $cauhoi->dapan4 = $request->dapan4;  
        $cauhoi->dapandung = $request->dapandung; 
        $cauhoi->save();    
        
        return redirect()->action([CauhoiController::class, 'create']);
    }

    
    public function show($id)
    {
        //Hiển thị câu hỏi
        $cauhoi = cauhoi::find($id);
        return view('admin.cauhoi.show', ['cauhoi' => $cauhoi]);
    }

    
    public function edit($id)
    {
        //Hiển thị câu hỏi để cập nhật
        $cauhoi = cauhoi::find($id);
        return view('admin.cauhoi.edit', ['cauhoi' => $cauhoi]);
    }

   
    public function update(Request $request, $id)
    {
        //Kiểm tra thông tin đầu vào
        $validated = $request->validate([
            'linhvuc' => 'required',
            'cauhoi' => 'required',
            'dapan1' => 'required',
            'dapan2' => 'required',
            'dapan3' => 'required',
            'dapan4' => 'required',
            'dapandung' => 'required',
        ]);

        //Cập nhật câu hỏi
        $cauhoi = cauhoi::find($id);
        $cauhoi->linhvuc = $request->linhvuc;
        $cauhoi->trangthai = $request->trangthai;
        $cauhoi->cauhoi = $request->cauhoi; 
        $cauhoi->dapan1 = $request->dapan1;
        $cauhoi->dapan2 = $request->dapan2; 
        $cauhoi->dapan3 = $request->dapan3; 
        $cauhoi->dapan4 = $request->dapan4;  
        $cauhoi->dapandung = $request->dapandung; 
        $cauhoi->save();    

        return redirect()->action([CauhoiController::class, 'show'], ['id' => $id]);
    }

   
    public function delete($id)
    {
        //Xóa câu hỏi
        $cauhoi = cauhoi::find($id);
        $cauhoi->trangthai = 0;
        $cauhoi->save(); 

        return back();
    }

    public function restore($id)
    {
        //Phục hồi câu hỏi
        $cauhoi = cauhoi::find($id);
        $cauhoi->trangthai = 1;
        $cauhoi->save(); 

        return back();
    }
}
