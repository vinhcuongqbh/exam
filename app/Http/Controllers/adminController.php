<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\kythi;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if (Auth::user()->idcapbac == 1) {
            return view('admin.index');   
        } else {
            $thisinh = DB::table('users')
            ->join('capbacs', 'capbacs.idcapbac', '=', 'users.idcapbac')
            ->join('phongs', 'phongs.idphong', '=', 'users.idphong')
            ->where('id',Auth::user()->id)
            ->first();
            return redirect()->action([homeController::class, 'index']);
        }
    }


    public function tonghop()
    {
        $kythi = kythi::orderby('idkythi', 'desc')->get();        
    
        return view('admin.tonghop.index', ['kythi' => $kythi]);
    }


    public function tonghopketqua(Request $request)
    {
        $kythidachon = $request->kythi;
        $kythi = kythi::orderby('idkythi', 'desc')->get(); 
        $baithi = DB::table('baithis')
        ->where('idkythi', '=', $request->kythi)
        ->join('users', 'users.id', '=', 'baithis.idthisinh')
        ->join('phongs', 'phongs.idphong', '=', 'users.idphong')
        ->select('baithis.*', 'users.*', 'phongs.*')
        ->orderBy('baithis.diemtonghop','desc')
        ->get();
    
        return view('admin.tonghop.tonghop', ['kythi' => $kythi, 
                                               'kythidachon' => $kythidachon, 
                                               'baithi' => $baithi]);
    }
}
