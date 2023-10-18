@extends('layout')
<head>
  <title>THÊM KỲ THI</title>
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
                <div class="alert alert-primary" role="alert">THÊM KỲ THI</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/admin/kythi/store" method="post">
                    <table>
                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="tenkythi">Tên Kỳ thi:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><input type="text" id="tenkythi" name="tenkythi" rows="2" class="form-control" value="{{ old('cauhoi') }}"></td>
                        </tr>

                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="ngaydienra">Ngày diễn ra:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><input type="date" id="ngaydienra" name="ngaydienra" rows="2" class="form-control" value="{{ old('ngaydienra') }}"></td>
                        </tr>

                        <tr>
                           <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="mota">Nội dung:</label></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><textarea id="mota" name="mota" class="form-control" rows="5">{{ old('mota') }}</textarea></td>
                        </tr>

                        <tr>
                            <td class="col-md-2 col-sm-4" style="padding: 5px"></td>
                            <td class="col-md-10 col-sm-8" style="padding: 5px"><button type="submit" class="btn btn-primary">TẠO KỲ THI</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>        
@endsection