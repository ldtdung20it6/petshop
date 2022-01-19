<header>

@php $menusHtml = \App\Helpers\Helper::menus($menus);

@endphp
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white z-index-99 position-fixed top-0 start-0 end-0 nav-height-60px">
            <div class="container-fluid bg-fff">
              <a class="navbar-brand text-black" href="/">DPSHOP</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active text-black hover-text-red" aria-current="page" href="/">TRANG CHỦ</a>
                  </li>

                  {!! $menusHtml !!}


                  <li class="nav-item">
                    <a class="nav-link active text-black hover-text-red" aria-current="page" href="/lien-he">LIÊN HỆ</a>
                  </li>

                </ul>
                <form class="d-flex">
                    <form action="search" role="search" method="get" id="searchform">
                  <input class="form-control me-2" type="text" value="" name="key" id="" placeholder="Tìm Kiếm" aria-label="Search">
                  <button class="btn btn-outline-success" formaction="/search" type="submit" id="searchsubmit">Search</button>

                  </form>
                  @if(!Auth::user())
                  <div class="dropdown">
                    <button class="btn btn-outline-danger ms-3 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Tài Khoản
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="/users/login">Đăng Nhập</a></li>
                      <li><a class="dropdown-item" href="/users/singup">Đăng ký</a></li>
                      <li><a class="dropdown-item" href="/carts">Giỏ Hàng</a></li>
                    </ul>
                  </div>
                  @else
                  <div class="dropdown">
                    <button class="btn btn-outline-danger ms-3 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      {{Auth::user()->fullname}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="/profile">Thông Tin</a></li>
                      <li><a class="dropdown-item" href="/carts">Giỏ Hàng</a></li>
                      <li><a class="dropdown-item" href="/logout">Đăng Xuất</a></li>

                    </ul>
                  </div>
                  @endif

                </form>
              </div>
            </div>
          </nav>
</header>

