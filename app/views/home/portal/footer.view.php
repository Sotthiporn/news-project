<footer class="page-footer font-small mdb-color pt-4 bg-dark text-white">
  <div class="container text-center text-md-left">
    <div class="row text-center text-md-left mt-3 pb-3">
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">RUPP-News 24h</h6>
       <p>Digital Design & IT institute in Cambodia.We provide professional skill in Creative Digital Design / Photography / Video Editing / IT and Programming Skill and News 24h.</p>
      </div>
      <hr class="w-100 clearfix d-md-none">
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Category</h6>
        <?php
            foreach ($cate as $key => $val) {
        ?>
                <p>
                <a href="/news-list?cate=<?= $val->id ?>" class="text-white"><?= $val->name ?></a>
                </p>
            <?php
            }
        ?>
      </div>
      <hr class="w-100 clearfix d-md-none">
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Our App</h6>
        <p>
          <a class="text-white">One Sala</a>
         </p>
         <p>
          <a class="text-white">Instinct Mobile App</a>
         </p>
        <p>
          <a class="text-white">Instinct Institute Web</a>
        </p>
      </div>
      <hr class="w-100 clearfix d-md-none">
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
        <p>
          <i class="fa fa-home mr-3"></i> #72, Str 566, Toul kork Commune Phnom Penh 00855
        </p>
        <p>
          <i class="fa fa-envelope mr-3"></i> sotthiporns@gmail.com</p>
        <p>
          <i class="fa fa-phone mr-3"></i> +855 96 860 5854</p>
      </div>
    </div>
    <hr>
    <div class="row d-flex align-items-center">
      <div class="col-md-7 col-lg-8">
        <p class="text-center text-md-left">© 2023 Copyright:
          <a href="/" class="text-white">
            <strong> RUPP-News 24h</strong>
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
<script src="public/style/bootstrap-4.5.0/js/bootstrap.min.js"></script>
<script src="public/js/news-list-action.js"></script>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>