@extends('layout')
<head>
  <title>TRANG CHỦ</title>
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
                <label for="ngaysinh" class="card-text">Ngày sinh: {{ date('d/m/Y', strtotime($thisinh->ngaysinh)) }}</label>
                <label for="phong" class="card-text">Vị trí việc làm: {{ $thisinh->tenphong }}</label>
              </div>
          </div>       
      </div>
      <div id="right" class="col-md-8 col-sm-12">
          <div class="alert alert-primary" role="alert">
              MỘT SỐ LƯU Ý TRONG QUÁ TRÌNH LÀM BÀI
          </div>
          <ul class="list-group" >
            <li class="list-group-item">- Thí sinh không được sử dụng tài liệu, thiết bị di động để tra cứu thông tin.</li>
            <li class="list-group-item">- Trong quá trình làm bài, thí sinh không được thoát trình duyệt hoặc load lại trang (Bấm F5 hoặc nút tải lại trang)</li>
            <li class="list-group-item">- Trong quá trình làm bài, thí sinh không được phép ra ngoài.</li>
            <li class="list-group-item">- Nếu có thắc mắc, thí sinh liên hệ với giám thị phòng thi.</li>
          </ul>

           <div class="alert alert-primary" role="alert" style="margin-top: 50px;">
             DANH SÁCH KỲ THI
          </div>
          <table class="table-bordered table table-hover align-middle">
          <thead>
            <tr class="table-success">
              <th class="col-1" scope="col" style="text-align: center;">STT</th>
              <th class="col-4" scope="col" style="text-align: center;">Tên kỳ thi</th>
              <th class="col-4" scope="col" style="text-align: center;">Ngày diễn ra</th>
              <th class="col-3" scope="col" style="text-align: center;">Tham gia</th>
            </tr>
          </thead>
          <tbody>             
            @foreach ($kythi as $j =>$i)            
            <tr>
              <td style="text-align: center;">{{ ++$j }}</td>
              <td>{{ $i->tenkythi }}</td>   
              <td style="text-align: center;">{{ date('d/m/Y', strtotime($i->ngaydienra)) }}</td>
              <td style="text-align: center;">
                <form action="baithi/noidungbaithi/{{ $i->idkythi }}" method="get" style="display: inline;">
                  <button type="submit" class="btn btn-primary">LÀM BÀI THI</button>
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



