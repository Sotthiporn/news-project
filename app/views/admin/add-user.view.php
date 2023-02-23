<?php
require 'portal/header.admin.view.php';
?>
<div id="content" class="p-4 p-md-5 pt-5">
    <h1>Add new user</h1>
    <?php
    if (isset($_SESSION['error_message_form'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message_form'] . '</div>';
        unset($_SESSION['error_message_form']);
    }
    ?>
    <form action="<?= $BASE_URL ?>/admin/add-user-data" method="post">
        <div class="form-group">
            <label>Fullname *</label>
            <input type="text" class="form-control" name="txt-fullname" id="txt-fullname" required>
        </div>
        <div class="form-group">
            <label>Username *</label>
            <input type="text" class="form-control" name="txt-username" id="txt-username" required>
        </div>
        <div class="form-group">
            <label>Password *</label>
            <input type="text" class="form-control" name="txt-password" id="txt-password" required>
        </div>
        <div class="form-group">
            <label>Status *</label>
            <select class="form-control" name="txt-status" id="txt-status" required>
                <option value="1">Enable</option>
                <option value="2">Disable</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        <a href="<?= $BASE_URL ?>/admin/user"><button type="button" class="btn btn-danger">Cancel</button></a>
    </form>
</div>
<?php require 'portal/footer.admin.view.php';  ?>