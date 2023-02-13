<?php require 'portal/header.admin.view.php';  ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 title-text">News</h2>
    
	<a href="/admin/add-news" class="btn btn-primary text-white">Add New</a><br><br>
    <table class="table table-responsive">
        <tr>
            <thead>
                <td>ID</td>
                <td>Category</td>
                <td>Post Date</td>
                <td>Title</td>
                <td>Description</td>
                <td>Location</td>
                <td>Order</td>
                <td>Status</td>
                <td>Photo</td>
                <td>Action</td>
            </thead>
        </tr> 
        <?php 
			foreach ($news_data as $key => $val) {
		?> 
        <tr>
            <tbody>
                <td><?= $val[0] ?></td>
                <td><?= $val[11] ?></td>
                <td><?= $val[1] ?></td>
                <td><?= $val[2] ?></td>
                <td>................</td>
                <td><?= $val[7] ?></td>
                <td><?= $val[6] ?></td>
                <td><?= $val[9] ?></td>
                <td><img src="/public/img/upload/news/<?= $val[5] ?>" alt="/public/img/upload/news/<?= $val[5] ?>" width="60" height="60"></td>
                <td>
                <a href="/admin/edit-news?id=<?= $val[0] ?>" class="btn btn-success text-white">Edit</a>
                <a class="btn btn-danger text-white btn-delete-news" ref="<?= $val[0] ?>" style="margin-top:2px;">Delete</a>
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
    $('.btn-delete-news').click(function(){

        if(confirm('Are you sure?')){
            var delete_item = $(this);
            var id = $(this).attr('ref');

                $.ajax({
                url: "/admin/delete-news?id=" + id,
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