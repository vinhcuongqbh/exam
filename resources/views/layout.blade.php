<!DOCTYPE html>
<html lang="en">
    <head>
      
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <script src="/jquery.min.js"></script>
    
    </head>
    <body>
      <!-- Header -->
      <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%; opacity: 0.9; position: fixed; z-index: 1; top: 0;">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-left: 100px ">
              <li class="nav-item" style="padding-right: 20px">
                <a class="nav-link active" aria-current="page" href="/home">Trang chủ</a>                
              </li>              
                @if (Auth::user()->idcapbac == 1)
                    <li class="nav-item dropdown" style="padding-right: 20px">
                      <a class="nav-link dropdown-toggle" href="/admin" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Quản trị</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/admin"><b>Trang Quản trị</b></a></li>
                        <li><a class="dropdown-item" href="/admin/kythi">- Quản lý Kỳ thi</a></li>
                        <li><a class="dropdown-item" href="/admin/thisinh">- Quản lý Thí sinh</a></li>
                        <li><a class="dropdown-item" href="/admin/cauhoi">- Quản lý Câu hỏi</a></li>
                        <li><a class="dropdown-item" href="/admin/tonghop">- Tổng hợp kết quả</a></li>
                      </ul>
                    </li>
                @endif
              <li class="nav-item dropdown" style="text-align: right;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/logout">Thoát tài khoản</a></li>
                </ul>
              </li>
            </ul>              
          </div>
        </div>
      </nav>
      
      <div class="container" style="margin-top: 30px;">
        @yield("content")
      </div>
      
      <script src="/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      
    </body>
</html>


<!-- CSS -->
<style>
  body {
    background-color: #f3f4f6;
  }

  .container {
    margin: auto;
    padding-top: 20px;
    padding-bottom: 20px;
  }

  #left {  
    padding: 0px 10px;   
  }

  #right {
    background-color: white;
    padding: 10px;
  }
</style>