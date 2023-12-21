<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
            <?php echo validation_errors(); ?>
        </div>
        <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
            <form action="/dashboard/products/save" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo !empty($product) ? $product->id : ''; ?>">
                <div class="form-group clearfix">
                    <label for="title" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input name="title" class="form-control" id="title" type="text" value="<?php echo !empty($product) ? $product->title : set_value('title'); ?>">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="slug" class="col-lg-2 control-label">Slug</label>
                    <div class="col-lg-10">
                        <input name="slug" class="form-control" id="slug" type="text" value="<?php echo !empty($product) ? $product->slug : set_value('slug'); ?>">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="description" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <textarea name="description" class="form-control" rows="3" id="description"><?php echo !empty($product) ? $product->description : set_value('description'); ?></textarea>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="description" class="col-lg-2 control-label">Category</label>
                    <div class="col-lg-10">
                        <select name="category" class="form-control" id="select">
                            <?php if(!empty($categories)):?>
                                <?php foreach($categories as $category):?>
                                    <option <?php echo !empty($product) && $product->category == $category->id ? 'selected="selected"' : ''; ?> value="<?php echo $category->id;?>"><?php echo $category->title;?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="price" class="col-lg-2 control-label">Price</label>
                    <div class="col-lg-10">
                        <input name="price" class="form-control" id="price" type="text" value="<?php echo !empty($product) ? $product->price : set_value('price'); ?>">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label for="image" class="col-lg-2 control-label">Image</label>
                    <div class="col-lg-10">
                        <input name="image" class="form-control" id="image" type="file">
                    </div>
                </div>
                <hr/>
                <h4>Properties</h4>
                <hr/>
                <?php if(!empty($properties)):?>
                    <?php foreach($properties as $property):?>
                        <?php
                        if(!empty($product)) {
                            $value = $this->PropertiesModel->get_value($product->id, $property->id);
                        }
                        ?>
                        <div class="form-group clearfix">
                            <label for="property<?php echo $property->id;?>" class="col-lg-2 control-label"><?php echo $property->title;?></label>
                            <div class="col-lg-10">
                                <input name="properties[<?php echo $property->id;?>]" class="form-control" id="property<?php echo $property->id;?>" type="text" value="<?php echo !empty($value->value) ? $value->value : set_value('property'.$property->id); ?>">
                            </div>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
                <hr/>
                <input type="submit" class="btn btn-primary" value="Save">
                <a href="/dashboard/products" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
</div>