<?php foreach ($all_published_blog as $v_blog){ ?>
<div class="row box" style="background-color: white">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>Welcome/blog_details/<?php echo $v_blog->blog_id; ?>"><h3><?php echo $v_blog->blog_title; ?></h3></a>
        <p class="text-danger"><?php echo $v_blog->created_at; ?></p>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url() . $v_blog->blog_image; ?>" alt="Image Not Found" class="img-responsive">
                <h4><a href="blog_details.php">25 comments</a> | </h4>
            </div>
            <div class="col-md-8">
                <p class="text-justify" style="color: #868383">
                    <?php echo $v_blog->blog_short_description; ?>
                </p>
                <a href="<?php echo base_url(); ?>Welcome/blog_details/<?php echo $v_blog->blog_id; ?>" class="btn btn-success anq_box">Keep Reading&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

        </div>
        <br/>
    </div>
</div>

<?php } ?>

<!--<div class="row box" style="background-color: white">
    <div class="col-md-12">
        <a href="#"><h3>Interview with Alan Graham, Author of "Iced Love"</h3></a>
        <p class="text-danger">January 1, 2014</p>
        <div class="row">
            <div class="col-md-4">
                <img src="bootstrap/img/4.jpg" alt="Image Not Found" class="img-responsive">
                <h4><a href="blog_details.php">25 comments</a> | </h4>
            </div>
            <div class="col-md-8">
                <p class="text-justify" style="color: #868383">
                    The early 1970s were a great time to come of
                    age for an Indian cricket fan. After decades
                    of futility, recounted with corrosive clarity
                    by elders, India had suddenly won back-to-back
                    Test series, and on the road at that, against
                    West Indies and England and coming back.
                </p>
                <a href="blog_details.php" class="btn btn-success anq_box">Keep Reading&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

        </div>
        <br/>
    </div>
</div>

<div class="row box" style="background-color: white">
    <div class="col-md-12">
        <a href="#"><h3>Review: "The Traitor’s Daughter," by Angela Griffin</h3></a>
        <p class="text-danger">January 1, 2014</p>
        <div class="row">
            <div class="col-md-4">
                <img src="bootstrap/img/3.jpg" alt="Image Not Found" class="img-responsive">
                <h4><a href="blog_details.php">25 comments</a> | </h4>
            </div>
            <div class="col-md-8">
                <p class="text-justify" style="color: #868383">
                    The early 1970s were a great time to come of
                    age for an Indian cricket fan. After decades
                    of futility, recounted with corrosive clarity
                    by elders, India had suddenly won back-to-back
                    Test series, and on the road at that, against
                    West Indies and England and coming back.
                </p>
                <a href="blog_details.php" class="btn btn-success anq_box">Keep Reading&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

        </div>
        <br/>
    </div>
</div>

<div class="row box" style="background-color: white">
    <div class="col-md-12">
        <a href="#"><h3>Review: "The Devil in Yellow," by James R. Price</h3></a>
        <p class="text-danger">January 1, 2014</p>
        <div class="row">
            <div class="col-md-4">
                <img src="bootstrap/img/5.jpg" alt="Image Not Found" class="img-responsive">
                <h4><a href="blog_details.php">25 comments</a> | </h4>
            </div>
            <div class="col-md-8">
                <p class="text-justify" style="color: #868383">
                    The early 1970s were a great time to come of
                    age for an Indian cricket fan. After decades
                    of futility, recounted with corrosive clarity
                    by elders, India had suddenly won back-to-back
                    Test series, and on the road at that, against
                    West Indies and England and coming back.
                </p>
                <a href="blog_details.php" class="btn btn-success anq_box">Keep Reading&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

        </div>
        <br/>
    </div>
</div>

<div class="row box" style="background-color: white">
    <div class="col-md-12">
        <a href="#"><h3>New ways to find new competitors</h3></a>
        <p class="text-danger">January 1, 2014</p>
        <div class="row">
            <div class="col-md-4">
                <img src="bootstrap/img/6.jpg" alt="Image Not Found" class="img-responsive">
                <h4><a href="blog_details.php">25 comments</a> | </h4>
            </div>
            <div class="col-md-8">
                <p class="text-justify" style="color: #868383">
                    The early 1970s were a great time to come of
                    age for an Indian cricket fan. After decades
                    of futility, recounted with corrosive clarity
                    by elders, India had suddenly won back-to-back
                    Test series, and on the road at that, against
                    West Indies and England and coming back.
                </p>
                <a href="blog_details.php" class="btn btn-success anq_box">Keep Reading&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

        </div>
        <br/>
    </div>
</div>

<div class="row box" style="background-color: white">
    <div class="col-md-12">
        <a href="#"><h3> 5 ways to improve your analytics</h3></a>
        <p class="text-danger">January 1, 2014</p>
        <div class="row">
            <div class="col-md-4">
                <img src="bootstrap/img/7.jpg" alt="Image Not Found" class="img-responsive">
                <h4><a href="blog_details.php">25 comments</a> | </h4>
            </div>
            <div class="col-md-8">
                <p class="text-justify" style="color: #868383">
                    The early 1970s were a great time to come of
                    age for an Indian cricket fan. After decades
                    of futility, recounted with corrosive clarity
                    by elders, India had suddenly won back-to-back
                    Test series, and on the road at that, against
                    West Indies and England and coming back.
                </p>
                <a href="blog_details.php" class="btn btn-success anq_box">Keep Reading&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

        </div>
        <br/>
    </div>
</div>-->