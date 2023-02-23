<?php
require 'portal/header.admin.view.php';
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <h1>Edit user</h1>
    <?php
    if (isset($_SESSION['error_message_form'])) {
        echo '<div class="alert alert-danger" role="alert" id="alert-message">' . $_SESSION['error_message_form'] . '</div>';
        unset($_SESSION['error_message_form']);
    }
    ?>
    <form method="post">
        <input type="text" class="form-control" name="txt-id" id="txt-id" value="<?= $user_data[0]->id ?>" hidden>
        <div class="form-group">
            <label>Fullname *</label>
            <input type="text" class="form-control" name="txt-fullname" id="txt-fullname" value="<?= $user_data[0]->fullname ?>" required>
        </div>
        <div class="form-group">
            <label>Username *</label>
            <input type="text" class="form-control" name="txt-username" id="txt-username" value="<?= $user_data[0]->username ?>" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="txt-password" id="txt-password">
            <input type="text" class="form-control" name="txt-old-password" id="txt-old-password" value="<?= $user_data[0]->password ?>" hidden>
        </div>
        <div class="form-group">
            <label>Status *</label>
            <select class="form-control" name="txt-status" id="txt-status" required>
                <option value="1" <?= $user_data[0]->status == 1 ? 'selected' : '' ?>>Enable</option>
                <option value="2" <?= $user_data[0]->status == 2 ? 'selected' : '' ?>>Disable</option>
            </select>
        </div>
        <button type="button" class="btn btn-primary" id="btn-edit-user">Update</button>
        <a href="<?= $BASE_URL ?>/admin/user"><button type="button" class="btn btn-danger">Cancel</button></a>
    </form>
</div>

<?php require 'portal/footer.admin.view.php';  ?>
<script>
    $(document).ready(function() {
        var body = $('body');

        $('#btn-edit-user').click(function() {
            var id = $('#txt-id').val();
            var fullname = $('#txt-fullname').val();
            var username = $('#txt-username').val();
            var password = $('#txt-password').val();
            var old_password = $('#txt-old-password').val();
            var status = $('#txt-status').val();

            $.ajax({
                url: "<?= $BASE_URL ?>/admin/update-user?id=" + <?= $user_data[0]->id ?>,
                type: "POST",
                data: {
                    fullname: fullname,
                    username: username,
                    password: password,
                    old_password: old_password,
                    status: status
                },
                success: function(result) {
                    var message = JSON.parse(result);
                    if (message.message == "updated_success") {
                        alert("Your data has been updated!");
                        window.location.href = "<?= $BASE_URL ?>/admin/user";
                    } else if (message.message == "updated_error_validation") {
                        window.location.reload();
                    }
                    else {
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