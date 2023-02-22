<?php
require 'portal/header.admin.view.php';
$categoryController = new CategoryController();
$categoryList = $categoryController->get_cate_on_form();

$newsController = new NewsController();
$newsList = $newsController->get_news_on_form();
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h1>Add new slide</h1>
    <form action="/admin/add-slide-data" method="post" class="upl">
        <div class="form-group">
            <label>News</label>
            <select class="form-control" name="txt-news" id="txt-news">
                <option value="0">---Choose news---</option>
                <?php
                foreach ($newsList as $row) {
                ?>
                    <option value="<?= $row->id ?>"><?= mb_substr(strip_tags($row->title),0,100,"utf-8"); ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Category *</label>
            <select class="form-control" name="txt-cate" id="txt-cate" required>
                <option value="0">---Choose category---</option>
                <?php
                foreach ($categoryList as $row) {
                ?>
                    <option value="<?= $row->id ?>"><?= $row->name ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Title *</label>
            <input type="text" class="form-control" name="txt-title" id="txt-title" required>
        </div>
        <div class="form-group">
            <label>Order *</label>
            <input type="text" class="form-control" name="txt-od" id="txt-od" value="<?= isset($slide_data[0]->od) ? $slide_data[0]->od + 1 : 0 ?>" required>
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
            <a href="/admin/slide"><button type="button" class="btn btn-danger">Cancel</button></a>
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
                        'background-image': 'url(<?php echo $BASE_URL; ?>/public/img/upload/slide/' + data.imgName + ')'
                    });
                    imgBox.find('.loading-img').remove();
                    eThis.parent().find('#txt-photo').val(data.imgName);
                }
            });
        });
    });
</script>