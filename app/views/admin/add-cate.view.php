<?php 
    require 'portal/header.admin.view.php';
?>  
    <div id="content" class="p-4 p-md-5 pt-5">
        <h1>Add new category</h1>
        <form action="/admin/add-cate-data" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="txt-name" id="txt-name" require>
            </div>
            <div class="form-group">
                <label>Order</label>
                <input type="number" min="0" class="form-control" name="txt-od" id="txt-od" value="<?= isset($cate_data[0]->od) ? $cate_data[0]->od+1 : 0 ?>" require>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="txt-status" id="txt-status" require>
                    <option value="1">Enable</option>
                    <option value="2">Disable</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/admin"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>
    </div>
<?php require 'portal/footer.admin.view.php';  ?>