<?php require 'portal/header.admin.view.php';  ?>

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 title-text">News</h2>

    <a href="/admin/add-news" class="btn btn-primary text-white">Add New</a><br><br>
    <table class="table table-responsive">
        <tr>
            <thead>
                <td>Category</td>
                <td>Post Date</td>
                <td>Title</td>
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
                    <td><?= $val->category_name ?></td>
                    <td><?= $val->date_post ?></td>
                    <td><?= $val->title ?></td>
                    <td><?= $val->location ?></td>
                    <td><?= $val->od ?></td>
                    <td><?= $val->status == 1 ? 'Enabled' : ($val->status == 2 ? 'Disabled' : '') ?></td>
                    <td>
                        <img src="/public/img/upload/news/<?= $val->photo ?>" alt="<?= $val->photo ?>" onerror="this.src='/public/img/icon/bg_gallery.png'" width="60" height="60" style="margin-top: -12px;">
                    </td>
                    <td>
                        <a href="/admin/edit-news?id=<?= $val->id ?>" class="btn btn-success text-white">Edit</a>
                        <a class="btn btn-danger text-white btn-delete-news" ref="<?= $val->id ?>" style="margin-top:2px;">Delete</a>
                    </td>
                </tbody>
            </tr>
        <?php } ?>
    </table>
</div>
</div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
    $(document).ready(function() {
        $('.btn-delete-news').click(function() {

            if (confirm('Are you sure?')) {
                var delete_item = $(this);
                var id = $(this).attr('ref');

                $.ajax({
                    url: "/admin/delete-news?id=" + id,
                    type: "GET",
                    success: function(result) {
                        var message = JSON.parse(result);
                        if (message.message == "success") {
                            delete_item.parent('td').parent('tr').remove();

                        } else {
                            alert("somthing went wrong please try again later!");
                        }
                    },
                    error: function() {
                        alert("somthing went wrong please try again later!");
                    }
                });
            }
        });
    });
</script>