<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <div class="image">
            <?php if(!empty($product->image)):?>
                <div>
                    <img src="/images/<?php echo $product->image;?>" alt="">
                </div>
            <?php else:?>
                <div>
                    <img src="http://placehold.it/320x150" alt="">
                </div>
            <?php endif;?>
        </div>
        <div class="caption">
            <h4><a href="<?php echo site_url('/product/' . $product->slug);?>"><?php echo $product->title;?></a>
                <h4><?php echo $this->ProductModel->convert_price($product->price);?></h4>
            </h4>
            <p><?php echo $product->description;?></p>
        </div>
        <div class="ratings">
            <p class="pull-right"><?php echo $product->views;?> views</p>
            <p>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
            </p>
        </div>
    </div>
</div>