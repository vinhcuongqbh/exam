@extends('layout')
<head>
  <title>CÂU HỎI</title>
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
                <div class="alert alert-primary" role="alert">CÂU HỎI</div>     
                <table>  
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="linhvuc">Lĩnh vực:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px">
                            <input type="radio" id="phapluat" name="linhvuc" value="1" @if ($cauhoi->linhvuc == 1) {{ "checked" }} @else {{ "disabled" }} @endif>
                            <label for="phapluat">Pháp luật</label><br>
                            <input type="radio" id="chuyenmon" name="linhvuc" value="2" @if ($cauhoi->linhvuc == 2) {{ "checked" }} @else {{ "disabled" }} @endif> 
                            <label for="chuyenmon">Chuyên môn</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="cauhoi">Nội dung câu hỏi:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><textarea id="cauhoi" name="cauhoi" rows="4" class="form-control" disabled>{{ $cauhoi->cauhoi }}</textarea></td>
                    </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px">
                            <input type="radio" id="dapan1checkbox" name="dapandung" value="1" @if ($cauhoi->dapandung == 1) {{ "checked" }} @else {{ "disabled" }} @endif>  
                            <label for="dapan1checkbox" class="form-check-label">Đáp án A:</label>                                          
                        </td> 
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><textarea id="dapan1" name="dapan1" class="form-control" disabled>{{ $cauhoi->dapan1 }}</textarea></td>
                    </tr>
                    <tr>    
                        <td class="col-md-2 col-sm-4" style="padding: 5px">
                            <input type="radio" id="dapan2checkbox" name="dapandung" value="2" @if ($cauhoi->dapandung == 2) {{ "checked" }} @else {{ "disabled" }} @endif> 
                            <label for="dapan2checkbox" class="form-check-label">Đáp án B:</label>
                        </td>    
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><textarea id="dapan2" name="dapan2"  class="form-control" disabled>{{ $cauhoi->dapan2 }}</textarea></td>
                    </tr>                
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px">
                            <input type="radio" id="dapan3checkbox" name="dapandung" value="3" @if ($cauhoi->dapandung == 3) {{ "checked" }} @else {{ "disabled" }} @endif> 
                            <label for="dapan3checkbox" class="form-check-label">Đáp án C:</label>                        
                        </td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><textarea id="dapan3" name="dapan3" class="form-control" disabled>{{ $cauhoi->dapan3 }}</textarea></td>
                    </tr>
                    <tr>                        
                        <td class="col-md-2 col-sm-4" style="padding: 5px">
                            <input type="radio" id="dapan4checkbox" name="dapandung" value="4" @if ($cauhoi->dapandung == 4) {{ "checked" }} @else {{ "disabled" }} @endif>
                            <label for="dapan4checkbox" class="form-check-label">Đáp án D:</label>
                        </td>                    
                        <td class="col-md-10 col-sm-8" style="padding: 5px"><textarea id="dapan4" name="dapan4" class="form-control" disabled>{{ $cauhoi->dapan4 }}</textarea></td>
                    </tr>
                    <tr>
                        <td class="col-md-2 col-sm-4" style="padding: 5px"><label for="trangthai" class="form-label">Trạng thái:</label></td>
                        <td class="col-md-10 col-sm-8" style="padding: 5px">
                            <select class="form-select" id="trangthai" name="trangthai" disabled>
                                @if ($cauhoi->trangthai == 1)
                                    <option value="1" selected>Sử dụng</option>
                                @else
                                    <option value="0" selected>Không sử dụng</option>
                                @endif
                            </select>
                        </td>
                    </tr>     
                    <tr>
                        <td class="col-md-2 col-sm-4col-sm-4" style="padding: 5px"></td>
                        <td>
                            <div>
                                <div style="display: inline-block;">                                     
                                    <form action="/admin/cauhoi/{{ $cauhoi->idcauhoi }}/edit" method="get" style="display: inline;">
                                        <button type="submit" class="btn btn-primary" style="margin: 5px;">SỬA CÂU HỎI</button>
                                    </form>
                                </div>
                                @if ($cauhoi->trangthai ==1)
                                <div style="display: inline-block;">
                                    <form action="/admin/cauhoi/{{ $cauhoi->idcauhoi }}/delete" method="post" style="display: inline;">
                                        <input name="_method" type="hidden" value="delete">
                                        <button type="submit" class="btn btn-danger" style="margin: 5px;">XÓA CÂU HỎI</button>
                                    </form>                         
                                </div>
                                @else
                                <div style="display: inline-block;">
                                    <form action="/admin/cauhoi/{{ $cauhoi->idcauhoi }}/restore" method="get" style="display: inline;">
                                        <button type="submit" class="btn btn-success" style="margin: 5px;">PHỤC HỒI CÂU HỎI</button>
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