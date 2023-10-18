<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\cauhoi;
use App\Models\baithi;
use App\Models\noidungbaithi;


class NoidungbaithiController extends Controller
{
    public function index()
    {        
        
    }
    
    public function create($id)
    {

        //Tạo idbaithi
        date_default_timezone_set("Asia/Bangkok");      
        $idkythi = $id; 
        $idbaithi = $idkythi.Auth::id();      
        $idthisinh = Auth::id(); 

        //Kiểm tra idbaithi đã tồn tại trong CSDL baithi
        if (baithi::where('idbaithi', $idbaithi)->exists()) {
            $baithi = baithi::where('idbaithi', $idbaithi)->first();

            if ($baithi->diemtonghop != NULL) return view('baithi.error');
            else {

            //lấy dữ liệu bài thi đã có
            $cauhoi = DB::table('noidungbaithis')
                      ->where('idbaithi', $idbaithi)
                      ->join('cauhois','cauhois.idcauhoi', '=', 'noidungbaithis.idcauhoi')
                      ->get();
            $cauhoiphapluat = $cauhoi->take(20);
            $cauhoichuyenmon = $cauhoi->take(-40);

            return view('baithi.noidungbaithi',['idbaithi' => $idbaithi, 
                                                'cauhoiphapluat' => $cauhoiphapluat,
                                                'cauhoichuyenmon' => $cauhoichuyenmon,
                                                'thoigianbatdau' => $baithi->created_at]);        
            }
        } else {

            //Lưu idbaithi vào CSDL bài thi
            $baithi = new baithi;
            $baithi->idbaithi = $idbaithi;
            $baithi->idthisinh = $idthisinh;
            $baithi->idkythi = $idkythi;
            $baithi->trangthai = 1;
            $baithi->save();

            //Chọn các câu hỏi pháp luật đang được sử dụng
            $cauhoiphapluat = cauhoi::where('linhvuc', 1)
                ->where('trangthai', 1)
                ->orderBy('idcauhoi')
                ->get();        
            //Trộn ngẫu nhiên các câu hỏi pháp luật trong collection
            $cauhoiphapluat = $cauhoiphapluat->shuffle();
            //Chọn các câu hỏi pháp luật
            $cauhoiphapluat = $cauhoiphapluat->take(20);


            //Chọn các câu hỏi chuyên môn đang được sử dụng
            $cauhoichuyenmon = cauhoi::where('linhvuc', 2)
                ->where('trangthai', 1)
                ->orderBy('idcauhoi')
                ->get();        
            //Trộn ngẫu nhiên các câu hỏi chuyên môn trong collection
            $cauhoichuyenmon = $cauhoichuyenmon->shuffle();
            //Chọn các câu hỏi chuyên môn
            $cauhoichuyenmon = $cauhoichuyenmon->take(40);      
            
            //Lưu id câu hỏi  vào CSDL nội dung bài thi
            foreach ($cauhoiphapluat as $i) {
                $noidungbaithi = new noidungbaithi; 
                $noidungbaithi->idbaithi = $idbaithi; 
                $noidungbaithi->idcauhoi = $i->idcauhoi;  
                $noidungbaithi->dapandung = $i->dapandung; 
                $noidungbaithi->dapanthisinh = null; 
                $noidungbaithi->diem = null;
                $noidungbaithi->save();
            }
            
            foreach ($cauhoichuyenmon as $i) {
                $noidungbaithi = new noidungbaithi; 
                $noidungbaithi->idbaithi = $idbaithi;
                $noidungbaithi->idcauhoi = $i->idcauhoi; 
                $noidungbaithi->dapandung = $i->dapandung;
                $noidungbaithi->dapanthisinh = null;
                $noidungbaithi->diem = null;
                $noidungbaithi->save(); 
            }
          
            
            return view('baithi.noidungbaithi', ['idbaithi' => $idbaithi,
                                    'cauhoiphapluat' => $cauhoiphapluat, 
                                    'cauhoichuyenmon' => $cauhoichuyenmon,
                                    'thoigianbatdau' => $baithi->created_at]);   
        }                  
    }


    public function store(Request $request)
    {
        $baithi = baithi::where('idbaithi', '=', $request->idbaithi)->first();
        if (!empty($baithi->diemtonghop)) {
            return view('baithi.error');
        } else {

            date_default_timezone_set("Asia/Bangkok");
            //Lấy danh sách câu hỏi thuộc đề thi của thí sinh
            $cauhoi = noidungbaithi::where('idbaithi', $request->idbaithi)            
                ->get();  
            
            
            //Cập nhật đáp án của thí sinh tương ứng với từng câu hỏi trong đề thi    
            foreach ($cauhoi as $i) {
                $temp="cauhoi".$i->idcauhoi;
                $noidungbaithi = noidungbaithi::where('idbaithi', $request->idbaithi)
                        ->where('idcauhoi', $i->idcauhoi)
                        ->update(['dapanthisinh' => $request->$temp]);
            }
            
            //So sánh đáp án của thí sinh với đáp án đúng của từng câu hỏi trong đề thi
            $baithi2 = noidungbaithi::where('idbaithi', $request->idbaithi)->get();

            $diemtonghop = 0;
            foreach ($baithi2 as $i) {
                if ($i->dapanthisinh == $i->dapandung) 
                    {
                        $noidungbaithi = noidungbaithi::where('idbaithi', $request->idbaithi)
                        ->where('idcauhoi', $i->idcauhoi)
                        ->update(['diem' => 1]);
                        $diemtonghop++;
                    }
                else 
                    {
                        $noidungbaithi = noidungbaithi::where('idbaithi', $request->idbaithi)
                        ->where('idcauhoi', $i->idcauhoi)
                        ->update(['diem' => 0]);
                    }
            }

            //Cập nhật diemtonghop
            $baithi = baithi::where('idbaithi', $request->idbaithi)
            ->update(['diemtonghop' => $diemtonghop]);

            //Cập nhật số lần phạm quy
            $baithi = baithi::where('idbaithi', $request->idbaithi)
            ->update(['phamquy' => $request->phamquy]);

            return view('baithi.ketqua', ['idbaithi' => $request->idbaithi, 'diemtonghop' => $diemtonghop]);
        }
    }


    
    public function show(Request $request)
    {
        $ketquabaithi = DB::table('noidungbaithis')
        ->join('cauhois', 'cauhois.idcauhoi', '=', 'noidungbaithis.idcauhoi')
        ->where('noidungbaithis.idbaithi', $request->id)
        ->get();

        $thisinh = DB::table('baithis')
        ->join('users','users.id', '=', 'baithis.idthisinh')
        ->join('phongs','phongs.idphong', '=', 'users.idphong')
        ->where('idbaithi', $request->id)
        ->first();

        return view('baithi.ketquabaithi', ['thisinh' => $thisinh,'ketquabaithi' => $ketquabaithi]);
    }

public function phuchoibaithi(Request $request, $id) {

        
    }
    
    
    public function edit($id)
    {
        //
    }

    

    public function update(Request $request, $id)
    {
        //
    }

    

    public function destroy($id)
    {
        //
    }
}
