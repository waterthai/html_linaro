<style>
    .loader {
        font-size: 48px;
        display: inline-block;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        color: #263238;
        box-sizing: border-box;
        text-shadow: 0 0 2px #FFF, 0 0 1px #FFF, 0 0 1px #FFF;
        letter-spacing: 2px;
        position: relative;
    }

    .loader::after {
        content: 'Loading';
        position: absolute;
        left: 0;
        top: 0;
        color: #FFF;
        width: 100%;
        height: 100%;
        overflow: hidden;
        box-sizing: border-box;
        animation: animloader 6s linear infinite;
    }

    @keyframes animloader {
        0% {
            width: 0%;
        }

        100% {
            width: 100%;
        }
    }
</style>
<div class="modal" id="modal_online" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color:black">Online Mode</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="switch-toggle switch-3 switch-candy">
                    <input id="bypass_off" name="bypass" type="radio" <?= ($setting[0]->online_status == 0) ? 'checked' : '' ?> onclick="update_status_online('0')" />
                    <label for="bypass_off" onclick="" style="margin-top: 5px;">Close</label>
                    <input id="bypass_active" name="bypass" type="radio" <?= ($setting[0]->online_status == 1) ? 'checked' : '' ?> onclick="update_status_online('1')" />
                    <label for="bypass_active" style="margin-top: 5px;">Start</label>
                    <a></a>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<div class="modal" id="modal_check_permission" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color:black">Permission</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="path_slug">
                <div class="form-group">
                    <label style="color: black;">Username</label>
                    <input type="text" class="form-control" id="user_permission" onclick="clear_permission_error()">
                </div>
                <div class="form-group">
                    <label style="color: black;">Password</label>
                    <input type="password" class="form-control" id="pwd_permission" onclick="clear_permission_error()">
                </div>
                <p style="color:red; font-size:14px" id="txt_error">The name or password is incorrect.</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="check_permission()">Confirm</button>
            </div>

        </div>
    </div>
</div>



<div class="modal" id="modal_change_username" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color:black">Permission</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="path_slug">
                <div class="form-group">
                    <label style="color: black;">Username</label>
                    <input type="text" class="form-control" id="user_change" onclick="clear_permission_error()">
                </div>
                <div class="form-group">
                    <label style="color: black;">Password</label>
                    <input type="password" class="form-control" id="pwd_change" onclick="clear_permission_error()">
                </div>
                <p style="color:red; font-size:14px" id="txt_error_change">The name or password is incorrect.</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="check_change_username()">Confirm</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal_form_username" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color:black">New User Pasword</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="path_slug">
                <div class="form-group">
                    <label style="color: black;">Username</label>
                    <input type="text" class="form-control" id="c_user_change" onclick="clear_permission_error()">
                </div>
                <div class="form-group">
                    <label style="color: black;">Password</label>
                    <input type="password" class="form-control" id="c_pwd_change" onclick="clear_permission_error()">
                </div>
                <div class="form-group">
                    <label style="color: black;">Confirm Password</label>
                    <input type="password" class="form-control" id="c_pwd_change_confirm" onclick="clear_permission_error()">
                </div>
                <p style="color:red; font-size:14px" id="txt_error_change_new">The name or password is incorrect.</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="confirm_change_user()">Confirm</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal_permission_online" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color:black">Permission</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="path_slug">
                <div class="form-group">
                    <label style="color: black;">Username</label>
                    <input type="text" class="form-control" id="online_user" onclick="clear_permission_error()">
                </div>
                <div class="form-group">
                    <label style="color: black;">Password</label>
                    <input type="password" class="form-control" id="online_password" onclick="clear_permission_error()">
                </div>
                <p style="color:red; font-size:14px" id="txt_error_online">The name or password is incorrect.</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="check_online_permission()">Confirm</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal_update_systems" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color:black">Update Systems</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="background: black;">
                <div class="text-center">
                    <span class="loader">Loading</span>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal_check_updatecode" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color:black">Permission</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="path_slug">
                <div class="form-group">
                    <label style="color: black;">Username</label>
                    <input type="text" class="form-control" id="user_permission_update" onclick="clear_permission_error()">
                </div>
                <div class="form-group">
                    <label style="color: black;">Password</label>
                    <input type="password" class="form-control" id="pwd_permission_update" onclick="clear_permission_error()">
                </div>
                <p style="color:red; font-size:14px" id="txt_error_update">The name or password is incorrect.</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="check_permission_update_code()">Confirm</button>
            </div>

        </div>
    </div>
</div>

<script>
    function clear_permission_error() {
        $('#txt_error').hide();
        $('#txt_error_change').hide();
        $('#txt_error_change_new').hide();
        $('#txt_error_online').hide();
        $('#txt_error_update').hide();
    }
</script>
