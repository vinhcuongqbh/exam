@extends('layout')
<head>
  <title>DANH SÁCH KỲ THI</title>
</head> 

@section('content')
  <div class="container">
    <div class="row" >
      <div id="left" class="col-md-4 col-sm-12">
        <div class="card">
          <img src="/img/avatar.png" class="card-img-top" alt="avatar">
          <div class="card-body">
            <h5 class="card-title" style="text-align: center;">{{ Auth::user()->name }}</h5>
            <p class="card-text">Ban Quản lý dự án đầu tư xây dựng công trình giao thông tỉnh Quảng Bình</p>                  
          </div>
        </div>       
      </div>
      <div id="right" class="col-md-8 col-sm-12">
        <div class="alert alert-primary" role="alert">DANH SÁCH KỲ THI</div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-auto" style="display: inline-block;">
              <form action="/admin/kythi/create" method="get">
                <button type="submit" class="btn btn-primary">THÊM  KỲ THI</button> 
              </form>
            </div>
            <div class="col-auto" style="display: inline-block;">
              <form action="/admin/kythi" method="get">
                <button type="submit" class="btn btn-outline-primary">ĐANG SỬ DỤNG</button>
              </form>
            </div>
            <div class="col-auto" style="display: inline-block;">
              <form action="/admin/kythi/daxoa" method="get">
                <button type="submit" class="btn btn-outline-danger">ĐÃ XÓA</button>
              </form>
            </div>  
          </div>
          <div class="col-md-6" style="text-align: right;">
          <form action="/admin/kythi/timkiem" method="get">     
            <div class="col-auto" style="display: inline-block;">    
              <input type="text" class="form-control" name="timkiem" id="timkiem" placeholder="Nhập tên Kỳ thi">   
            </div>
            <div class="col-auto" style="display: inline-block;">              
              <button type="submit" class="btn btn-primary" style="margin-top: -5px; ">TÌM KIẾM</button>
            </div>  
          </form>
          </div>
        </div>
        <table class="col-md-12 col-sm-12 table-bordered table table-hover align-middle" style="margin: auto;">
          <thead>
            <tr class="table-success align-middle">
              <th scope="col" style="text-align: center;">STT</th>
              <th class="col-5" scope="col" style="text-align: center;">Tên kỳ thi</th>
              <th class="col-2" scope="col" style="text-align: center;">Ngày diễn ra</th>
              <th class="col-2" scope="col" style="text-align: center;">Trạng thái</th>
              <th class="col-3" scope="col" style="text-align: center;">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kythi as $j => $i)
            <tr>
              <td style="text-align: center;">{{ ++$j }}</td>
              <td style="text-align: left;">{{ $i->tenkythi }}</td>   
              <td style="text-align: center;">{{ date('d/m/Y', strtotime($i->ngaydienra)) }}</td>        
              <td style="text-align: center;">@if ($i->trangthai==1) {{ "Hoạt động" }} @else {{ "Tạm khóa" }} @endif</td>                   
              
              <td style="text-align: center;">
                <form action="/admin/kythi/<?php echo $i->idkythi; ?>/show" method="get" style="display: inline;">
                  <button type="submit" class="btn btn-outline-secondary">XEM</button>
                </form>
                <form action="/admin/kythi/<?php echo $i->idkythi; ?>/edit" method="get" style="display: inline;">
                  <button type="submit" class="btn btn-outline-primary" style="margin-top:2px; margin-bottom: 3px">SỬA</button>
                </form>
                @if ($i->trangthai == 1)
                <form action="/admin/kythi/<?php echo $i->idkythi; ?>/delete" method="post" style="display: inline;">
                  <input name="_method" type="hidden" value="delete">
                  <button type="submit" class="btn btn-outline-danger" style="margin-top:2px; margin-bottom: 3px">XÓA</button>
                </form>
                @else
                <form action="/admin/kythi/<?php echo $i->idkythi; ?>/restore" method="get" style="display: inline;">
                  <button type="submit" class="btn btn-outline-success" style="margin-top:2px; margin-bottom: 3px">P.HỒI</button>
                </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pagination justify-content-center" style="margin-top: 20px;">
          {{ $kythi->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection