<?php
require 'portal/header.admin.view.php';
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h1>Setting</h1>
    <form action="<?= $BASE_URL ?>/admin/update-setting?id=<?= $setting_data[0]->id ?>" method="post" class="upl">
        <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $setting_data[0]->id ?>" hidden>
        <div class="form-group">
            <label>Title *</label>
            <input type="text" class="form-control" name="txt-title" id="txt-title" value="<?= $setting_data[0]->title ?>" required>
        </div>
        <div class="form-group">
            <label>Description *</label>
            <textarea class="form-control" name="txt-des" id="txt-des" required><?= $setting_data[0]->des ?></textarea>
        </div>
        <div style="float: right;">
            <button type="submit" class="btn btn-primary btn-edit-setting">Update</button>
            <a href="<?= $BASE_URL ?>/admin/setting"><button type="button" class="btn btn-danger">Cancel</button></a>
        </div>
    </form>
</div>

<?php require 'portal/footer.admin.view.php';  ?>