<?php
require 'portal/header.admin.view.php';
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h1>Add new team</h1>
    <form action="<?= $BASE_URL ?>/admin/add-team-data" method="post" class="upl">
        <div class="form-group">
            <label>Name *</label>
            <input type="text" class="form-control" name="txt-name" id="txt-name" required>
        </div>
        <div class="form-group">
            <label>Order *</label>
            <input type="text" class="form-control" name="txt-od" id="txt-od" value="<?= isset($team_data[0]->od) ? $team_data[0]->od + 1 : 0 ?>" required>
        </div>
        <div class="form-group">
            <label>Status *</label>
            <select class="form-control" name="txt-status" id="txt-status" required>
                <option value="1">Enable</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <div><label>Photo *</label></div>
        <div class="form-group img-box">
            <input type="file" name="txt-file" id="txt-file">
            <input type="hidden" name="txt-photo" id="txt-photo" required>
        </div>
        <div style="float: right;">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="<?= $BASE_URL ?>/admin/team"><button type="button" class="btn btn-danger">Cancel</button></a>
        </div>
    </form>
</div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
    $(document).ready(function() {
        var body = $('body');

        //upload img
        body.on('change', '#txt-file', function() {
            var loading = '<div class="loading-img"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>';
            var eThis = $(this);
            var imgBox = $('.img-box');
            var photo = $('#txt-photo');
            var frm = eThis.closest('form.upl');
            var frm_data = new FormData(frm[0]);
            $.ajax({
                url: '<?= $BASE_URL ?>/admin/upl-img-team',
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
                        'background-image': 'url(<?= $BASE_URL ?>/public/img/upload/team/' + data.imgName + ')'
                    });
                    imgBox.find('.loading-img').remove();
                    eThis.parent().find('#txt-photo').val(data.imgName);
                }
            });
        });
    });
</script>