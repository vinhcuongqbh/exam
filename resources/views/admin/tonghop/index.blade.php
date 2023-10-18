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
        <form class="row" action="/admin/tonghop/tonghopketqua" method="post">
          <div class="col-auto">
            <label class="col-form-label">Tên Kỳ thi:</label>
          </div>
          <div class="col-auto">
            <select class="form-select" id="kythi" name="kythi">
              @foreach ($kythi as $i) 
                <option value="{{ $i->idkythi }}">{{ $i->tenkythi }}</option>             
              @endforeach
            </select>   
          </div>  
          <div class="col-auto">     
            <button type="submit" class="btn btn-primary">TỔNG HỢP</button>
          </div> 
        </form>  
        </div>        
      </div>
    </div>
  </div>
@endsection