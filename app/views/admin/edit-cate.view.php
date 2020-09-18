<?php 
    require 'portal/header.admin.view.php';  
        foreach ($cate_data as $key => $val) {
        }
    ?>
    
    <div id="content" class="p-4 p-md-5 pt-5">
        <h1>Edit category</h1>
        <form  method="post">
            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $val->id ?>" readonly>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="txt-name" id="txt-name" value="<?= $val->name ?>" require>
            </div>
            <div class="form-group">
                <label>Order</label>
                <input type="text" class="form-control" name="txt-od" id="txt-od" value="<?= $val->od ?>" require>
            </div>
            <div class="form-group">
                <label>Status(1=Enable,2=Disable)</label>
                <select class="form-control" name="txt-status" id="txt-status"  require>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <input type="hidden" name="txt-status-val" id="txt-status-val" value="<?= $val->status ?>">
            </div>
            <button type="button" class="btn btn-primary" id="btn-edit-cate">Update</button>
            <a href="/admin"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>
    </div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
$(document).ready(function(){
    var body = $('body');
    var status_val = $('#txt-status-val').val();

    $('#btn-edit-cate').click(function(){
        var id = $('#txt-id').val();
        var name = $('#txt-name').val();
        var od = $('#txt-od').val();
        var status = $('#txt-status').val();
        
        $.ajax({
            url: "/admin/update-cate?id=" + <?php echo $val->id ?>,
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

    $('#txt-status').val(status_val);
});
</script>