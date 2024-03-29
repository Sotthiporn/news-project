<footer class="page-footer font-small mdb-color pt-4 bg-dark text-white">
  <div class="container text-center text-md-left">
    <div class="row text-center text-md-left mt-3 pb-3">
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold"><?php echo $setting_data[0]->website_name ?? 'RUPP-News 24h' ?></h6>
       <p><?php echo $setting_data[0]->website_description ?? '' ?></p>
      </div>
      <hr class="w-100 clearfix d-md-none">
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Category</h6>
        <?php
            foreach ($cate as $key => $val) {
        ?>
                <p>
                <a href="/<?= $BASE_URL ?>/news-list?cate=<?= $val->id ?>" class="text-white"><?= $val->name ?></a>
                </p>
            <?php
            }
        ?>
      </div>
      <hr class="w-100 clearfix d-md-none">
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Our Platform</h6>
        <p>
          <a class="text-white">Rupp Digital Card</a>
         </p>
         <p>
          <a class="text-white">RUPP Mobile App</a>
         </p>
        <p>
          <a class="text-white">RUPP Web</a>
        </p>
      </div>
      <hr class="w-100 clearfix d-md-none">
      <div class="col-md-5 col-lg-4 col-xl-4 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
        <p>
          <i class="fa fa-map-marker mr-3"></i> <?php echo $setting_data[0]->website_address ?? '' ?>
        </p>
        <p>
          <i class="fa fa-envelope mr-3"></i> <?php echo $setting_data[0]->website_email ?? '' ?></p>
        <p>
          <i class="fa fa-phone mr-3"></i> <?php echo $setting_data[0]->website_phone ?? '' ?></p>
      </div>
    </div>
    <hr>
    <div class="row d-flex align-items-center">
      <div class="col-md-7 col-lg-8">
        <p class="text-center text-md-left">© <?php echo date('Y') ?> Copyright:
          <a href="<?= $BASE_URL ?>/" class="text-white">
            <strong> <?php echo $setting_data[0]->website_copyright ?? 'RUPP G23 E7 Team1' ?></strong>
          </a>
        </p>

      </div>
      <div class="col-md-5 col-lg-4 ml-lg-0">
        <div class="text-center text-md-right">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-lg rgba-white-slight mx-1">
                <i class="fa fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-lg rgba-white-slight mx-1">
                <i class="fa fa-instagram"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-lg rgba-white-slight mx-1">
                <i class="fa fa-telegram"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-lg rgba-white-slight mx-1">
                <i class="fa fa-youtube-play"></i>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</footer>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0" nonce="EWKN3QaE"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= $BASE_URL ?>/public/style/bootstrap-4.5.0/js/bootstrap.min.js"></script>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>