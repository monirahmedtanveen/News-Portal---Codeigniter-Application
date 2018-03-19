<div class="row">
    <div class="col-md-offset-4 col-md-4" style="background-color: whitesmoke; margin-top: 150px; border-top: 5px solid #C52457; border-radius: 5px; font-family: monospace">
        <h3 class="text-center">Login</h3>
        <h5 class="text-center text-danger">
            <?php
                $exception = $this->session->userdata('exception');
                if($exception){
                    echo $exception;
                    $this->session->unset_userdata('exception');
                }
            ?>
        </h5>
        <form action="<?php base_url(); ?>user_login_check" method="POST">
            <input type="email" name="blogger_email_address" placeholder="Email Address" class="form-control" id="username" required="">
            <br/>
            <input type="password" name="blogger_password" placeholder="Password" class="form-control" id="password" required="">
            <br/>
            <input type="submit" name="btn" value="SUBMIT" class="btn btn-warning form-control" id="" style="background:#5c8181; border: 1px solid #5c8181">

        </form>
        <h5 class="text-center"><a href="<?php echo base_url(); ?>Welcome/sign_up"  style="color: #5c8181">Have No Account? Click Here to Sign Up!</a></h5>
        <br/>
        <br/>
    </div>
</div>