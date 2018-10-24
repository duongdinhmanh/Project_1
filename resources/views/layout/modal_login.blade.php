<div class="modal fade" id="modal-login" style="z-index: 9999999999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
        <h4 class="modal-title" style="text-align: center">Đăng nhập hệ thống</h4>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
              <div class="login-header clearfix" style="text-align: center">
                  <img  src="assets/upload/logos/logo.png" alt="logo">
              </div>
              <p>Please enter your user name and password to login</p>
              <form action="{{ route('dang-nhap') }}" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <div class="form-check checkbox-theme">
                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                      Keep Me Signed In
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-color btn-md pull-right">Đăng Nhập</button>
               <small> <a href="{{ route('dang-ky') }}">Đăng Ký</a></small>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
