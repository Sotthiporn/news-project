<?php
require 'portal/header.view.php';
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
                            <div>
                                <h2><?= $vals->title ?></h2>
                            </div>

                            <div class="txt-box-time">
                                <div>
                                    <p style="color: cadetblue;"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <?php
                                        $date = date("Y-m-d", strtotime($vals->date_post));
                                        $time =  date("H:i", strtotime($vals->date_post));
                                        $homeController->get_post_date($time, $date);
                                        ?>
                                    </p>
                                </div>
                                <div>
                                    <!-- Facebook -->
                                    <a :href="https://www.facebook.com/sharer/sharer.php?u=<?= $CURRENT_URL ?>" onclick="window.open(this.href,'_blank','toolbar=yes,scrollbars=yes,resizable=yes,top=24,left=24,width=550,height=650');return false;" rel="nofollow" class="social-icon social-icon-fb"><i class="fa fa-facebook-f"></i></a>
                                    <!-- Telegram -->
                                    <a target="_blank" :href="https://t.me/share/url?url=<?= $CURRENT_URL ?>&text=<?= $vals->title ?>" class="social-icon social-icon-telegram"><i class="fa fa-telegram"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div>
                                <p><?= $vals->des ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-xl-3 col-lg-9 ads-detail-box">
            <div class="row">
                <?php
                $ads = $homeController->adsHome3();
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
                                    <img src="<?= $BASE_URL ?>/public/img/upload/ads/<?= $row->img; ?>">
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
            <div class="fb-comments" data-href="<?= $BASE_URL ?>" data-width="" data-numposts="5"></div>
        </div>
    </div>
</div>

<?php require 'portal/footer.view.php';  ?>