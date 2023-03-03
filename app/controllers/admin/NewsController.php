<?php

class NewsController
{

    public function news()
    {
        //get news data into tbl
        $news_data = App::get('database')->getAll_tbl_multi('tbl_news.*,tbl_category.name as category_name', 'tbl_news INNER JOIN tbl_category', 'tbl_news.cate_id = tbl_category.id', 'tbl_news.id DESC');
        return view_admin('news', ['news_data' => $news_data]);
    }
    public function get_add_news()
    {
        //get news autoid and form add
        $news_data = App::get('database')->getAll_tbl_limit('tbl_news', 'id>0', 'od DESC', '1');
        return view_admin('add-news', ['news_data' => $news_data]);
    }
    public function add_news_data()
    {
        $query = "insert into tbl_news (date_post,title,name_link,des,img,od,location,cate_id,status) values
        (?,?,?,?,?,?,?,?,?)";

        $insert = App::get('connection')->prepare($query);

        $input = $_POST;
        $des = trim($input['txt-des']);

        $date = Utils::getDateTimeNow();

        $name_link = $input['txt-title'];
        $connect_string = Utils::characterConcatDash($name_link);

        if ($input['txt-cate'] == 0) {
            return redirect('/admin/add-news');
        } else {
            $insert->execute([
                $date,
                $input['txt-title'],
                $connect_string,
                $des,
                $input['txt-photo'],
                $input['txt-od'],
                $input['txt-location'],
                $input['txt-cate'],
                $input['txt-status']
            ]);
            return redirect('/admin/news');
        }
    }
    public function get_edit_news()
    {
        //get news form edit
        $id = $_GET['id'];
        $news_data = App::get('database')->getAll_tbl('tbl_news', 'id=' . $id . '', 'id DESC');
        if(empty($news_data)){
            die('There is no id "'.$id.'" in news data');
        }

        return view_admin('edit-news', ['news_data' => $news_data]);
    }
    public function update_news()
    {
        //update news data
        $id = $_POST['id'];

        $query = "update tbl_news set title = ?, name_link = ?, des = ?, img = ?, od = ?, location = ?, cate_id = ?,status = ? where id = ?";

        $update = App::get('connection')->prepare($query);

        $input = $_POST;
        $des = trim($input['des']);
        $name_link = $input['title'];
        $connect_string = Utils::characterConcatDash($name_link);

        $update->execute([
            $input['title'],
            $connect_string,
            $des,
            $input['photo'],
            $input['od'],
            $input['location'],
            $input['cate'],
            $input['status'],
            $id
        ]);
        echo json_encode(['message' => 'updated_success']);
    }
    public function delete_news()
    {
        //delete news data
        $query = "delete from tbl_news where id = :id";

        $delete = App::get('connection')->prepare($query);

        $delete->execute(['id' => $_GET['id']]);

        echo json_encode(['message' => 'success']);
    }
    public function upl_img_news()
    {
        $folderPath = "public/img/upload/news/";
        return Utils::uploadImage($folderPath, $_FILES);
    }

    public function get_news_on_form(){
        //get news id & name into option news on form
       $cate_data = App::get('database')->getAll_tbl('tbl_news','status=1','id desc');
       return $cate_data;
   }
}
