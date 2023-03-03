<?php require 'portal/header.view.php';  ?>

<div class="container mt-5 text-center">
    <h2 class="mb-4">
        <?php if(!empty($team_list)) echo 'ក្រុមរបស់យើង' ?>
    </h2>
    <div class="row">
        <?php
        foreach ($team_list as $team) {
            echo '<div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow py-5 px-4">
                        <img onerror="this.src=' . $BASE_URL . '/public/img/default/bg_gallery.png" src="' . $BASE_URL . '/public/img/upload/team/' . $team->img . '" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" style="width: 100px; height: 100px; object-fit: cover;"/>
                        <h5 class="mb-0">' . $team->name . '</h5><span class="small text-uppercase text-muted">Member</span>
                    </div>
                </div>';
        }
        ?>
    </div>
</div>
<?php require 'portal/footer.view.php';  ?>