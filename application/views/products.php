<div class="container">

    <div class="col-lg-3 col-md-3">
        <?php $this->load->view('template/sidebar', $categories); ?>
    </div>

    <div class="col-lg-9 col-md-9">
        <form method="get">
            <div class="form-group clearfix">
                <label for="description" class="col-lg-1 control-label">Sort by</label>
                <div class="col-lg-4">
                    <select name="sort" class="form-control">
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                    </select>
                </div>
                <label for="description" class="col-lg-1 control-label">Order by</label>
                <div class="col-lg-4">
                    <select name="order" class="form-control">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <input class="btn btn-info" type="submit" value="Sort">
                </div>
            </div>
        </form>
        <hr/>
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