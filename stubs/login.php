<div class="modal text-black fade" id="login">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body clearfix">
                <div id="error" class="hide text-center" style="color:red;">
                    *Incorrect username or password.
                </div>
                <br>
                <form id="loginForm" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">Username</label>
                        <div class="col-xs-9">
                            <input id="username" type="text" name="username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3">Password</label>
                        <div class="col-xs-9">
                            <input id="password" type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="col-xs-6 btn btn-primary" id="login">Login</button>
                    <a href="#" id="cancel" class="btn btn-default col-xs-6">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
