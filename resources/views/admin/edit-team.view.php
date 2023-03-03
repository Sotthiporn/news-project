<?php
require 'portal/header.admin.view.php';
$categoryController = new CategoryController();
$categoryList = $categoryController->get_cate_on_form();

$newsController = new NewsController();
$newsList = $newsController->get_news_on_form();
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h1>Edit team</h1>
    <form method="post" class="upl">
        <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $team_data[0]->id ?>" hidden>
        <div class="form-group">
            <label>Name *</label>
            <input type="text" class="form-control" name="txt-name" id="txt-name" value="<?= $team_data[0]->name ?>" required>
        </div>
        <div class="form-group">
            <label>Order *</label>
            <input type="text" class="form-control" name="txt-od" id="txt-od" value="<?= $team_data[0]->od ?>" required>
        </div>
        <div class="form-group">
            <label>Status *</label>
            <select class="form-control" name="txt-status" id="txt-status" required>
                <option value="1" <?= $team_data[0]->status == 1 ? 'selected' : '' ?>>Enable</option>
                <option value="2" <?= $team_data[0]->status == 2 ? 'selected' : '' ?>>Disable</option>
            </select>
        </div>
        <div><label>Photo *</label></div>
        <div class="form-group img-box" style="background-image: url(<?php echo $BASE_URL; ?>/public/img/upload/team/<?= $team_data[0]->img ?>);">
            <input type="file" name="txt-file" id="txt-file">
            <input type="hidden" name="txt-photo" id="txt-photo" value="<?= $team_data[0]->img ?>" required>
        </div>
        <div style="float: right;">
            <button type="submit" class="btn btn-primary btn-edit-team">Update</button>
            <a href="<?= $BASE_URL ?>/admin/team"><button type="button" class="btn btn-danger">Cancel</button></a>
        </div>
    </form>
</div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
    $(document).ready(function() {
        var body = $('body');
        var photo = $('#txt-photo');
        var imgBox = $('.img-box');

        $('.btn-edit-team').click(function() {
            var id = $('#txt-id').val();
            var name = $('#txt-name').val();
            var photo = $('#txt-photo').val();
            var od = $('#txt-od').val();
            var status = $('#txt-status').val();

            $.ajax({
                url: "<?= $BASE_URL ?>/admin/update-team?id=" + <?php echo $team_data[0]->id ?>,
                type: "POST",
                data: {
                    id: id,
                    name: name,
                    photo: photo,
                    od: od,
                    status: status
                },
                success: function(result) {
                    var message = JSON.parse(result);
                    if (message.message == "updated_success") {
                        alert("Your data has been updated!");
                        window.location.href = "<?= $BASE_URL ?>/admin/team";
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