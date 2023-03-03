<?php
require 'portal/header.admin.view.php';
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h1>Setting</h1>
    <form method="post" class="upl">
        <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $setting_data[0]->id ?? null ?>" hidden>
        <div class="form-group">
            <label>Website Name *</label>
            <input type="text" class="form-control" name="txt-website-name" id="txt-website-name" value="<?= $setting_data[0]->website_name ?? null ?>" required>
        </div>
        <div class="form-group">
            <label>Website Phone *</label>
            <input type="text" class="form-control" name="txt-website-phone" id="txt-website-phone" value="<?= $setting_data[0]->website_phone ?? null ?>" required>
        </div>
        <div class="form-group">
            <label>Website Email *</label>
            <input type="email" class="form-control" name="txt-website-email" id="txt-website-email" value="<?= $setting_data[0]->website_email ?? null ?>" required>
        </div>
        <div class="form-group">
            <label>Website Address *</label>
            <textarea class="form-control" name="txt-website-address" id="txt-website-address" required><?= $setting_data[0]->website_address ?? null ?></textarea>
        </div>
        <div class="form-group">
            <label>Website Description *</label>
            <textarea class="form-control" name="txt-website-description" id="txt-website-description" required><?= $setting_data[0]->website_description ?? null ?></textarea>
        </div>
        <div><label>Website Logo *</label></div>
        <div class="form-group img-box" style="background-image: url(<?= $BASE_URL ?>/public/img/upload/setting/<?= $setting_data[0]->website_logo ?? null ?>);">
            <input type="file" name="txt-file" id="txt-file">
            <input type="hidden" name="txt-website-logo" id="txt-website-logo" value="<?= $setting_data[0]->website_logo ?? null ?>" required>
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
        var body = $('body');
        var imgBox = $('.img-box');

        $('#btn-edit-setting').click(function() {
            var id = $('#txt-id').val();
            var website_name = $('#txt-website-name').val();
            var website_phone = $('#txt-website-phone').val();
            var website_email = $('#txt-website-email').val();
            var website_address = $('#txt-website-address').val();
            var website_description = $('#txt-website-description').val();
            var website_logo = $('#txt-website-logo').val();

            $.ajax({
                url: "<?= $BASE_URL ?>/admin/update-setting",
                type: "POST",
                data: {
                    id: id,
                    website_name: website_name,
                    website_phone: website_phone,
                    website_email: website_email,
                    website_address: website_address,
                    website_description: website_description,
                    website_logo: website_logo
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

        //upload img
        body.on('change', '#txt-file', function() {
            var loading = '<div class="loading-img"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>';
            var eThis = $(this);
            var frm = eThis.closest('form.upl');
            var frm_data = new FormData(frm[0]);
            $.ajax({
                url: '<?= $BASE_URL ?>/admin/upl-img-setting',
                type: 'POST',
                data: frm_data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                beforeSend: function() {
                    imgBox.append(loading);
                },
                success: function(data) {
                    imgBox.css({
                        'background-image': 'url(<?= $BASE_URL ?>/public/img/upload/setting/' + data.imgName + ')'
                    });
                    imgBox.find('.loading-img').remove();
                    eThis.parent().find('#txt-website-logo').val(data.imgName);
                }
            });
        });

    });
</script>