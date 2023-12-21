<div class="container">

    <div class="col-lg-3 col-md-3">
        <?php $this->load->view('template/sidebar', $categories); ?>
    </div>

    <div class="col-lg-9 col-md-9">
        <h2>Popular products</h2><hr/>
        <?php if(!empty($products)):?>
            <div class="row">
                <?php
                foreach($products as $product){
                    $this->load->view('template/product', array('product' => $product));
                }
                ?>
            </div>
        <?php else:?>
            <p>Category is empty</p>
        <?php endif;?>

        <?php
        if(!empty($links)) {
            echo '<hr/>';
            echo $links;
            echo '<hr/>';
        }
        ?>
    </div>
</div>