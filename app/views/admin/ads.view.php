<?php require 'portal/header.admin.view.php';  ?>

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4 title-text">Advertise</h2>

    <a href="/admin/add-ads" class="btn btn-primary text-white">Add New</a><br><br>
    <table class="table table-responsive">
        <tr>
            <thead>
                <td>URL</td>
                <td>Photo</td>
                <td>Location</td>
                <td>Type</td>
                <td>Status</td>
                <td>Action</td>
            </thead>
        </tr>
        <?php
        foreach ($ads_data as $key => $val) {
        ?>
            <tr>
                <tbody>
                    <td><?= $val->url ?></td>
                    <td>
                        <img src="/public/img/upload/ads/<?= $val->img ?>" alt="<?= $val->img ?>" onerror="this.src='/public/img/default/bg_gallery.png'" width="60" height="60" style="margin-top: -12px;">
                    </td>
                    <td><?= $val->location ?></td>
                    <td><?= $val->type ?></td>
                    <td><?= $val->status == 1 ? 'Enabled' : ($val->status == 2 ? 'Disabled' : '') ?></td>
                    <td>
                        <a href="/admin/edit-ads?id=<?= $val->id ?>" class="btn btn-success text-white">Edit</a>
                        <a class="btn btn-danger text-white btn-delete-ads" ref="<?= $val->id ?>" style="margin-top:2px;">Delete</a>
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
        $('.btn-delete-ads').click(function() {

            if (confirm('Are you sure?')) {
                var delete_item = $(this);
                var id = $(this).attr('ref');

                $.ajax({
                    url: "/admin/delete-ads?id=" + id,
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