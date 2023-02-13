<?php 
    require 'portal/header.admin.view.php'; 
?>
    
    <div id="content" class="p-4 p-md-5 pt-5">
        <h1>Edit category</h1>
        <form  method="post">
            <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $cate_data->id ?>" hidden>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="txt-name" id="txt-name" value="<?= $cate_data->name ?>" require>
            </div>
            <div class="form-group">
                <label>Order</label>
                <input type="number" min="0" class="form-control" name="txt-od" id="txt-od" value="<?= $cate_data->od ?>" require>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="txt-status" id="txt-status"  require>
                    <option value="1" <?= $cate_data->status == 1 ? 'selected' : '' ?>>Enable</option>
                    <option value="2" <?= $cate_data->status == 2 ? 'selected' : '' ?>>Disable</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary" id="btn-edit-cate">Update</button>
            <a href="/admin"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>
    </div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
$(document).ready(function(){
    var body = $('body');

    $('#btn-edit-cate').click(function(){
        var id = $('#txt-id').val();
        var name = $('#txt-name').val();
        var od = $('#txt-od').val();
        var status = $('#txt-status').val();
        
        $.ajax({
            url: "/admin/update-cate?id=" + <?php echo $cate_data->id ?>,
            type: "POST",
            data: {name:name,od:od,status:status},
            success:function(result){
                var message = JSON.parse(result);
                if(message.message == "updated_success"){
                    alert("Your data has been updated!");
                    window.location.href = "/admin";
                }else{
                    alert("somthing went wrong please try again later!");
                }
            },
            error: function(){
                alert("somthing went wrong please try again later!");
            }
        });
    });

});
</script>