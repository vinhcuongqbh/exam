@extends('layout')
<head>
  <title>CẬP NHẬT THÍ SINH</title>
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
                <div class="alert alert-primary" role="alert">CẬP NHẬT THÍ SINH</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/admin/thisinh/{{ $thisinh->id }}/update" method="post">                
                    <table class="col-md-8 col-sm-12">  
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="name" class="form-label">Họ và tên:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="text" id="name" name="name" value="{{ old('name', $thisinh->name) }}"></td>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="ngaysinh" class="form-label">Ngày sinh:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="date" id="ngaysinh" name="ngaysinh" value="{{ old('ngaysinh', $thisinh->ngaysinh) }}"></td>
                        </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="phong" class="form-label">Phòng:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px">
                            <select class="form-select" id="phong" name="phong">
                                @foreach ($phong as $i) 
                                    @if ($i->idphong == $thisinh->idphong) 
                                        <option value="{{ $i->idphong }}" selected>{{ $i->tenphong }}</option>
                                    @else 
                                        <option value="{{ $i->idphong }}">{{ $i->tenphong }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="email" class="form-label">Email:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="email" id="email" name="email" value="{{ old('email', $thisinh->email) }}" disabled></td>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="password" class="form-label">Mật mã:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="password" id="password" name="password" value="{{ old('password2', $thisinh->password2) }}"></td>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="capbac" class="form-label">Cấp bậc:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px">
                                <select class="form-select" id="capbac" name="capbac">
                                    @foreach ($capbac as $i)
                                        @if ($i->idcapbac == $thisinh->idcapbac) 
                                            <option value="{{ $i->idcapbac }}" selected>{{ $i->tencapbac }}</option>
                                        @else
                                            <option value="{{ $i->idcapbac }}">{{ $i->tencapbac }}</option>
                                        @endif                                        
                                    @endforeach
                                </select>
                            </td>
                        </tr>      
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="trangthai" class="form-label">Trạng thái:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px">
                                <select class="form-select" id="trangthai" name="trangthai">
                                    @if ($thisinh->trangthai == 0)
                                        <option value="0" selected>Tạm khóa</option>
                                        <option value="1">Hoạt động</option>
                                    @else
                                        <option value="0">Tạm khóa</option>
                                        <option value="1" selected>Hoạt động</option>
                                    @endif
                                </select>
                            </td>
                        </tr>         
                        <tr>
                            <td class="col-md-2 col-sm-4"></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><button type="submit" class="btn btn-primary">CẬP NHẬT</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection