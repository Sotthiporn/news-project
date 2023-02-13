<?php require 'portal/header.view.php';  ?>

 <div class="container-news">
     <!-- slide -->
    <div class="slide-box">
          <div class="slide-box-1">
              <?php 
                  $slide1 = $class->slideHome();
                  foreach($slide1 as $val){ 
                ?>
                 <a href="/news-detail?id=<?= $val[5] ?>">
                  <img src="/../public/img/upload/news/<?= $val[2] ?>">
                  <a href="/news-list?cate=<?= $val[4] ?>">
                   <div class="text-cate-slide<?= $val[4] ?>"><?= $val[8] ?></div>
                  </a>
                   <div class="title-slide"><?= $val[1] ?></div>
              </a>
              <?php } ?>
          </div>  
          <div class="slide-box-2">
              <?php 
                  $slide2 = $class->slideHome2();
                  foreach($slide2 as $val){ 
                ?>
              <a href="/news-detail?id=<?= $val[5] ?>">
                  <img src="/../public/img/upload/news/<?= $val[2] ?>">
                  <a href="/news-list?cate=<?= $val[4] ?>">
                    <div class="text-cate-slide<?= $val[4] ?>"><?= $val[8] ?></div>
                  </a>
                  <div class="title-slide"><?= $val[1] ?></div>
                </a>
                <?php } ?>
          </div>
          <div class="slide-box-1">
              <?php 
                  $slide3 = $class->slideHome3();
                  foreach($slide3 as $val){ 
                ?>
              <a href="/news-detail?id=<?= $val[5] ?>">
                  <img src="/../public/img/upload/news/<?= $val[2] ?>">
                  <a href="/news-list?cate=<?= $val[4] ?>">
                    <div class="text-cate-slide<?= $val[4] ?>"><?= $val[8] ?></div>
                  </a>
                  <div class="title-slide"><?= $val[1] ?></div>
                </a>
                <?php } ?>
          </div>
          <div class="slide-box-2">
              <?php
                  $slide4 = $class->slideHome4();
                  foreach($slide4 as $val){ 
                ?>
              <a href="/news-detail?id=<?= $val[5] ?>">
                  <img src="/../public/img/upload/news/<?= $val[2] ?>">
                  <a href="/news-list?cate=<?= $val[4] ?>">
                    <div class="text-cate-slide<?= $val[4] ?>"><?= $val[8] ?></div>
                  </a>
                  <div class="title-slide"><?= $val[1] ?></div>
                </a>
                <?php } ?>
          </div>
    </div>

    <div class="slide-ads">
      <div class="slide-box-ads">
        <?php 
          $ads = $class->adsHome2();
          foreach($ads as $val){ 
            if($val->type=="Video"){
              echo $val->url;
            }else{
              ?>
              <a href="<?= $val->url ?>" target="_blank">
               <img src="/../public/img/upload/ads/<?= $val->img ?>">
               </a>
          <?php } } ?>
      </div>
    </div>
  </div>
    <!-- news-list in home -->
    <div class="container-news">
      <div class="row">
      <?php 
          foreach($cate as $key => $cates){ 
        ?>
        <div class="col-xl-12 col-lg-12">
          <div class="text-cate-slide<?= $cates->id ?>" style="margin-top:20px;"><a href="/news-list?cate=<?= $cates->id ?>">&nbsp&nbsp&nbsp<?= $cates->name ?></a></div>
          <div class="home-ct-title"></div>
        </div>
        <?php 
            $cate_id = $cates->id;
            $news_home = $class->news_home($cate_id);
              foreach($news_home as $key => $val){ 
          ?>
        <div class="col-xl-4 box-item">
        <a href="/news-detail?id=<?= $val->id ?>"><div class="img-box" style="background-image: url(public/img/upload/news/<?= $val->img  ?>)"></div></a>
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