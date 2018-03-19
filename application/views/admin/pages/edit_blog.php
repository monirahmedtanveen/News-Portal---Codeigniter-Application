<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Blog</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>

        <h3 style="color: yellowgreen; margin-left: 40px">
            <?php
            $message = $this->session->userdata('message');
            if ($message) {
                echo $message;
                $this->session->unset_userdata('message');
            }
            ?>
        </h3>


        <div class="box-content">
            <form name="edit_blog" class="form-horizontal" action="<?php echo base_url(); ?>super_admin/update_blog" method="POST">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Blog Title </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $blog_info->blog_title; ?>" name="blog_title" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >
                            <input type="hidden" value="<?php echo $blog_info->blog_id; ?>" name="blog_id" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >
                            <p class="help-block">Start typing to activate auto complete!</p>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name </label>
                        <div class="controls">
                            <select name="category_id">
                                <option>Select category name</option>
                                <?php 
                                foreach ($all_published_category as $v_category){
                                ?>
                                <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Blog Short Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="blog_short_description" id="textarea2" rows="3"><?php echo $blog_info->blog_short_description; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Blog Long Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="blog_long_description" id="textarea2" rows="3"><?php echo $blog_info->blog_long_description; ?></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Publication Status </label>
                        <div class="controls">
                            <select name="publication_status">
                                <option>Select Publication Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Blog</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

<script type="text/javascript">
    document.forms['edit_blog'].elements['category_id'].value = '<?php echo $blog_info->category_id; ?>';
    document.forms['edit_blog'].elements['publication_status'].value = '<?php echo $blog_info->publication_status; ?>';
</script>