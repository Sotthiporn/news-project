<?php require 'portal/header.view.php';  ?>

<div class="container-news">
  <!-- slide -->
  <div class="slide-box">
    <div class="slide-box-1">
      <?php
      $slide1 = $homeController->slideHome();
      foreach ($slide1 as $val) {
      ?>
        <a href="<?= empty($val->news_id) ? 'javascript:;' : '/news-detail?id=' .$val->news_id ?>">
          <img onerror="this.src='/public/img/default/no_image_found.png'" src="/../public/img/upload/slide/<?= $val->photo ?>">
          <a href="<?= empty($val->cate_id) ? 'javascript:;' : '/news-list?cate=' .$val->cate_id ?>">
            <div class="text-cate-slide<?= $val->cate_id ?>"><?= $val->category_name ?></div>
          </a>
          <div class="title-slide"><?= $val->title ?></div>
        </a>
      <?php } ?>
    </div>
    <div class="slide-box-2">
      <?php
      $slide2 = $homeController->slideHome2();
      foreach ($slide2 as $val) {
      ?>
        <a href="<?= empty($val->news_id) ? 'javascript:;' : '/news-detail?id=' .$val->news_id ?>">
          <img onerror="this.src='/public/img/default/no_image_found.png'" src="/../public/img/upload/slide/<?= $val->photo ?>">
          <a href="<?= empty($val->cate_id) ? 'javascript:;' : '/news-list?cate=' .$val->cate_id ?>">
            <div class="text-cate-slide<?= $val->cate_id ?>"><?= $val->category_name ?></div>
          </a>
          <div class="title-slide"><?= $val->title ?></div>
        </a>
      <?php } ?>
    </div>
    <div class="slide-box-1">
      <?php
      $slide3 = $homeController->slideHome3();
      foreach ($slide3 as $val) {
      ?>
        <a href="<?= empty($val->news_id) ? 'javascript:;' : '/news-detail?id=' .$val->news_id ?>">
          <img onerror="this.src='/public/img/default/no_image_found.png'" src="/../public/img/upload/slide/<?= $val->photo ?>">
          <a href="<?= empty($val->cate_id) ? 'javascript:;' : '/news-list?cate=' .$val->cate_id ?>">
            <div class="text-cate-slide<?= $val->cate_id ?>"><?= $val->category_name ?></div>
          </a>
          <div class="title-slide"><?= $val->title ?></div>
        </a>
      <?php } ?>
    </div>
    <div class="slide-box-2">
      <?php
      $slide4 = $homeController->slideHome4();
      foreach ($slide4 as $val) {
      ?>
        <a href="<?= empty($val->news_id) ? 'javascript:;' : '/news-detail?id=' .$val->news_id ?>">
          <img onerror="this.src='/public/img/default/no_image_found.png'" src="/../public/img/upload/slide/<?= $val->photo ?>">
          <a href="<?= empty($val->cate_id) ? 'javascript:;' : '/news-list?cate=' .$val->cate_id ?>">
            <div class="text-cate-slide<?= $val->cate_id ?>"><?= $val->category_name ?></div>
          </a>
          <div class="title-slide"><?= $val->title ?></div>
        </a>
      <?php } ?>
    </div>
  </div>

  <div class="slide-ads">
    <div class="slide-box-ads">
      <?php
      $ads = $homeController->adsHome2();
      foreach ($ads as $val) {
        if ($val->type == "Video") {
          echo $val->url;
        } else {
      ?>
          <a href="<?= $val->url ?>" target="_blank">
            <img onerror="this.src='/public/img/default/no_image_found.png'" src="/../public/img/upload/ads/<?= $val->img ?>">
          </a>
      <?php }
      } ?>
    </div>
  </div>
</div>
<!-- news-list in home -->
<div class="container-news">
  <div class="row">
    <?php
    foreach ($cate as $key => $cates) {
    ?>
      <div class="col-xl-12 col-lg-12">
        <div class="text-cate-slide<?= $cates->id ?>" style="margin-top:20px;"><a href="/news-list?cate=<?= $cates->id ?>">&nbsp&nbsp&nbsp<?= $cates->name ?></a></div>
        <div class="home-ct-title"></div>
      </div>
      <?php
      $cate_id = $cates->id;
      $news_home = $homeController->news_home($cate_id);
      foreach ($news_home as $key => $val) {
      ?>
        <div class="col-xl-4 box-item">
          <a href="/news-detail?id=<?= $val->id ?>">
            <div class="img-box" style="background-image: url(public/img/upload/news/<?= $val->img  ?>)"></div>
          </a>
          <div class="txt-box">
            <h1><?= $val->title ?></h1>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>
</div>
<?php require 'portal/footer.view.php';  ?>