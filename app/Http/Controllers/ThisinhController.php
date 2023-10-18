<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\capbac;
use App\Models\phong;

class ThisinhController extends Controller
{   
    public function index()
    {
        //Hiển thị danh sách thí sinh
        $thisinh = DB::table('users')
        ->where('users.idcapbac','=',2)
        ->where('users.trangthai','=',1)
        ->join('capbacs', 'capbacs.idcapbac', '=', 'users.idcapbac')
        ->join('phongs', 'phongs.idphong', '=', 'users.idphong')
        ->orderBy('id', 'asc')
        ->paginate(20);

        return view('admin.thisinh.index',['thisinh' => $thisinh]);
    }


    public function daxoa()
    {
        //Hiển thị danh sách thí sinh
        $thisinh = DB::table('users')
        ->where('users.trangthai','=',0)
        ->join('capbacs', 'capbacs.idcapbac', '=', 'users.idcapbac')
        ->join('phongs', 'phongs.idphong', '=', 'users.idphong')
        ->orderBy('id', 'asc')
        ->paginate(20);    

        return view('admin.thisinh.index',['thisinh' => $thisinh]);
    }  


    public function quantri()
    {
        //Hiển thị danh sách thí sinh
        $thisinh = DB::table('users')
        ->where('users.idcapbac','=',1)
        ->where('users.trangthai','=',1)
        ->join('capbacs', 'capbacs.idcapbac', '=', 'users.idcapbac')
        ->join('phongs', 'phongs.idphong', '=', 'users.idphong')
        ->orderBy('id', 'asc')
        ->paginate(20);     

        return view('admin.thisinh.index',['thisinh' => $thisinh]);
    }

    public function timkiem(Request $request)
    {
        //Hiển thị danh sách thí sinh
        
        $thisinh = DB::table('users')
        ->join('capbacs', 'capbacs.idcapbac', '=', 'users.idcapbac')
        ->join('phongs', 'phongs.idphong', '=', 'users.idphong')
        ->where('name', 'LIKE', "%{$request->timkiem}%")
        ->orWhere('email', 'LIKE', "%{$request->timkiem}%") 
        ->paginate(20);

        $thisinh->appends(['timkiem' => $request->timkiem]);

        return view('admin.thisinh.index',['thisinh' => $thisinh]);
    }

   
    public function create()
    {
        //Hiển thị form tạo thí sinh mới
        $capbac = capbac::all();
        $phong = phong::all();
        $password = rand(100000,999999);
        return view('admin.thisinh.create',['capbac' => $capbac, 'phong' => $phong, 'password' => $password]);
    }

   
    public function store(Request $request)
    {      
       
        //Kiểm tra thông tin đầu vào
        $validated = $request->validate([
            'name' => 'required',
            'ngaysinh' => 'required|date',
            'phong' => 'required',
            'email' => 'required|unique:App\Models\User,email',
            'password' => 'required',
            'capbac' => 'required',
        ]);


        //Tạo thí sinh mới
        $thisinh = new User;
        $thisinh->name = $request->name;
        $thisinh->ngaysinh = $request->ngaysinh;
        $thisinh->idphong = $request->phong;
        $thisinh->email = $request->email;
        $thisinh->password = Hash::make($request->password);
        $thisinh->password2 = $request->password;
        $thisinh->idcapbac = $request->capbac;
        $thisinh->trangthai = 1;
        $thisinh->save();

        return redirect()->action([ThisinhController::class, 'create']);
    }

   
    public function show($id)
    {
        //Hiển thị thông tin thí sinh
        $thisinh = DB::table('users')
        ->join('capbacs', 'capbacs.idcapbac', '=', 'users.idcapbac')
        ->join('phongs', 'phongs.idphong', '=', 'users.idphong')
        ->where('users.id', $id)
        ->first();

        return view('admin.thisinh.show', ['thisinh' => $thisinh]);
    }

   
    public function edit($id)
    {
        //Hiển thị thông tin thí sinh để cập nhật
        $thisinh = User::find($id);
        $capbac = capbac::all();
        $phong = phong::all();

        return view('admin.thisinh.edit', ['thisinh' => $thisinh, 'capbac' => $capbac, 'phong' => $phong]);
    }

    
    public function update(Request $request, $id)
    {       
        //Kiểm tra thông tin đầu vào
        $validated = $request->validate([
            'name' => 'required',
            'ngaysinh' => 'required|date',
            'phong' => 'required',
            'password' => 'required',
            'capbac' => 'required',
        ]);

        //Cập nhật thông tin thí sinh
        $thisinh = User::find($id);
        $thisinh->name = $request->name;
        $thisinh->ngaysinh = $request->ngaysinh;
        $thisinh->idphong = $request->phong;
        $thisinh->password = Hash::make($request->password);
        $thisinh->password2 = $request->password;
        $thisinh->idcapbac = $request->capbac;
        $thisinh->trangthai = $request->trangthai;
        $thisinh->save();    

        return redirect()->action([ThisinhController::class, 'show'], ['id' => $id]);
    }

    
    public function delete($id)
    {
        $thisinh = User::find($id);
        $thisinh->trangthai = 0;
        $thisinh->save(); 

        return back();
    }

    public function restore($id)
    {
        $thisinh = User::find($id);
        $thisinh->trangthai = 1;
        $thisinh->save(); 

        return back();
    }

}
