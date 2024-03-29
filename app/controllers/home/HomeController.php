<?php

class HomeController
{

    //get home
    public function index()
    {
        //view
        return view('home');
    }
    public function news_home($cate_id)
    {
        //data
        $news_home = App::get('database')->getAll_tbl_limit('tbl_news', 'status=1 && location=1 && cate_id=' . $cate_id . '', 'od DESC', '0,6');
        return $news_home;
    }

    //get category
    public function category()
    {
        $cate = App::get('database')->getAll_tbl('tbl_category', 'status=1', 'od DESC');
        return $cate;
    }

    //get news list & detail
    public function news_list()
    {
        $cate_id = $_GET['cate'];
        $news_list = App::get('database')->getAll_tbl_limit('tbl_news', 'status=1 && location=1 && cate_id=' . $cate_id . '', 'od DESC', '0,1000');
        return view('news-list', ['news-list' => $news_list]);
    }
    public function news_list2()
    {
        $cateIdCondition = '';
        if (isset($_GET['cate'])) {
            $cateIdCondition = '&& cate_id= ' . $_GET['cate'];
        }
        $news_list2 = App::get('database')->getAll_tbl_limit('tbl_news', 'status=1 && location=2 ' . $cateIdCondition . '', 'od DESC', '0,10');
        return $news_list2;
    }
    public function news_detail()
    {
        $id = $_GET['id'];
        $news = App::get('database')->getAll_tbl('tbl_news', 'status=1 && id=' . $id . '', 'od DESC');
        return view('news-detail', ['news-detail' => $news]);
    }

    //get ads
    public function adsHome()
    {
        //get advertise data into HomePage
        $ads_data = App::get('database')->getAll_tbl_limit('tbl_ads', 'status=1 && location=1 && type="Photo"', 'id DESC', '0,1');
        return $ads_data;
    }
    public function adsHome2()
    {
        //get advertise data into HomePage
        $ads_data = App::get('database')->getAll_tbl_limit('tbl_ads', 'status=1 && location=2', 'id DESC', '0,2');
        return $ads_data;
    }
    public function adsHome3()
    {
        //get advertise data into HomePage
        $ads_data = App::get('database')->getAll_tbl_limit('tbl_ads', 'status=1 && location=3', 'id DESC', '0,100');
        return $ads_data;
    }

    //get slide
    public function slideHome()
    {
        //get slide data into HomePage
        $slide_data = App::get('database')->getAll_tbl_multi(
            'tbl_slide.*,tbl_category.name as category_name,tbl_category.color as category_color',
            'tbl_slide INNER JOIN tbl_category ON tbl_slide.cate_id = tbl_category.id',
            'tbl_slide.status=1',
            'tbl_slide.od DESC LIMIT 0,1'
        );
        return $slide_data;
    }
    public function slideHome2()
    {
        //get slide data into HomePage
        $slide_data = App::get('database')->getAll_tbl_multi(
            'tbl_slide.*,tbl_category.name as category_name,tbl_category.color as category_color',
            'tbl_slide INNER JOIN tbl_category ON tbl_slide.cate_id = tbl_category.id',
            'tbl_slide.status=1',
            'tbl_slide.od DESC LIMIT 1,1'
        );
        return $slide_data;
    }
    public function slideHome3()
    {
        //get slide data into HomePage
        $slide_data = App::get('database')->getAll_tbl_multi(
            'tbl_slide.*,tbl_category.name as category_name,tbl_category.color as category_color',
            'tbl_slide INNER JOIN tbl_category ON tbl_slide.cate_id = tbl_category.id',
            'tbl_slide.status=1',
            'tbl_slide.od DESC LIMIT 2,1'
        );
        return $slide_data;
    }
    public function slideHome4()
    {
        //get slide data into HomePage
        $slide_data = App::get('database')->getAll_tbl_multi(
            'tbl_slide.*,tbl_category.name as category_name,tbl_category.color as category_color',
            'tbl_slide INNER JOIN tbl_category ON tbl_slide.cate_id = tbl_category.id',
            'tbl_slide.status=1',
            'tbl_slide.od DESC LIMIT 3,1'
        );
        return $slide_data;
    }

    //search
    public function search_news()
    {
        $search_value = $_GET['search'];
        if (isset($search_value)) {
            $search = App::get('database')->getAll_tbl_multi(
                "tbl_news.*,tbl_category.name as category_name",
                "tbl_news INNER JOIN tbl_category ON tbl_news.cate_id = tbl_category.id",
                "(tbl_news.title LIKE '%$search_value%' OR tbl_news.des LIKE '%$search_value%' OR tbl_category.name LIKE '%$search_value%') AND tbl_news.location=1 AND tbl_news.status=1",
                "tbl_news.id DESC"
            );
            return view('search', ['search' => $search]);
        } else {
            redirect('/');
        }
    }

    //format date post
    public function get_post_date($time, $date)
    {
        return Utils::getKhmerDateFormat($time, $date);
    }

    //get contact_us
    public function contact_us()
    {
        //view
        return view('contact-us');
    }

    //get about_us
    public function about_us()
    {
        $team_list = App::get('database')->getAll_tbl('tbl_team', 'status=1', 'od DESC');
        //view
        return view('about-us', ['team_list' => $team_list]);
    }

    //get setting data
    public function getSettingData()
    {
        $setting = App::get('database')->getAll_tbl_limit('tbl_setting', 'id>0', 'id DESC', '1');
        return $setting;
    }
}
