@extends('layout')
<head>
    <title>BÀI THI</title>
</head>  



@section('content')


    <div class="container">
        <div class="row" >
            <div id="left" class="col-md-2 col-sm-0">
                <!-- Thông tin của thí sinh -->
                <div id="thoigianlambai" class="alert alert-primary" role="alert" style="position: fixed; right: 10; text-align: center; padding: 7px;  opacity: 0.8; z-index: 1;">Thời gian</div> 
                <div class="card">
                    <img src="/img/avatar.png" class="card-img-top" alt="avatar">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">{{ Auth::user()->name }}</h5>
                    </div>
                </div>                      
            </div>   
            <div id="right" class="col-md-10 col-sm-12">
                <div class="alert alert-primary" role="alert">
                    <label>KỲ KIỂM TRA SÁT HẠCH CHUYÊN MÔN, NGHIỆP VỤ VÀ NĂNG LỰC CÔNG TÁC ĐỐI VỚI CÁN BỘ KỸ THUẬT, TƯ VẤN GIÁM SÁT NĂM {{ date("Y") }}</label>
                </div>
                <form action="/baithi/noidungbaithi" method="post">                    
                    <input type="hidden" id="idbaithi" name="idbaithi" value="{{ $idbaithi }}">
                    <input type="hidden" id="thoigianbatdau" name="thoigianbatdau" value="{{ $thoigianbatdau }}">
                    <input type="hidden" id="phamquy" name="phamquy" value="0">
                    <?php $ch = 0; ?>
                    <div class="alert alert-warning" role="alert" style="text-align: center; font-weight: bold; font-size: 20px;">PHẦN THI KIẾN THỨC PHÁP LUẬT VỀ XÂY DỰNG</div>
                    @foreach ($cauhoiphapluat as $i) <?php $ch++; ?>
                    <table class="table table-bordered table-hover">                        
                        <tr class="alert alert-success">                        
                            <td colspan="2"><label for="cauhoi"><b>Câu hỏi {{ $ch.": ".$i->cauhoi }}</b></label></td>
                        </tr>
                        @for ($da = 1; $da <= 4; $da++)   
                        <tr>
                            <td class="col-1" style="text-align: center;"><input type="radio" class="form-check-input" id="cauhoi{{ $ch }}dapan{{ $da }}" name="cauhoi{{ $i->idcauhoi }}" value="{{ $da }}"></td> 
                            <td class="col-11"><label for="cauhoi{{ $ch }}dapan{{ $da }}"><?php $tmp = "dapan".$da ?> {{ $i->$tmp }}</label></td>
                        </tr>
                        @endfor                           
                    </table>
                    </br>
                    @endforeach

                    <div class="alert alert-warning" role="alert" style="text-align: center; font-weight: bold; font-size: 20px;">PHẦN THI KIẾN THỨC CHUYÊN MÔN</div>
                    @foreach ($cauhoichuyenmon as $i) <?php $ch++; ?>
                    <table class="table table-bordered table-hover">                        
                        <tr class="alert alert-success">                        
                            <td colspan="2"><label for="cauhoi"><b>Câu hỏi {{ $ch.": ".$i->cauhoi }}</b></label></td>
                        </tr>
                        @for ($da = 1; $da <= 4; $da++)   
                        <tr>
                            <td class="col-1" style="text-align: center;"><input type="radio" class="form-check-input" id="cauhoi{{ $ch }}dapan{{ $da }}" name="cauhoi{{ $i->idcauhoi }}" value="{{ $da }}"></td> 
                            <td class="col-11"><label for="cauhoi{{ $ch }}dapan{{ $da }}"><?php $tmp = "dapan".$da ?> {{ $i->$tmp }}</label></td>
                        </tr>
                        @endfor                           
                    </table>
                    </br>
                    @endforeach
                                     
                    <button type="submit" id="nopbai" class="btn btn-primary">NỘP BÀI</button>
                </form>
            </div>
        </div>
    </div>

<!-- Phục hồi câu trả lời của thí sinh tại máy -->
<script>
    if (typeof(Storage) !== "undefined") {    
        for (var i=1; i<=60; i++) {
            document.getElementById("cauhoi"+i+"dapan"+localStorage.getItem(document.getElementById("idbaithi").value+i)).checked = true; 
        }
    } else {

        document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
    }   
</script>

<!-- Lưu kết quả làm bài của thí sinh tại máy -->
<script>
    var y = setInterval(function() {
        localStorage.setItem("idbaithi", document.getElementById("idbaithi").value);
        if (typeof(Storage) !== "undefined") {               
            for (var i=1; i<=60; i++) {
                for (var j=1; j<=4; j++) {
                    if (document.getElementById("cauhoi"+i+"dapan"+j).checked == true) {
                        localStorage.setItem(document.getElementById("idbaithi").value+i, document.getElementById("cauhoi"+i+"dapan"+j).value);    
                    }
                }
            }   
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
        }    
    }, 1000);
</script>


<!-- Đồng hồ đếm ngược thời gian làm bài của thí sinh -->
<script>    
    var thoigianlambai = 40; //Tính bằng phút
    var thoigianbatdau = new Date(Date.parse(document.getElementById("thoigianbatdau").value)).getTime();
    var thoigianketthuc = thoigianbatdau + thoigianlambai*60*1000 + 2000;
    var sophutconlai;
    var sogiayconlai;

    var x = setInterval(function() {
    var thoigianhientai = new Date().getTime();
    var thoigianconlai = Math.ceil((thoigianketthuc - thoigianhientai)/1000);
    sophutconlai = Math.floor(thoigianconlai/60);
    sogiayconlai = Math.floor(thoigianconlai - sophutconlai*60);        
    document.getElementById("thoigianlambai").innerHTML = "Thời gian <br />" + sophutconlai + " : " + sogiayconlai;

    // Nếu thời gian làm bài đã hết
    if (thoigianconlai < 0) {
        clearInterval(x);
        document.getElementById("thoigianlambai").innerHTML = "ĐÃ HẾT GIỜ LÀM BÀI";
        document.getElementById("nopbai").click();
        }
    }, 1000); 
</script>

<!-- Kiểm tra thí sinh có rời khỏi trang làm bài không -->
<script>
    var phamquy = localStorage.getItem("phamquy");
    $(window).on("blur focus", function (e) {
    if (phamquy >= 3) {
        alert("Chương trình sẽ tự động nộp bài làm tính đến thời điểm hiện tại");
        document.getElementById("nopbai").click();        
    }
    var prevType = $(this).data("prevType");
    if (prevType != e.type) { 
    switch (e.type) {
        case "blur":
        localStorage.setItem("phamquy", ++phamquy);
        document.getElementById("phamquy").value = phamquy;
        alert("Bạn đã vi phạm quy định của cuộc thi " + phamquy + " lần!");      
        break;
    }

    }
    $(this).data("prevType", e.type);
});
</script>
@endsection          


<style type="text/css">
    #navbar {
        position: static !important;
    }

    .container {
        margin-top: 0px !important;
    }
</style>