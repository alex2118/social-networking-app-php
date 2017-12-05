<div id="modal" class="modal fade" role="dialog">

  <ul class="error-message"></ul>

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#login-tab">Login</a></li>
          <li><a data-toggle="tab" href="#register-tab">Register</a></li>
        </ul>
      </div>

      <div class="tab-content">

        <div id="login-tab" class="tab-pane fade in active">
          <div class="modal-body">
            <form class="ajax-form" id="login-form" action="login.php" method="post">
              <div class="form-group">
                <input type="text" name="username" placeholder="Username" class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
              </div>
              <button type="submit" name="login">Login</button>
            </form>
          </div>
        </div>

        <div id="register-tab" class="tab-pane fade">
          <div class="modal-body">
            <form class="ajax-form" id="register-form" action="register.php" method="post">
              <div class="form-group">
                <input type="text" name="username" placeholder="Username" class="form-control">
              </div>
              <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
              </div>
              <button type="submit" name="register">Register</button>
            </form>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>

  </div>

</div>
