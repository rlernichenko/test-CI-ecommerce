<div class="container">

    <div class="col-lg-3 col-md-3">
        <?php $this->load->view('template/sidebar', $categories); ?>
    </div>

    <div class="col-lg-9 col-md-9">
        <?php if(!empty($product)):?>
            <div class="col-lg-4 col-md-4">
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
            <div class="col-lg-8 col-md-8 product-info">
                <h2><?php echo $product->title;?></h2>
                <h4><?php echo $this->ProductModel->convert_price($product->price);?></h4>
                <p><?php echo $product->description;?></p>

                <?php if(!empty($properties)):?>
                    <hr/>
                    <?php foreach($properties as $property): ?>
                        <p><?php echo $property->title;?>: <?php echo $property->value;?></p>
                    <?php endforeach;?>
                    <hr/>
                <?php endif;?>

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
        <?php endif;?>
    </div>
    <div class="clearfix"></div>
    <?php if(!empty($related_products)):?>
        <h2>Related products</h2><hr/>
        <div class="row">
            <?php
            foreach($related_products as $related_product){
                $this->load->view('template/related-product', ['product' => $related_product]);
            }
            ?>
        </div>
    <?php endif;?>
</div>