<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <a href="/dashboard/products/create" class="btn btn-primary">Add new</a>
            <hr/>

            <table class="table table-striped table-hover" id="products_list">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Creating date</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($products)):?>
                    <?php foreach($products as $product):?>
                        <tr class="product_item">
                            <td><?php echo $product->id;?></td>
                            <td><img src="/images/<?php echo $product->image;?>"></td>
                            <td><?php echo $product->title;?></td>
                            <td><?php echo $product->slug;?></td>
                            <td width="25%;"><?php echo $product->description;?></td>
                            <td><?php echo $product->category;?></td>
                            <td><?php echo $product->price;?></td>
                            <td><?php echo $product->creating_date;?></td>
                            <td><a href="/dashboard/products/edit/<?php echo $product->id;?>" class="btn btn-info">Edit</a></td>
                            <td><a product_id="<?php echo $product->id;?>" class="del_btn btn btn-danger">Delete</a></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>

                </tbody>
            </table>

            <hr/>
            <?php echo $links;?>
            <hr/>
            <a href="/dashboard/products/create" class="btn btn-primary">Add new</a>
        </div>
    </div>
</div>