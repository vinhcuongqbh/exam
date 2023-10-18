@extends('layout')
<head>
  <title>QUẢN LÝ THÍ SINH</title>
</head> 

@section('content')
  <div class="container">
    <div class="row">
      <!--     
      <div id="left" class="col-2">
        <div class="card">
          <img src="/img/avatar.png" class="card-img-top" alt="avatar">
          <div class="card-body">
            <h5 class="card-title" style="text-align: center;">{{ Auth::user()->name }}</h5>
            <p class="card-text">Ban Quản lý dự án đầu tư xây dựng công trình giao thông tỉnh Quảng Bình</p>                  
          </div>
        </div>       
      </div>
    -->
      <div id="right" class="col-md-12 col-sm-12">
        <div class="alert alert-primary" role="alert">DANH SÁCH THÍ SINH</div>
        <div class="row">
          <div class="col-md-8">
            <div class="col-auto" style="display: inline-block;">
              <form action="/admin/thisinh/create" method="get">
                <button type="submit" class="btn btn-primary">THÊM THÍ SINH</button>
              </form> 
            </div>
            <div class="col-auto" style="display: inline-block;">
              <form action="/admin/thisinh" method="get">
                <button type="submit" class="btn btn-outline-primary">TÀI KHOẢN HOẠT ĐỘNG</button>
              </form>
            </div>
            <div class="col-auto" style="display: inline-block;">
              <form action="/admin/thisinh/daxoa" method="get">
                <button type="submit" class="btn btn-outline-danger">TÀI KHOẢN ĐÃ XÓA</button>
              </form>
            </div>
            <div class="col-auto" style="display: inline-block;">
              <form action="/admin/thisinh/quantri" method="get">
                <button type="submit" class="btn btn-outline-success">TÀI KHOẢN QUẢN TRỊ</button>
              </form>
            </div>  
          </div>
          <div class="col-md-4" style="text-align: right;">
          <form action="/admin/thisinh/timkiem" method="get">     
            <div class="col-auto" style="display: inline-block;">    
              <input type="text" class="form-control" name="timkiem" id="timkiem" placeholder="Nhập Tên hoặc email">   
            </div>
            <div class="col-auto" style="display: inline-block;"> 
              <button type="submit" class="btn btn-primary" style="margin-top: -5px; ">TÌM KIẾM</button>
            </div>  
          </form>
          </div>
        </div>
        <table class="table table-bordered table-hover align-middle">
          <thead>
            <tr class="table-success" style="text-align: center;">
              <th scope="col">STT</th>
              <th class="col-2" scope="col">Tên thí sinh</th>
              <th class="col-1" scope="col">Ngày sinh</th>
              <th class="col-3" scope="col">Phòng</th>
              <th class="col-2" scope="col">Email</th>
              <th class="col-1" scope="col">Cấp bậc</th>
              <th class="col-3" scope="col">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($thisinh as $j =>$i) 
            <tr>
              <td>{{ $thisinh->firstItem()+$j }}</td>
              <td style="text-align: left;">{{ $i->name }}</td>
              <td>{{ date('d/m/Y', strtotime($i->ngaysinh)) }}</td>
              <td>{{ $i->tenphong }}</td>
              <td style="text-align: left;">{{ $i->email }}</td>
              <td>{{ $i->tencapbac }}</td>
              <td style="text-align: center;">
                <form action="/admin/thisinh/{{ $i->id }}/show" method="get" style="display: inline;">
                  <button type="submit" class="btn btn-outline-secondary">XEM</button>
                </form>
                <form action="/admin/thisinh/{{ $i->id }}/edit" method="get" style="display: inline;">
                  <button type="submit" class="btn btn-outline-primary">SỬA</button>
                </form>
                @if ($i->trangthai == 1)
                <form action="/admin/thisinh/{{ $i->id }}/delete" method="post" style="display: inline;">
                  <input name="_method" type="hidden" value="delete">
                  <button type="submit" class="btn btn-outline-danger">XÓA</button>
                </form>
                @else
                <form action="/admin/thisinh/{{ $i->id }}/restore" method="get" style="display: inline;">
                  <button type="submit" class="btn btn-outline-success">P.HỒI</button>
                </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="pagination justify-content-center" style="margin-top: 20px;">
      {{ $thisinh->links() }}
      </div>
    </div>
  </div>
@endsection

<style type="text/css">
  th, td {
    text-align: center;
  }
</style>