<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kythi;

class KythiController extends Controller{
   
    public function index()
    {
        $kythi = kythi::where('trangthai', 1)->paginate(20);
        
        return view('admin.kythi.index',['kythi' => $kythi]);
    }


    public function daxoa()
    {
        $kythi = kythi::where('trangthai', 0)->paginate(20);

        return view('admin.kythi.index',['kythi' => $kythi]);
    }


    public function timkiem(Request $request)
    {
        $kythi = kythi::where('tenkythi', 'LIKE', "%{$request->timkiem}%")->paginate(20);

        $kythi->appends(['timkiem' => $request->timkiem]);

        return view('admin.kythi.index',['kythi' => $kythi]);
    }


    
    public function create()
    {
        return view('admin.kythi.create');
    }

   
    public function store(Request $request)
    {
        //Kiểm tra thông tin đầu vào
        $validated = $request->validate([
            'tenkythi' => 'required', 
            'ngaydienra' => 'required',
        ]);

        //Tạo Kỳ thi mới
        $kythi = new kythi;
        $kythi->tenkythi = $request->tenkythi;
        $kythi->ngaydienra = $request->ngaydienra;
        $kythi->mota = $request->mota;
        $kythi->trangthai = 1;       
        $kythi->save();    
        
        return redirect()->action([KythiController::class, 'create']);
    }

   
    public function show($id)
    {
        //Hiển thị Kỳ thi
        $kythi = kythi::find($id);
        return view('admin.kythi.show', ['kythi' => $kythi]);
    }

   
    public function edit($id)
    {
       //Hiển thị Kỳ thi để cập nhật
        $kythi = kythi::find($id);
        return view('admin.kythi.edit', ['kythi' => $kythi]);
    }

   
    public function update(Request $request, $id)
    {
        //Kiểm tra thông tin đầu vào
        $validated = $request->validate([
            'tenkythi' => 'required',
            'ngaydienra' => 'required',
        ]);

        //Cập nhật câu hỏi
        $kythi = kythi::find($id);
        $kythi->tenkythi = $request->tenkythi;
        $kythi->ngaydienra = $request->ngaydienra;
        $kythi->mota = $request->mota;
        $kythi->trangthai = $request->trangthai;       
        $kythi->save();    

        return redirect()->action([KythiController::class, 'show'], ['id' => $id]);
    }

   
    public function delete($id)
    {
        $kythi = kythi::find($id);
        $kythi->trangthai = 0;
        $kythi->save(); 

        return back();        
    }

    public function restore($id)
    {
        $kythi = kythi::find($id);
        $kythi->trangthai = 1;
        $kythi->save(); 

        return back();        
    }
}
