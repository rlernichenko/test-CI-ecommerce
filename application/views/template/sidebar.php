<h2>Categories</h2>
<?php if(!empty($categories)):?>
    <ul class="list-group">
        <?php foreach($categories as $category):?>
            <li class="list-group-item">
                <?php $count = $this->ProductModel->record_count_by_category($category->id);?>
                <?php if(!empty($count)):?>
                    <span class="badge"><?php echo $count;?></span>
                <?php endif;?>
                <a href="<?php echo site_url('/category/' . $category->slug);?>"><?php echo $category->title;?></a>
            </li>
        <?php endforeach;?>
    </ul>
<?php endif;?>