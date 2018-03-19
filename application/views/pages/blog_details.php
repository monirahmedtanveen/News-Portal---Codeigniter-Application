<div class="row" style="background-color: white">
    <div class="col-md-12">
        <a href="#"><h3><?php echo $blog_info->blog_title; ?></h3></a>
        <p class="text-danger"><?php echo $blog_info->created_at; ?></p>
        <div class="row">
            <div class="col-md-12">
                <img src="<?php echo base_url() . $blog_info->blog_image; ?>" alt="Image Not Found" class="img-responsive">
            </div>
            <div class="col-md-12">
                <br/>
                <p class="text-justify" style="color: #868383">
                    <?php echo $blog_info->blog_long_description; ?> 
                </p>

                <a href="#expan1" data-toggle="collapse" class="btn btn-success anq_box">Comments&nbsp;<i class="fa fa-comment-o"></i></a>
                <a href="#" data-toggle="collapse" class="btn btn-success anq_box">Like&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span></a>
                <br/><br/>
                <div id="expan1" class="collapse in">
                    <?php
                    $blogger_name = $this->session->userdata('blogger_name');
                    if ($blogger_name != null) { ?>
                        <h3>Leave a Comment</h3>
                        <hr/>
                        <form action = "" method = "POST">
                        <div class = "form-group">
                        <label for = "comment">Your Comment</label>
                        <textarea rows = "10" name = "comment" id = "comment" class = "form-control" value = "" placeholder = "Write Something" style = "color: #868383;"></textarea>
                        </div>

                        <div class = "form-group">
                        <input type = "submit" name = "btn_comment" class = "btn btn-info" value = "Submit" style = "background: rgba(57, 56, 56, 1);margin-top: 3px;border-radius: 0px; border: 1px solid rgba(57, 56, 56, 1)">
                        </div>

                        </form>
                    <?php }else{ ?>
                        <h4><a href="<?php echo base_url(); ?>Welcome/login" style="color: #330033; font-family: Timesnewroman">Please Login For Comments</a></h4>
                    <?php } ?>
                </div>
            </div>

        </div>
        <br/>
    </div>
</div>