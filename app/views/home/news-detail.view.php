<?php 
    require 'portal/header.view.php';
    include('_config_inc.php');
    $BASE_URL = BASE_URL;
    var_dump($BASE_URL); die();
?>

<!-- news by click -->
<div class="container" style="margin-top: 10px; margin-bottom: 50px;">
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 news-detail-box">
            <div class="row">
                <?php
                foreach ($data['news-detail'] as $key => $vals) {
                ?>
                    <div class="col-xl-12 box">
                        <div class="txt-box">
                            <h2><?= $vals->title ?></h2>
                            <div style="float:right;" class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>

                            <p style="color: cadetblue;"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <?php
                                $date = date("Y-m-d", strtotime($vals->date_post));
                                $time =  date("H:i", strtotime($vals->date_post));
                                $class->get_post_date($time, $date);
                                ?>
                            </p>
                            <p><?= $vals->des ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-xl-3 col-lg-9 ads-detail-box">
            <div class="row">
                <?php
                $ads = $class->adsHome3();
                foreach ($ads as $key => $row) {
                    if ($row->type == "Video") {
                ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ads-box">
                            <div class="img-box">
                                <?= $row->url ?>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ads-box">
                            <div class="img-box">
                                <a href="<?= $row->url ?>" target="_blank">
                                    <img src="public/img/upload/ads/<?= $row->img; ?>">
                                </a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="fb-page" data-href="https://www.facebook.com/rupp.edu.kh" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/rupp.edu.kh" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/rupp.edu.kh">Royal University Of Phnom Penh
                            </a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ?>
    <div class="row" style="margin-top: 10px;">
        <div class="col-xl-12">
            <div class="fb-comments" data-href="<?= $BASE_URL ?>news-detail?id=<?= $vals->id ?>" data-numposts="5" data-width=""></div>
        </div>
    </div>
</div>

<?php require 'portal/footer.view.php';  ?>