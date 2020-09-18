<?php

class HomeController{

    //get home
    public function index(){
        //view
        return view('home'); 
    }
    public function news_home($cate_id){
        //data
        $news_home = App::get('database')->getAll_tbl_limit('tbl_news','status=1 && location=1 && cate_id='.$cate_id.'','od DESC','0,6');
        return $news_home; 
    }
    
    //get category
    public function category(){
        $cate = App::get('database')->getAll_tbl('tbl_category','status=1','od DESC');
        return $cate;   
    }

    //get news list & detail
    public function news_list(){
        $cate_id = $_GET['cate'];
        $news_list = App::get('database')->getAll_tbl_limit('tbl_news','status=1 && location=1 && cate_id='.$cate_id.'','od DESC','0,1000');
        return view('news-list', ['news-list' => $news_list]);   
    }
    public function news_list2(){
        $cate_id = $_GET['cate'];
        $news_list2 = App::get('database')->getAll_tbl_limit('tbl_news','status=1 && location=2 && cate_id='.$cate_id.'','od DESC','0,10');
        return $news_list2;   
    }
    public function news_detail(){
        $id = $_GET['id'];
        $news = App::get('database')->getAll_tbl('tbl_news','status=1 && id='.$id.'','od DESC');
        return view('news-detail', ['news-detail' => $news]);    
    }

    //get ads
    public function adsHome(){
        //get advertise data into HomePage
        $ads_data = App::get('database')->getAll_tbl_limit('tbl_ads','location=1 && type="Photo"','id DESC','0,1');
        return $ads_data;   
    }
    public function adsHome2(){
        //get advertise data into HomePage
        $ads_data = App::get('database')->getAll_tbl_limit('tbl_ads','location=2','id DESC','0,2');
        return $ads_data;   
    }
    public function adsHome3(){
        //get advertise data into HomePage
        $ads_data = App::get('database')->getAll_tbl_limit('tbl_ads','location=3','id DESC','0,100');
        return $ads_data;   
    }

    //get slide
    public function slideHome(){
        //get slide data into HomePage
        $slide_data = App::get('database')->getAll_tbl_multi('tbl_slide.*,tbl_category.id,tbl_category.name','tbl_slide INNER JOIN tbl_category','tbl_slide.cate_id = tbl_category.id','tbl_slide.id DESC LIMIT 0,1');
        return $slide_data;   
    }
    public function slideHome2(){
        //get slide data into HomePage
        $slide_data = App::get('database')->getAll_tbl_multi('tbl_slide.*,tbl_category.id,tbl_category.name','tbl_slide INNER JOIN tbl_category','tbl_slide.cate_id = tbl_category.id','tbl_slide.id DESC LIMIT 1,1');
        return $slide_data;   
    }
    public function slideHome3(){
        //get slide data into HomePage
        $slide_data = App::get('database')->getAll_tbl_multi('tbl_slide.*,tbl_category.id,tbl_category.name','tbl_slide INNER JOIN tbl_category','tbl_slide.cate_id = tbl_category.id','tbl_slide.id DESC LIMIT 2,1');
        return $slide_data;   
    }
    public function slideHome4(){
        //get slide data into HomePage
        $slide_data = App::get('database')->getAll_tbl_multi('tbl_slide.*,tbl_category.id,tbl_category.name','tbl_slide INNER JOIN tbl_category','tbl_slide.cate_id = tbl_category.id','tbl_slide.id DESC LIMIT 3,1');
        return $slide_data;   
    }

    //search
    public function search_news(){
        $search_value = $_GET['search'];
        if(isset($_GET['btnSearch'])){
            $search = App::get('database')->getAll_tbl_multi("tbl_news.*,tbl_category.id,tbl_category.name",
            "tbl_news INNER JOIN tbl_category ON tbl_news.cate_id = tbl_category.id",
            "tbl_news.title LIKE '$search_value' OR tbl_news.title LIKE '%$search_value' OR tbl_news.title LIKE '$search_value%' OR tbl_news.title LIKE '%$search_value%' OR tbl_news.des LIKE '$search_value' OR tbl_news.des LIKE '%$search_value' OR tbl_news.des LIKE '$search_value%' OR '$search_value%' OR tbl_news.des LIKE '%$search_value%' OR tbl_category.name LIKE '$search_value' OR tbl_category.name LIKE '%$search_value' OR tbl_category.name LIKE '$search_value%' OR '$search_value%' OR tbl_category.name LIKE '%$search_value%' AND location=1",
            "tbl_news.id DESC");
            return view('search', ['search' => $search]);    
        }else{
            header('Location: /');
        }
    }

    //format date post
    public function get_post_date($time,$date){
        $previousTimeStamp = strtotime($time." ".$date);
        $lastTimeStamp = strtotime(date("Y-m-d h:i:sa"));
        $menos=$lastTimeStamp-$previousTimeStamp;
        $mins=$menos/60;
        if($mins<1){
        $showing= "ថ្ងៃនេះ ម៉ោង ".$time;
        }
        else{
        $minsfinal=floor($mins);
        $secondsfinal=$menos-($minsfinal*60);
        $hours=$minsfinal/60;
        if($hours<1){
        $showing= $minsfinal . " នាទីមុន";
        }
        else{
        $hoursfinal=floor($hours);
        $minssuperfinal=$minsfinal-($hoursfinal*60);
        $days=$hoursfinal/24;
        if($days<1){
        $showing= $hoursfinal . " ម៉ោងមុន";
        }
        else if($days<2)
        {
        $showing=" ម្សិលមិញ ម៉ោង ".$time;
        }
        else{
        $d=date("d",strtotime($date));
        $m=date("m",strtotime($date));
        $y=date("Y",strtotime($date));
        if($m==1)
        {
          $m='មករា';
        }
        else if($m==2)
        {
          $m='កុម្ភៈ';      
        }
        else if($m==3)
        {
          $m='មីនា';      
        }
        else if($m==4)
        {
          $m='មេសា';      
        }
        else if($m==5)
        {
        $m='ឧសភា';      
        }
        else if($m==6)
        {
        $m='មិថុនា';      
        }
        else if($m==7)
        {
        $m='កក្តដា';      
        }
        else if($m==8)
        {
        $m='សីហា';      
        }
        else if($m==9)
        {
        $m='កញ្ញា';      
        }
        else if($m==10)
        {
        $m='តុលា';    
        }
        else if($m==11)
        {
        $m='វិច្ឆិកា';      
        }
        else if($m==12)
        {
        $m='ធ្នូ';      
        }
  
        $showing=$d."-".$m."-".$y ." - ម៉ោង ". $time;
        }}}
        echo $showing;  
    }
}