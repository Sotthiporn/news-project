<?php require 'portal/header.admin.view.php';  ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 title-text">Category</h2>
    
	<a href="admin/add-cate" class="btn btn-primary text-white">Add New</a><br><br>
    <table class="table">
        <tr>
            <thead>
                <td>ID</td>
                <td>Name</td>
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
                <td><?= $val->id ?></td>
                <td><?= $val->name ?></td>
                <td><?= $val->od ?></td>
                <td><?= $val->status ?></td>
                <td>
                <a href="admin/edit-cate?id=<?= $val->id ?>" class="btn btn-success text-white">Edit</a>
                <a class="btn btn-danger text-white btn-delete-cate" ref="<?= $val->id ?>">Delete</a>
                </td>
            </tbody>
        </tr>
			<? } ?>
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
                url: "/admin/delete-cate?id=" + id,
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