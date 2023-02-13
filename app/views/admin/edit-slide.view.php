<?php
require 'portal/header.admin.view.php';
$categoryController = new CategoryController();
$cate = $categoryController->get_cate_on_form();
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h1>Edit slide</h1>
    <form method="post" class="upl">
        <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $slide_data[0]->id ?>" hidden>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="txt-cate" id="txt-cate" require>
                <option value="0">---Choose category---</option>
                <?php
                foreach ($cate as $key => $row) {
                ?>
                    <option value="<?= $row->id ?>" <?= isset($slide_data[0]) && $slide_data[0]->cate_id == $row->id ? 'selected' : '' ?>><?= $row->name ?></option>
                <?php
                }
                ?>
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="txt-title" id="txt-title" value="<?= $slide_data[0]->title ?>" require>
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="text" class="form-control" name="txt-od" id="txt-od" value="<?= $slide_data[0]->od ?>" require>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="txt-status" id="txt-status" require>
                <option value="1" <?= $slide_data[0]->status == 1 ? 'selected' : '' ?>>Enable</option>
                <option value="2" <?= $slide_data[0]->status == 2 ? 'selected' : '' ?>>Disable</option>
            </select>
        </div>
        <div><label>Photo</label></div>
        <div class="form-group img-box" style="background-image: url(/public/img/upload/news/<?= $slide_data[0]->img ?>);">
            <input type="file" name="txt-file" id="txt-file">
            <input type="hidden" name="txt-photo" id="txt-photo" value="<?= $slide_data[0]->img ?>">
        </div>
        <div style="float: right;">
            <button type="submit" class="btn btn-primary btn-edit-slide">Update</button>
            <a href="/admin/slide"><button type="button" class="btn btn-danger">Cancel</button></a>
        </div>
    </form>
</div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
    $(document).ready(function() {
        var body = $('body');
        var photo = $('#txt-photo');
        var imgBox = $('.img-box');

        $('.btn-edit-slide').click(function() {
            var id = $('#txt-id').val();
            var title = $('#txt-title').val();
            var photo = $('#txt-photo').val();
            var cate = $('#txt-cate').val();
            var od = $('#txt-od').val();
            var status = $('#txt-status').val();

            $.ajax({
                url: "/admin/update-slide?id=" + <?php echo $slide_data[0]->id ?>,
                type: "POST",
                data: {
                    title: title,
                    photo: photo,
                    od: od,
                    cate_id: cate,
                    status: status
                },
                success: function(result) {
                    var message = JSON.parse(result);
                    if (message.message == "updated_success") {
                        alert("Your data has been updated!");
                        window.location.href = "/admin/slide";
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
                url: '/admin/upl-img-slide',
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
                        'background-image': 'url(/public/img/upload/news/' + data.imgName + ')'
                    });
                    imgBox.find('.loading-img').remove();
                    eThis.parent().find('#txt-photo').val(data.imgName);
                }
            });
        });
    });
</script>