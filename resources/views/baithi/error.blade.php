@extends('layout')
<head>
  <title>BÀI THI LỖI</title>
</head>  

@section('content')
    <div class="container">
        <div class="row" >
            <div id="left" class="col-md-4 col-sm-12">
                <!-- Thông tin của thí sinh -->
                <div class="card">
                    <img src="/img/avatar.png" class="card-img-top" alt="avatar">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">{{ Auth::user()->name }}</h5>
                        <p class="card-text">Ban Quản lý dự án đầu tư xây dựng công trình giao thông tỉnh Quảng Bình</p>                  
                    </div>
                </div>       
            </div>
            <div id="right" class="col-md-8 col-sm-12">
                <div class="alert alert-primary" role="alert">
                    <label>KỲ KIỂM TRA SÁT HẠCH CHUYÊN MÔN, NGHIỆP VỤ VÀ NĂNG LỰC CÔNG TÁC ĐỐI VỚI CÁN BỘ KỸ THUẬT, TƯ VẤN GIÁM SÁT NĂM {{ date("Y") }}</label>
                </div>
                <div class="alert alert-danger" role="alert">
                    BẠN ĐÃ LÀM BÀI THI NÀY RỒI.
                </div>                    
            </div>              
        </div>
    </div> 

<script>
    if (typeof(Storage) !== "undefined") {    
        localStorage.clear();
    } else {

        document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
    }   
</script>
@endsection