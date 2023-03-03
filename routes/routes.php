<?php

/**
 * Admin Block
 */

//authentication
$router->get("admin","AuthenticationController@loginPage");
$router->get("admin/login","AuthenticationController@loginPage");
$router->post("admin/do_login","AuthenticationController@doLogin");
$router->get("admin/logout","AuthenticationController@logout");

//user
$router->get("admin/user","UserController@index");
$router->get("admin/add-user","UserController@get_add_user");
$router->get("admin/edit-user","UserController@get_edit_user");
$router->post("admin/add-user-data","UserController@add_user_data");
$router->post("admin/update-user","UserController@update_user");
$router->get("admin/delete-user","UserController@delete_user");

//category
$router->get("admin/category","CategoryController@index");
$router->get("admin/add-cate","CategoryController@get_add_cate");
$router->get("admin/edit-cate","CategoryController@get_edit_cate");
$router->post("admin/add-cate-data","CategoryController@add_cate_data");
$router->post("admin/update-cate","CategoryController@update_cate");
$router->get("admin/delete-cate","CategoryController@delete_cate");

//slide
$router->get("admin/slide","SlideController@slide");
$router->get("admin/add-slide","SlideController@get_add_slide");
$router->get("admin/edit-slide","SlideController@get_edit_slide");
$router->post("admin/add-slide-data","SlideController@add_slide_data");
$router->post("admin/update-slide","SlideController@update_slide");
$router->get("admin/delete-slide","SlideController@delete_slide");
$router->post("admin/upl-img-slide","SlideController@upl_img_slide");

//advertise
$router->get("admin/ads","AdvertiseController@ads");
$router->get("admin/add-ads","AdvertiseController@get_add_ads");
$router->get("admin/edit-ads","AdvertiseController@get_edit_ads");
$router->post("admin/add-ads-data","AdvertiseController@add_ads_data");
$router->post("admin/update-ads","AdvertiseController@update_ads");
$router->get("admin/delete-ads","AdvertiseController@delete_ads");
$router->post("admin/upl-img-ads","AdvertiseController@upl_img_ads");

//news
$router->get("admin/news","NewsController@news");
$router->get("admin/add-news","NewsController@get_add_news");
$router->get("admin/edit-news","NewsController@get_edit_news");
$router->post("admin/add-news-data","NewsController@add_news_data");
$router->post("admin/update-news","NewsController@update_news");
$router->get("admin/delete-news","NewsController@delete_news");
$router->post("admin/upl-img-news","NewsController@upl_img_news");


/**
 * Home Block
 */
$router->get("","HomeController@index");
$router->get("news-list","HomeController@news_list");
$router->get("news-detail","HomeController@news_detail");
$router->get("search-news","HomeController@search_news");

