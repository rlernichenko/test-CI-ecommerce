<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <a href="/dashboard/categories/create" class="btn btn-primary">Add new</a>
            <hr/>

            <table class="table table-striped table-hover" id="categories_list">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Products</th>
                    <th>Creating date</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($categories)):?>
                    <?php foreach($categories as $category):?>
                        <tr class="category_item">
                            <td><?php echo $category->id;?></td>
                            <td><?php echo $category->title;?></td>
                            <td><?php echo $category->slug;?></td>
                            <td width="50%;"><?php echo $category->description;?></td>
                            <td><?php echo $this->ProductModel->record_count_by_category($category->id);?></td>
                            <td><?php echo $category->creating_date;?></td>
                            <td><a href="/dashboard/categories/edit/<?php echo $category->id;?>" class="btn btn-info">Edit</a></td>
                            <td><a cat_id="<?php echo $category->id;?>" class="del_btn btn btn-danger">Delete</a></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>

                </tbody>
            </table>

            <hr/>
            <a href="/dashboard/categories/create" class="btn btn-primary">Add new</a>
        </div>
    </div>
</div>