@extends('layout')
<head>
  <title>NGÂN HÀNG CÂU HỎI</title>
</head> 

@section('content')
  <div class="container">
    <div class="row" >
      <!--
      <div id="left" class="col-4">
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
        <div class="alert alert-primary" role="alert">NGÂN HÀNG CÂU HỎI</div>
        <div class="row">
          <div class="col-md-8">
            <div class="col-auto" style="display: inline-block;">
              <form action="/admin/cauhoi/create" method="get">
                <button type="submit" class="btn btn-primary">THÊM CÂU HỎI</button> 
              </form>
            </div>
            <div class="col-auto" style="display: inline-block;">
              <form action="/admin/cauhoi" method="get">
                <button type="submit" class="btn btn-outline-primary">ĐANG SỬ DỤNG</button>
              </form>
            </div>
            <div class="col-auto" style="display: inline-block;">
              <form action="/admin/cauhoi/daxoa" method="get">
                <button type="submit" class="btn btn-outline-danger">ĐÃ XÓA</button>
              </form>
            </div>  
          </div>
          <div class="col-md-4" style="text-align: right;">
          <form action="/admin/cauhoi/timkiem" method="get">     
            <div class="col-auto" style="display: inline-block;">    
              <input type="text" class="form-control" name="timkiem" id="timkiem" placeholder="Nhập nội dung câu hỏi">   
            </div>
            <div class="col-auto" style="display: inline-block;">              
              <button type="submit" class="btn btn-primary" style="margin-top: -5px; ">TÌM KIẾM</button>
            </div>  
          </form>
          </div>
        </div>
        <table class="col-md-12 col-sm-12 table-bordered table table-hover" style="margin: auto;">
          <thead>
            <tr class="table-success align-middle">
              <th scope="col" style="text-align: center;">STT</th>
              <th scope="col-1" style="text-align: center;">Lĩnh vực</th>
              <th class="col-2" scope="col" style="text-align: center;">Nội dung câu hỏi</th>
              <th class="col-2" scope="col" style="text-align: center;">Đáp án A</th>
              <th class="col-2" scope="col" style="text-align: center;">Đáp án B</th>
              <th class="col-2" scope="col" style="text-align: center;">Đáp án C</th>
              <th class="col-2" scope="col" style="text-align: center;">Đáp án D</th>
              <th class="col-1" scope="col" style="text-align: center;">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cauhoi as $j => $i)
            <tr>
              <td style="text-align: center;">{{ $cauhoi->firstItem()+$j }}</td>
              <td style="text-align: center;">@if ($i->linhvuc == 1) {{ "Pháp luật" }} @else {{ "Chuyên môn" }} @endif</td>
              <td style="text-align: justify;">{{ $i->cauhoi }}</td>                          
              <td style="text-align: justify; @if ($i->dapandung == 1) {{ 'color:green; font-weight: bold;' }} @endif">{{ $i->dapan1 }}</td>
              <td style="text-align: justify; @if ($i->dapandung == 2) {{ 'color:green; font-weight: bold;' }} @endif">{{ $i->dapan2 }}</td>
              <td style="text-align: justify; @if ($i->dapandung == 3) {{ 'color:green; font-weight: bold;' }} @endif">{{ $i->dapan3 }}</td>
              <td style="text-align: justify; @if ($i->dapandung == 4) {{ 'color:green; font-weight: bold;' }} @endif">{{ $i->dapan4 }}</td>                          
              <td style="text-align: center;">
                <form action="/admin/cauhoi/{{ $i->idcauhoi }}/show" method="get" style="margin: 5px;">
                  <button type="submit" class="btn btn-outline-secondary">XEM</button>
                </form>
                <form action="/admin/cauhoi/{{ $i->idcauhoi }}/edit" method="get" style="margin: 5px;">
                  <button type="submit" class="btn btn-outline-primary">SỬA</button>
                </form>
                @if ($i->trangthai == 1)
                <form action="/admin/cauhoi/{{ $i->idcauhoi }}/delete" method="post" style="margin: 5px;">
                  <input name="_method" type="hidden" value="delete">
                  <button type="submit" class="btn btn-outline-danger">XÓA</button>
                </form>
                @else
                <form action="/admin/cauhoi/{{ $i->idcauhoi }}/restore" method="get" style="margin: 5px;">
                  <button type="submit" class="btn btn-outline-success" style="padding: 7px;">P.HỒI</button>
                </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pagination justify-content-center" style="margin-top: 20px;">
            {{ $cauhoi->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection