@extends('layout')
<head>
  <title>THÍ SINH</title>
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
                <div class="alert alert-primary" role="alert">THÍ SINH</div>                    
                <table class="col-md-8 col-sm-12">  
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="name" class="form-label">Họ và tên:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="text" id="name" name="name" value="{{ $thisinh->name }}" disabled></td>
                    </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="ngaysinh" class="form-label">Ngày sinh:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="date" id="ngaysinh" name="ngaysinh" value="{{ $thisinh->ngaysinh }}" disabled></td>
                    </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="phong" class="form-label">Phòng:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="text" id="phong" name="phong" value="{{ $thisinh->tenphong }}" disabled></td>
                    </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="email" class="form-label">Email:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><input class="form-control" type="email" id="email" name="email" value="{{ $thisinh->email }}" disabled></td>
                    </tr>                        
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="password" class="form-label">Cấp bậc:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px">
                            <select class="form-select" id="capbac" name="capbac" disabled>
                                <option value="<?php echo $thisinh->idcapbac; ?>" selected>{{ $thisinh->tencapbac }}</option>;
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="trangthai" class="form-label">Trạng thái:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px">
                            <select class="form-select" id="trangthai" name="trangthai" disabled>
                                @if ($thisinh->trangthai == 1)
                                    <option value="1" selected>Hoạt động</option>
                                @else
                                    <option value="0" selected>Tạm khóa</option>
                                @endif
                            </select>
                        </td>
                    </tr>         
                    <tr>
                        <td class="col-md-2 col-sm-4"></td>
                        <td>     
                            <div>
                                <div style="display: inline-block;">                               
                                    <form action="/admin/thisinh/{{ $thisinh->id }}/edit" method="get">
                                        <button type="submit" class="btn btn-primary" style="margin: 5px;">SỬA THÍ SINH</button>
                                    </form>
                                </div>
                                @if ($thisinh->trangthai ==1)
                                <div style="display: inline-block;">   
                                    <form action="/admin/thisinh/{{ $thisinh->id }}/delete" method="post">
                                        <input name="_method" type="hidden" value="delete">
                                        <button type="submit" class="btn btn-danger" style="margin: 5px;">XÓA THÍ SINH</button>
                                    </form>                                   
                                </div>
                                @else
                                <div style="display: inline-block;">   
                                    <form action="/admin/thisinh/{{ $thisinh->id }}/restore" method="get">
                                        <button type="submit" class="btn btn-success" style="margin: 5px;">PHỤC HỒI THÍ SINH</button>
                                    </form>                                   
                                </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection