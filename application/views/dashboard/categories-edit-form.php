<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
            <?php echo validation_errors(); ?>
        </div>
        <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
            <form action="/dashboard/categories/save" method="post">
                <input type="hidden" name="id" value="<?php echo !empty($category) ? $category->id : ''; ?>">
                <div class="form-group clearfix">
                    <label for="title" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input name="title" class="form-control" id="title" type="text" value="<?php echo !empty($category) ? $category->title : set_value('title'); ?>">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="slug" class="col-lg-2 control-label">Slug</label>
                    <div class="col-lg-10">
                        <input name="slug" class="form-control" id="slug" type="text" value="<?php echo !empty($category) ? $category->slug : set_value('slug'); ?>">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="description" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <textarea name="description" class="form-control" rows="3" id="description"><?php echo !empty($category) ? $category->description : set_value('description'); ?></textarea>
                    </div>
                </div>
                <hr/>
                <input type="submit" class="btn btn-primary" value="Save">
                <a href="/dashboard/categories" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
</div>