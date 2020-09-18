<?php require 'portal/header.admin.view.php';  ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 title-text">Slide</h2>
    
	<!-- <a href="/admin/add-slide" class="btn btn-primary text-white">Add New</a><br><br> -->
    <table class="table">
        <tr>
            <thead>
                <td>ID</td>
                <td>Category</td>
                <td>Title</td>
                <td>Order</td>
                <td>Status</td>
                <td>Photo</td>
                <td>Action</td>
            </thead>
        </tr> 
        <?php 
			foreach ($slide_data as $key => $val) {
		?> 
        <tr>
            <tbody>
                <td><?= $val[0] ?></td>
                <td><?= $val[8] ?></td>
                <td><?= $val[1] ?></td>
                <td><?= $val[3] ?></td>
                <td><?= $val[6] ?></td>
                <td><img src="/public/img/news/<?= $val[2] ?>" alt="/public/img/slide/<?= $val[2] ?>" width="60" height="60"></td>
                <td>
                <a href="/admin/edit-slide?id=<?= $val[0] ?>" class="btn btn-success text-white">Edit</a>
                <a class="btn btn-danger text-white btn-delete-slide" ref="<?= $val[0] ?>">Delete</a>
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
    $('.btn-delete-slide').click(function(){

        if(confirm('Are you sure?')){
            var delete_item = $(this);
            var id = $(this).attr('ref');

                $.ajax({
                url: "/admin/delete-slide?id=" + id,
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