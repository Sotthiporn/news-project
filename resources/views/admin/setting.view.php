<?php
require 'portal/header.admin.view.php';
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h1>Edit setting</h1>
    <form method="post" class="upl">
        <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $setting_data[0]->id ?>" hidden>
        <div class="form-group">
            <label>Website Name *</label>
            <input type="text" class="form-control" name="txt-website-name" id="txt-website-name" value="<?= $setting_data[0]->website_name ?>" required>
        </div>
        <div class="form-group">
            <label>Website Description *</label>
            <textarea class="form-control" name="txt-website-description" id="txt-website-description" required><?= $setting_data[0]->website_description ?></textarea>
        </div>
        <div><label>Website Logo *</label></div>
        <div class="form-group img-box" style="background-image: url(<?= $BASE_URL ?>/public/img/upload/setting/<?= $setting_data[0]->website_logo ?>);">
            <input type="file" name="txt-file" id="txt-file">
            <input type="hidden" name="txt-website-logo" id="txt-website-logo" value="<?= $setting_data[0]->website_logo ?>" required>
        </div>
        <div style="float: right;">
            <button type="button" class="btn btn-primary" id="btn-edit-setting">Update</button>
            <a href="<?= $BASE_URL ?>/admin/setting"><button type="button" class="btn btn-danger">Cancel</button></a>
        </div>
    </form>
</div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
    $(document).ready(function() {

        $('#btn-edit-setting').click(function() {
            var id = $('#txt-id').val();
            var title = $('#txt-title').val();
            var des = $('#txt-des').val();
            var od = $('#txt-od').val();
            var location = $('#txt-location').val();
            var cate = $('#txt-cate').val();
            var status = $('#txt-status').val();
            var photo = $('#txt-photo').val();

            $.ajax({
                url: "<?= $BASE_URL ?>/admin/update-setting?id=" + <?= $setting_data[0]->id ?>,
                type: "POST",
                data: {
                    id: id,
                    title: title,
                    des: des,
                    od: od,
                    location: location,
                    cate: cate,
                    status: status,
                    photo: photo
                },
                success: function(result) {
                    var message = JSON.parse(result);
                    if (message.message == "updated_success") {
                        alert("Your data has been updated!");
                        window.location.href = "<?= $BASE_URL ?>/admin/setting";
                    } else {
                        alert("somthing went wrong please try again later!");
                    }
                },
                error: function() {
                    alert("somthing went wrong please try again later!");
                }
            });
        });

    });
</script>