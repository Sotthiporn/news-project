<?php require 'portal/header.admin.view.php';  ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 title-text">Category</h2>
    
	<a href="<?= $BASE_URL ?>/admin/add-cate" class="btn btn-primary text-white">Add New</a><br><br>
    <table class="table">
        <tr>
            <thead>
                <td>Name</td>
                <td>Color</td>
                <td>Order</td>
                <td>Status</td>
                <td>Action</td>
            </thead>
        </tr> 
		<?php 
			foreach ($cate_data as $key => $val) {
		?> 
        <tr>
            <tbody>
                <td><?= $val->name ?></td>
                <td>
                    <div style="width: 40px; height: 40px;background-color: <?= $val->color ?>;"></div>
                </td>
                <td><?= $val->od ?></td>
                <td><?= $val->status == 1 ? 'Enabled' : ($val->status == 2 ? 'Disabled' : '') ?></td>
                <td>
                <a href="<?= $BASE_URL ?>/admin/edit-cate?id=<?= $val->id ?>" class="btn btn-success text-white">Edit</a>
                <a class="btn btn-danger text-white btn-delete-cate" ref="<?= $val->id ?>">Delete</a>
                </td>
            </tbody>
        </tr>
			<?php } ?>
    </table>
		 </div>
		</div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
$(document).ready(function(){
    $('.btn-delete-cate').click(function(){

        if(confirm('Are you sure?')){
            var delete_item = $(this);
            var id = $(this).attr('ref');

                $.ajax({
                url: "<?= $BASE_URL ?>/admin/delete-cate?id=" + id,
                type: "GET",
                success: function(result){
                    var message = JSON.parse(result);
                    if(message.message == "success"){
                        delete_item.parent('td').parent('tr').remove();
                        
                    }else{
                        alert("somthing went wrong please try again later!");
                    }
                },
                error: function(){
                    alert("somthing went wrong please try again later!");
                }
            });
        }
    });
});
</script>