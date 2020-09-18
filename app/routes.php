<?php

$router->get("","HomeController@index");
$router->get("news-list","HomeController@news_list");
$router->get("news-detail","HomeController@news_detail");

//category
$router->get("admin","AdminController@index");
$router->get("admin/add-cate","AdminController@get_add_cate");
$router->get("admin/edit-cate","AdminController@get_edit_cate");
$router->post("admin/add-cate-data","AdminController@add_cate_data");
$router->post("admin/update-cate","AdminController@update_cate");
$router->get("admin/delete-cate","AdminController@delete_cate");

//slide
$router->get("admin/slide","AdminController@slide");
$router->get("admin/add-slide","AdminController@get_add_slide");
$router->get("admin/edit-slide","AdminController@get_edit_slide");
$router->post("admin/add-slide-data","AdminController@add_slide_data");
$router->post("admin/update-slide","AdminController@update_slide");
$router->get("admin/delete-slide","AdminController@delete_slide");
$router->post("admin/upl-img-slide","AdminController@upl_img_slide");

//advertise
$router->get("admin/ads","AdminController@ads");
$router->get("admin/add-ads","AdminController@get_add_ads");
$router->get("admin/edit-ads","AdminController@get_edit_ads");
$router->post("admin/add-ads-data","AdminController@add_ads_data");
$router->post("admin/update-ads","AdminController@update_ads");
$router->get("admin/delete-ads","AdminController@delete_ads");
$router->post("admin/upl-img-ads","AdminController@upl_img_ads");

//news
$router->get("admin/news","AdminController@news");
$router->get("admin/add-news","AdminController@get_add_news");
$router->get("admin/edit-news","AdminController@get_edit_news");
$router->post("admin/add-news-data","AdminController@add_news_data");
$router->post("admin/update-news","AdminController@update_news");
$router->get("admin/delete-news","AdminController@delete_news");
$router->post("admin/upl-img-news","AdminController@upl_img_news");


//search
$router->get("search-news","HomeController@search_news");

