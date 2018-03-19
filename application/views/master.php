<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
        <script src="<?php echo base_url(); ?>bootstrap/js/ajax_jquery.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <style>
            section{
                margin-top: 5px;
            }

            .anq_box{
                margin-top: 20px;
            }


            .btn.btn-success{
                background: rgba(57, 56, 56, 1);
                border-radius: 0px;
            }

            .box{
                margin-top: 2px;
            }

            .bot{
                border-bottom: 2px solid #003333;
            }

            .list-cat{
                margin: 20px 0px;
                list-style-type: none;
                padding: 0px;
                margin-left: 20px;
                font-weight: bolder;
            }
        </style>
    </head>
    <body style="background-color: white;">

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#asdfg">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div id="asdfg" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active bot"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="<?php echo base_url(); ?>Welcome/about_us">About</a></li>
                                <li><a href="<?php echo base_url(); ?>Welcome/contact_us">Contact Us</a></li>

                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <?php
                                $blogger_name = $this->session->userdata('blogger_name');
                                $blogger_image = $this->session->userdata('blogger_image');
                                if ($blogger_name) {
                                    ?>
                                    <li class="dropdown">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                            <span class="glyphicon glyphicon-user"></span>
                                            <?php
                                            $blogger_name = $this->session->userdata('blogger_name');
                                            echo $blogger_name;
                                            ?>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url(); ?>Welcome"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                                            <li><a href="<?php echo base_url(); ?>Welcome/logout"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                                        </ul>
                                    </li>
                                    
                                <?php } else { ?>
                                    <li><a href="<?php echo base_url(); ?>Welcome/login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Log In</a></li>
                                    <li><a href="<?php echo base_url(); ?>Welcome/sign_up">Sign Up&nbsp;<span class="glyphicon glyphicon-user"></span></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <section style="margin-top: 55px">
            <?php if (isset($slider)) { ?>
                <div class="container">
                    <div class="row">
                        <img src="<?php echo base_url(); ?>bootstrap/img/1.PNG" alt="Image Not Found" class="img-responsive">
                    </div>
                </div>
            <?php } ?>
        </section>

        <section>
            <div class="container">

                <div class="row" style="background-color: white">
                    <div class="col-md-8">
                        <?php echo $main_content; ?>
                    </div>

                    <div class="col-md-4">

                        <h3 class="text-center">Category</h3>
                        <hr/>

                        <div>
                            <ul class="list-cat">
                                <?php foreach ($all_published_category as $v_category) { ?>
                                    <li class="list-cat"><a href="<?php echo base_url(); ?>Welcome/category_product/<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <hr/>

                        <?php if (isset($tab_content)) { ?>

                            <ul class="nav nav-pills nav-pills-justified">
                                <li class="active"><a href="#populer_blog" data-toggle="tab">Popular Blog</a></li>
                                <li><a href="#recent_blog" data-toggle="tab">Recent Blog</a></li>
                            </ul>


                            <div class="tab-content">

                                <div class="tab-pane fade in active" id="populer_blog">
                                    <br/>
                                    <?php foreach ($populer_blog as $v_blog) { ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="<?php echo base_url(); ?>Welcome/blog_details/<?php echo $v_blog->blog_id; ?>"><img src="<?php echo base_url() . $v_blog->blog_image; ?>" alt="Image" class="img-responsive" style="margin-top: 15px"></a>
                                            </div>
                                            <div class="col-md-9">
                                                <h4><a href="<?php echo base_url(); ?>Welcome/blog_details/<?php echo $v_blog->blog_id; ?>"><?php echo $v_blog->blog_title; ?></a></h4>
                                                <h6>(<?php echo $v_blog->hit_count; ?>)</h6>
        <!--                                        <p>Imperdiet mauris viverra maecenas, tortor enim aliquam at nec. Pellentesque penatibus...</p>-->
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="tab-pane fade in" id="recent_blog">
                                    <br/>
                                    <?php foreach ($recent_blog as $v_blog) { ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="<?php echo base_url(); ?>Welcome/blog_details/<?php echo $v_blog->blog_id; ?>"><img src="<?php echo base_url() . $v_blog->blog_image; ?>" alt="Image" class="img-responsive" style="margin-top: 15px"></a>
                                            </div>
                                            <div class="col-md-9">
                                                <h4><a href="<?php echo base_url(); ?>Welcome/blog_details/<?php echo $v_blog->blog_id; ?>"><?php echo $v_blog->blog_title; ?></a></h4>
        <!--                                        <p>Imperdiet mauris viverra maecenas, tortor enim aliquam at nec. Pellentesque penatibus...</p>-->
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        <?php } ?>

                    </div>

                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <p class="text-center">© 2023 by The Book Lover. Proudly created</p>
                </div>
            </div>
        </section>

        <?php
        // put your code here
        ?>
    </body>
</html>
