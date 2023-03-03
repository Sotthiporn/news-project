<?php require 'portal/header.admin.view.php';  ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 title-text">User</h2>
    
	<a href="<?= $BASE_URL ?>/admin/add-user" class="btn btn-primary text-white">Add New</a><br><br>
    <table class="table">
        <tr>
            <thead>
                <td>Fullname</td>
                <td>Username</td>
                <td>Status</td>
                <td>Action</td>
            </thead>
        </tr> 
		<?php 
			foreach ($user_data as $key => $val) {
		?> 
        <tr>
            <tbody>
                <td><?= $val->fullname ?></td>
                <td><?= $val->username ?></td>
                <td><?= $val->status == 1 ? 'Enabled' : ($val->status == 2 ? 'Disabled' : '') ?></td>
                <td>
                <a href="<?= $BASE_URL ?>/admin/edit-user?id=<?= $val->id ?>" class="btn btn-success text-white">Edit</a>
                <a class="btn btn-danger text-white btn-delete-user" ref="<?= $val->id ?>">Delete</a>
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
    $('.btn-delete-user').click(function(){

        if(confirm('Are you sure?')){
            var delete_item = $(this);
            var id = $(this).attr('ref');

                $.ajax({
                url: "<?= $BASE_URL ?>/admin/delete-user?id=" + id,
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