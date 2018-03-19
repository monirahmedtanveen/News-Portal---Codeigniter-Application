<h3 class="text-center">Sign Up Form</h3>
<hr/>
<h4 class="text-success text-center">
    <?php
    $message = $this->session->userdata('message');
    if ($message) {
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
</h4>
<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>Welcome/user_sign_up_info_store" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label col-md-2" for="name_two">Your Name</label>
        <div class="col-md-10">
            <input type="text" name="blogger_name" value="" class="form-control" id="name_two" required="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="email_two">Email Address</label>
        <div class="col-md-10">
            <input type="email" name="blogger_email_address" value="" class="form-control" id="email_two" required="">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2" for="pass_two">Password</label>
        <div class="col-md-10">
            <input type="password" required name="blogger_password" value="" class="form-control" id="pass_two"> 
        </div>
    </div>

    <div class="form-group">
        <div class="control-label col-md-2">
            <label for="exampleInputFile">Upload Image</label>
        </div>
        <div class="col-md-10">
            <input type="file" name="blogger_image" class="form-control-static" id="exampleInputFile" style="">

            <?php
            $exception = $this->session->userdata('exception');
            if ($exception) {
                echo $exception;
                $this->session->unset_userdata('exception');
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <input type="submit" name="btn" value="REGISTER ME!" class="btn btn-info" style="background: rgba(57, 56, 56, 1); border: 1px solid rgba(57, 56, 56, 1)">
        </div>
    </div>
</form>