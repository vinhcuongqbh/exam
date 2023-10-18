@extends('layout')
<head>
  <title>THÊM THÍ SINH</title>
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
                <div class="alert alert-primary" role="alert">THÊM THÍ SINH</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="store" method="post">
                    <table> 
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="name" class="form-label">Họ và tên:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}"></td>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="ngaysinh" class="form-label">Ngày sinh:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="date" id="ngaysinh" name="ngaysinh" value="{{ old('ngaysinh') }}"></td>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="phong" class="form-label">Phòng:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px">
                                <select class="form-select" id="phong" name="phong">
                                    @foreach ($phong as $i) 
                                        <option value="{{ $i->idphong }}">{{ $i->tenphong }}</option>
                                    @endforeach
                                </select>
                            </td>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="email" class="form-label">Email:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}"></td>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="password" class="form-label">Mật mã:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="text" id="password" name="password" value="{{ old('dapan1', $password) }}"></td>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="capbac" class="form-label">Cấp bậc:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px">
                                <select class="form-select" id="capbac" name="capbac">
                                    @foreach ($capbac as $i) 
                                            @if ($i->idcapbac == 2) 
                                                <option value="{{ $i->idcapbac }}" selected>{{ $i->tencapbac }}</option>
                                            @else 
                                                <option value="{{ $i->idcapbac }}">{{ $i->tencapbac }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr>         
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><button type="submit" class="btn btn-primary">TẠO THÍ SINH</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>        
@endsection