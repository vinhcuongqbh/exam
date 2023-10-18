@extends('layout')
<head>
  <title>KỲ THI</title>
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
                <div class="alert alert-primary" role="alert">KỲ THI</div>     
                <table>                      
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="tenkythi">Tên Kỳ thi:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><input type="text" id="tenkythi" name="tenkythi" rows="2" class="form-control" value="{{ $kythi->tenkythi }}" disabled></td>
                    </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="ngaydienra">Ngày diễn ra:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><input type="date" id="ngaydienra" name="ngaydienra" rows="2" class="form-control" value="{{ $kythi->ngaydienra }}" disabled></td>
                    </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="mote">Nội dung:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><textarea id="mota" name="mota" class="form-control" rows="5" disabled>{{ old('mota', $kythi->mota) }}</textarea></td></td>
                    </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="password" class="form-label">Trạng thái:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px">
                            <select class="form-select" id="trangthai" name="trangthai" disabled>
                                @if ($kythi->trangthai == 1)
                                    <option value="1" selected>Hoạt động</option>
                                @else
                                    <option value="0" selected>Tạm khóa</option>
                                @endif
                            </select>
                        </td>
                    </tr>         
                    <tr>
                        <td class="col-md-2 col-sm-4col-sm-4" style="padding: 5px"></td>
                        <td>
                            <div>
                                <div style="display: inline-block;">
                                    <form action="/admin/kythi/{{ $kythi->idkythi }}/edit" method="get" style="display: inline;">
                                        <button type="submit" class="btn btn-primary" style="margin: 5px;">SỬA KỲ THI</button>
                                    </form>
                                </div>
                                @if ($kythi->trangthai == 1)
                                <div style="display: inline-block;">
                                    <form action="/admin/kythi/{{ $kythi->idkythi }}/delete" method="post" style="display: inline;">
                                        <input name="_method" type="hidden" value="delete">
                                        <button type="submit" class="btn btn-danger" style="margin: 5px;">XÓA KỲ THI</button>
                                    </form>                         
                                </div>
                                @else
                                <div style="display: inline-block;">
                                    <form action="/admin/kythi/{{ $kythi->idkythi }}/restore" method="get" style="display: inline;">
                                        <button type="submit" class="btn btn-success" style="margin: 5px;">PHỤC HỒI KỲ THI</button>
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