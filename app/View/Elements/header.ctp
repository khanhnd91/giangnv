<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
          <text class="navbar-brand" style="color:#ffffff;font-size: 20px">Quản lí công việc chung của toàn xưởng dịch vụ kỹ thuật</text>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#loginModal">Đăng Nhập</a></li>
            <li><a href="#" data-toggle="modal" data-target="#registerModal">Đăng Ký</a></li>
        </ul>
      </div>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="loginModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Đăng nhập</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
            <form role="form">
                <div class="form-group">
                    <label for="username">Tài khoản</label>
                    <input type="text" class="form-control" id="login-username" required="true" placeholder="nhập tài khoản">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="login-password" required="true" placeholder="Nhập mật khẩu">
                </div>
                <button type="submit" id="login-submit" class="btn btn-success btn-block">Đăng nhập</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
    </div>

  </div>
</div>

<div class="modal fade" id="registerModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Đăng ký</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
            <form role="form" id="register-form">
                <div class="form-group">
                    <label for="username">Tài khoản</label>
                    <input type="text" class="form-control" id="reg-username" required="true" placeholder="nhập tài khoản">
                </div>
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" class="form-control" id="reg-name"  required="true" placeholder="nhập tên">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="reg-password" required="true" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group">
                    <label for="re-password">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="reg-re-password" required="true" placeholder="Nhập mật khẩu">
                </div>
                <button type="submit" id="reg-submit" class="btn btn-success btn-block">Đăng ký</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
    </div>

  </div>
</div>
<script>
$(document).ready(function(){
    $('#register-form').submit(function(e){
        e.preventDefault();
        username = $('#reg-username').val();
        password = $('#reg-password').val();
        re_password = $('#reg-re-password').val();
        name = $('#reg-name').val();
        if(password !== re_password){
            alert('Xác nhận mật khẩu không đúng, vui lòng nhập lại');
            $('#reg-re-password').focus();
        }else{
            $.ajax({
                type: "POST",
                url: '<?php echo Router::url(array('controller'=>'User','action'=>'register'));?>',
                data: {username:username, password:password, name:name}
            }).done(function (data) {
                data = jQuery.parseJSON(data);
                console.log(data);
            }).fail(function (jqXHR, textStatus) {
            });
        }
   }); 
});
</script>
