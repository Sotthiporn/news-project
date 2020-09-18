<?php require 'portal/header.view.php';  ?>

<!-- news-list by category -->
<div class="container" style="margin-top: 10px; margin-bottom: 50px;">
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 news-list-box">
            <div class="row">
            <?php 
                foreach($data['news-list'] as $key => $vals){ 
            ?>
                <div class="col-xl-12 box">
                   <div class="img-box">
                        <a href="news-detail?id=<?= $vals->id ?>">
                            <img src="public/img/news/<?= $vals->img  ?>">
                         </a>
                   </div>
                   <div class="txt-box">
                       <a href="news-detail?id=<?= $vals->id ?>"><?= $vals->title ?>
                       <p style="color: cadetblue;"><i class="fa fa-clock-o" aria-hidden="true"></i>
                           <?php
                            $date = date("Y-m-d", strtotime($vals->date_post));
                            $time =  date("H:i", strtotime($vals->date_post));
                            $class->get_post_date($time,$date);
                           ?>
                        </p>
                       <p><?= mb_substr(strip_tags($vals->des),0,100,"utf-8"); ?>...</p>
                       </a>
                   </div>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="col-xl-3 col-lg-9 ads-box">
            <div class="row">
            <?php 
                $news_list2 = $class->news_list2();
                foreach($news_list2 as $key => $vals){ 
            ?>
                <div class="col-xl-12 col-lg-12 ads-box-news">
                    <div class="img-box">
                        <a href="news-detail?id=<?= $vals->id ?>">
                            <img src="public/img/news/<?= $vals->img  ?>">
                        </a>
                    </div>
                    <div class="txt-box">
                        <a href="news-detail?id=<?= $vals->id ?>"><?= $vals->title  ?>
                        </a>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php require 'portal/footer.view.php';  ?>