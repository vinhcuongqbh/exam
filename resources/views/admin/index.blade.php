@extends('layout')
<head>
  <title>TRANG QUẢN LÝ</title>
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
          <div class="alert alert-primary" role="alert">CÁC CHỨC NĂNG CHÍNH</div>
          <ul class="list-group">
            <li class="list-group-item"><a href="admin/kythi" style="text-decoration: none">1. QUẢN LÝ KỲ THI</a></br></li>
            <li class="list-group-item"><a href="admin/thisinh" style="text-decoration: none">2. QUẢN LÝ THÍ SINH</a></br></li>
            <li class="list-group-item"><a href="admin/cauhoi" style="text-decoration: none">3. QUẢN LÝ CÂU HỎI</a></br></li>
            <li class="list-group-item"><a href="admin/tonghop" style="text-decoration: none">4. TỔNG HỢP KẾT QUẢ THI</a></br></li>
          </ul>
      </div>
    </div>
  </div>  
@endsection        