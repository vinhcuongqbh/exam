@extends('layout')
<head>
  <title>TỔNG HỢP</title>
</head> 

@section('content')
  <div class="container">
    <div class="row" >
        <div id="left" class="col-12 col-md-4">
        <!-- Thông tin của thí sinh -->
        <div class="card">
            <img src="/img/avatar.png" class="card-img-top" alt="avatar">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center;">{{ Auth::user()->name }}</h5>
                <p class="card-text">Ban Quản lý dự án đầu tư xây dựng công trình giao thông tỉnh Quảng Bình</p>                  
            </div>
        </div>       
    </div>
      <div id="right" class="col-12 col-md-8">
        <div class="alert alert-primary" role="alert">TỔNG HỢP KẾT QUẢ THI</div>
        <div class="row">
          <form class="row" action="/admin/tonghop/tonghopketqua" method="post">
            <div class="col-auto">
              <label class="col-form-label">Tên Kỳ thi:</label>
            </div>
            <div class="col-auto">
              <select class="form-select" id="kythi" name="kythi">
                @foreach ($kythi as $i) 
                  @if ($kythidachon == $i->idkythi)
                    <option value="{{ $i->idkythi }}" selected>{{ $i->tenkythi }}</option>
                  @else             
                    <option value="{{ $i->idkythi }}">{{ $i->tenkythi }}</option>
                  @endif
                @endforeach
              </select>   
            </div>  
            <div class="col-auto">     
              <button type="submit" class="btn btn-primary">TỔNG HỢP</button>
            </div> 
          </form>  
        </div>
        <table class="table-bordered table table-hover align-middle" style="margin: auto;">
          <thead>
            <tr class="table-success">
              <th scope="col" style="text-align: center;">STT</th>
              <th class="col-4" scope="col" style="text-align: center;">Thí sinh</th>
              <th class="col-1" scope="col" style="text-align: center;">Ngày sinh</th>
              <th class="col-4" scope="col" style="text-align: center;">Vị trí việc làm</th>
              <th class="col-1 "scope="col" style="text-align: center;">Điểm</th>
              <th class="col-2" scope="col" style="text-align: center;">Xem Bài thi</th>
            </tr>
          </thead>
          <tbody>             
            @foreach ($baithi as $j =>$i)            
            <tr>
              <td style="text-align: center;">{{ ++$j }}</td>
              <td>{{ $i->name }}</td>
              <td style="text-align: center;">{{ date('d/m/Y', strtotime($i->ngaysinh)) }}</td>
              <td style="text-align: center;">{{ $i->tenphong }}</td>
              <td style="text-align: center;">{{ $i->diemtonghop }}</td>
              <td style="text-align: center;">
                <form action="/admin/tonghop/ketquabaithi/{{ $i->idbaithi }}" method="get" style="margin: 0px;">
                  <button type="submit" class="btn btn-outline-primary">BÀI THI</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection