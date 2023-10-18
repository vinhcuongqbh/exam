@extends('layout')
<head>
<title>KẾT QUẢ BÀI THI</title>
</head> 

@section('content')
  <div class="container">
    <div class="row" >
      <div id="right" class="col-12">
        <div id="thongtin" class="alert alert-primary" role="alert">
            <div class="row">
                <div style="text-align: center; margin-bottom: 10px;">
                    <label style="font-size: 20px; font-family: Times New Roman, Times, serif;">
                    SỞ GIAO THÔNG VẬN TẢI QUẢNG BÌNH<br><b>BAN QLDA <u>ĐẦU TƯ XÂY DỰNG CÔNG TRÌNH</u> GIAO THÔNG</b></label>
                </div>            
                <div style="margin: 0;">
                    <img src="/img/logo.png" style="width: 150px;height: 150px; margin-left: auto; margin-right: auto; display: block;">
                </div>
                <div style="text-align: center; margin-top: 50px; margin-bottom: 20px;">
                <label id="tenkythi" style="color: #0b74b8; font-size: 20px; font-weight: bold; font-family: Times New Roman, Times, serif;">KỲ KIỂM TRA SÁT HẠCH CHUYÊN MÔN, NGHIỆP VỤ VÀ NĂNG LỰC CÔNG TÁC <br>ĐỐI VỚI CÁN BỘ KỸ THUẬT, TƯ VẤN GIÁM SÁT NĂM {{ date("Y") }}</label>
                </div>      
            </div>            
            <div class="row">
                <div class="col-md-7">
                    <table class="table">                       
                        <tr>
                            <td class="col-3 col-md-2"><label>Họ và tên:</label></td>
                            <td class="col-9 col-md-10">{{ $thisinh->name }}</td>
                        </tr>
                        <tr>
                            <td><label>Ngày sinh:</label></td>
                            <td>{{ date('d/m/Y', strtotime($thisinh->ngaysinh)) }}</td>
                        </tr>
                        <tr>
                            <td><label>Vị trí việc làm:</label></td>
                            <td>{{ $thisinh->tenphong }}</td>
                        </tr>   
                        <tr>
                            <td><label>Đơn vị:</label></td>
                            <td>Ban Quản lý dự án đầu tư xây dựng công trình giao thông tỉnh Quảng Bình</td>
                        </tr>                      
                    </table> 
                </div>  
                <div class="col-md-5">
                    <table class="table">
                         <tbody>
                            <tr>
                                <td class="col-md-4" scope="col" style="font-weight: bold; text-align: center;">ĐIỂM</td>
                                <td class="col-md-4" scope="col" style="font-weight: bold; text-align: center;">Chữ ký Thí sinh</td>
                                <td class="col-md-4" scope="col" style="font-weight: bold; text-align: center;">Chữ ký Giám khảo</td>
                            </tr>
                            <tr>
                                <td style="font-size: 70px; color: red; text-align: center;"><label style=" border: solid 2px red; border-radius: 50%; width: 110px; height: 110px;">{{ $thisinh->diemtonghop }}</label></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                            </tr>
                        </tbody>
                    </table> 
                </div>   
                <div class="row"> 
                    <div class="col-md-8">
                        <table class="table">                       
                            <tr>
                                <td class="col-3 col-md-3"><label>Số câu trả lời đúng:</label></td>
                                <td class="col-9 col-md-9">{{ $thisinh->diemtonghop }}</td>
                            </tr>
                            <tr>
                                <td><label>Số câu trả lời sai:</label></td>
                                <td>{{ 60-$thisinh->diemtonghop }}</td>
                            </tr>
                            <tr>
                                <td><label>Số lần phạm quy:</label></td>
                                <td>{{ $thisinh->phamquy }}</td>
                            </tr>              
                        </table>
                    </div>
                    <div class="col-12 col-md-4" style="text-align: right;">
                        <button id ="printbtn" type="button" class="btn btn-primary" style="margin: 5px 0px;" onclick="window.print();">IN BÀI THI</button>                        
                    </div>              
                </div>   
            </div>                     
        </div>    
            <?php $tt = 0; ?>
            <div class="alert alert-warning" role="alert" style="text-align: center; font-weight: bold; font-size: 20px;">PHẦN THI KIẾN THỨC PHÁP LUẬT VỀ XÂY DỰNG</div>
            <?php
              $ketquaphapluat = $ketquabaithi->take(20);
              $ketquachuyenmon = $ketquabaithi->take(-40);
              foreach ($ketquaphapluat as $i) { $tt++; ?>
            <table class="table table-bordered table-hover">                                              
                    <tr <?php if ($i->diem == 1) {echo 'class="alert alert-success"';} else {echo 'class="alert alert-danger"';} ?> >                        
                        <td colspan="2"><label for="cauhoi"><b>Câu hỏi <?php echo $tt.": ".$i->cauhoi; ?></b></label></td>
                    </tr>
                    <tr>
                        <td class="col-1" style="text-align: center;"><input class="form-check-input" type="radio" id="cauhoi<?php echo $i->idcauhoi; ?>dapan1" name="cauhoi<?php echo $i->idcauhoi; ?>" value="1" <?php if ($i->dapanthisinh == 1) {echo "Checked";} else {echo "Disabled";} ?>></td> 
                        <td class="col-11"><label for="cauhoi<?php echo $i->idcauhoi; ?>dapan1" <?php if ($i->dapandung == 1) {echo "style='color: green; font-weight: bold'";} ?>>a) <?php echo $i->dapan1; ?></label></td>
                    </tr>    
                    <tr>
                        <td class="col-1" style="text-align: center;"><input class="form-check-input" type="radio" id="cauhoi<?php echo $i->idcauhoi; ?>dapan2" name="cauhoi<?php echo $i->idcauhoi; ?>" value="2" <?php if ($i->dapanthisinh == 2) {echo "Checked";} else {echo "Disabled";} ?>></td> 
                        <td class="col-11"><label for="cauhoi<?php echo $i->idcauhoi; ?>dapan2" <?php if ($i->dapandung == 2) {echo "style='color: green; font-weight: bold'";} ?>>b) <?php echo $i->dapan2; ?></label></td>
                    </tr>   
                    <tr>
                        <td class="col-1" style="text-align: center;"><input class="form-check-input" type="radio" id="cauhoi<?php echo $i->idcauhoi; ?>dapan3" name="cauhoi<?php echo $i->idcauhoi; ?>" value="3" <?php if ($i->dapanthisinh == 3) {echo "Checked";} else {echo "Disabled";} ?>></td> 
                        <td class="col-11"><label for="cauhoi<?php echo $i->idcauhoi; ?>dapan3" <?php if ($i->dapandung == 3) {echo "style='color: green; font-weight: bold'";} ?>>c) <?php echo $i->dapan3; ?></label></td>
                    </tr> 
                    <tr>
                        <td class="col-1" style="text-align: center;"><input class="form-check-input" type="radio" id="cauhoi<?php echo $i->idcauhoi; ?>dapan4" name="cauhoi<?php echo $i->idcauhoi; ?>" value="4" <?php if ($i->dapanthisinh == 4) {echo "Checked";} else {echo "Disabled";} ?>></td> 
                        <td class="col-11"><label for="cauhoi<?php echo $i->idcauhoi; ?>dapan4" <?php if ($i->dapandung == 4) {echo "style='color: green; font-weight: bold'";} ?>>d) <?php echo $i->dapan4; ?></label></td>
                    </tr>
            </table>
            </br>
            <?php } ?>
            <div class="alert alert-warning" role="alert" style="text-align: center; font-weight: bold; font-size: 20px;">PHẦN THI KIẾN THỨC CHUYÊN MÔN</div> 
            <?php foreach ($ketquachuyenmon as $i) { $tt++; ?>
            <table class="table table-bordered table-hover">                                              
                    <tr <?php if ($i->diem == 1) {echo 'class="alert alert-success"';} else {echo 'class="alert alert-danger"';} ?> >                         
                        <td colspan="2"><label for="cauhoi"><b>Câu hỏi <?php echo $tt.": ".$i->cauhoi; ?></b></label></td>
                    </tr>
                    <tr>
                        <td class="col-1" style="text-align: center;"><input class="form-check-input" type="radio" id="cauhoi<?php echo $i->idcauhoi; ?>dapan1" name="cauhoi<?php echo $i->idcauhoi; ?>" value="1" <?php if ($i->dapanthisinh == 1) {echo "Checked";} else {echo "Disabled";} ?>></td> 
                        <td class="col-11"><label for="cauhoi<?php echo $i->idcauhoi; ?>dapan1" <?php if ($i->dapandung == 1) {echo "style='color: green; font-weight: bold'";} ?>>a) <?php echo $i->dapan1; ?></label></td>
                    </tr>    
                    <tr>
                        <td class="col-1" style="text-align: center;"><input class="form-check-input" type="radio" id="cauhoi<?php echo $i->idcauhoi; ?>dapan2" name="cauhoi<?php echo $i->idcauhoi; ?>" value="2" <?php if ($i->dapanthisinh == 2) {echo "Checked";} else {echo "Disabled";} ?>></td> 
                        <td class="col-11"><label for="cauhoi<?php echo $i->idcauhoi; ?>dapan2" <?php if ($i->dapandung == 2) {echo "style='color: green; font-weight: bold'";} ?>>b) <?php echo $i->dapan2; ?></label></td>
                    </tr>   
                    <tr>
                        <td class="col-1" style="text-align: center;"><input class="form-check-input" type="radio" id="cauhoi<?php echo $i->idcauhoi; ?>dapan3" name="cauhoi<?php echo $i->idcauhoi; ?>" value="3" <?php if ($i->dapanthisinh == 3) {echo "Checked";} else {echo "Disabled";} ?>></td> 
                        <td class="col-11"><label for="cauhoi<?php echo $i->idcauhoi; ?>dapan3" <?php if ($i->dapandung == 3) {echo "style='color: green; font-weight: bold'";} ?>>c) <?php echo $i->dapan3; ?></label></td>
                    </tr> 
                    <tr>
                        <td class="col-1" style="text-align: center;"><input class="form-check-input" type="radio" id="cauhoi<?php echo $i->idcauhoi; ?>dapan4" name="cauhoi<?php echo $i->idcauhoi; ?>" value="4" <?php if ($i->dapanthisinh == 4) {echo "Checked";} else {echo "Disabled";} ?>></td> 
                        <td class="col-11"><label for="cauhoi<?php echo $i->idcauhoi; ?>dapan4" <?php if ($i->dapandung == 4) {echo "style='color: green; font-weight: bold'";} ?>>d) <?php echo $i->dapan4; ?></label></td>
                    </tr>
            </table>
            </br>
            <?php } ?>    
      </div>
    </div>
  </div>   
@endsection

<style type="text/css">

    @page {
        size: A4 portrait;        
    }

    @media print {
    table {
        page-break-inside: avoid;
    }

    #thongtin {
        page-break-after: always;
    }

    #printbtn {
        display :  none;
        }

    #navbar {
        display :  none !important;
    }
        

    .container {
        margin-top: auto !important;
    }    

    #tenkythi br {
    content: '';
}    
}
</style>