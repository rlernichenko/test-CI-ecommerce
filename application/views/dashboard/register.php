<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4">
            <?php echo validation_errors(); ?>
        </div>
        <div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4">
            <div class="panel panel-default">
                <form action="/dashboard/users/register" method="post" class="panel-body">
                    <h2 class="text-center">Register</h2>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label" for="login">Login</label>
                            <input name="login" class="form-control" id="login" type="text" placeholder="Enter login" value="<?php echo set_value('login'); ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input name="password" class="form-control" id="password" type="password" placeholder="Enter password" value="<?php echo set_value('password'); ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Confirm password</label>
                            <input name="confirm_password" class="form-control" id="confirm_password" type="password" placeholder="Confirm password" <?php echo set_value('confirm_password'); ?>>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="col-lg-6 col-md-6 text-left">
                            <a class="btn btn-default" href="/dashboard/users/login">Login</a>
                        </div>
                        <div class="col-lg-6 col-md-6 text-right">
                            <button type="submit" class="btn btn-info">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>