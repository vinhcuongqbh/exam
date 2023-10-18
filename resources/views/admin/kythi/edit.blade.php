@extends('layout')
<head>
  <title>CẬP NHẬT KỲ THI</title>
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
                <div class="alert alert-primary" role="alert">CẬP NHẬT KỲ THI</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/admin/kythi/{{ $kythi->idkythi }}/update" method="post">
                    <table>                          
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px">
                                <label for="tenkythi">Tên Kỳ thi:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px">
                                <input type="text" id="tenkythi" name="tenkythi" rows="2" class="form-control" value="{{ old('tenkythi', $kythi->tenkythi) }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px">
                                <label for="ngaydienra">Ngày diễn ra:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px">
                                <input type="date" id="ngaydienra" name="ngaydienra" rows="2" class="form-control" value="{{ old('ngaydienra', $kythi->ngaydienra) }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px">
                                <label for="mota">Nội dung:</label>
                            </td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px">
                                <textarea id="mota" name="mota" class="form-control" rows="5">{{ old('mota', $kythi->mota) }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px">
                                <label for="trangthai" class="form-label">Trạng thái:</label>
                            </td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px">
                                <select class="form-select" id="trangthai" name="trangthai">
                                    @if ($kythi->trangthai == 0)
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
                            <td class="col-md-10 col-sm-8" style="padding: 5px">
                                <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection