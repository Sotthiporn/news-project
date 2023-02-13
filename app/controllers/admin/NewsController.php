<?php

class NewsController
{

    public function news()
    {
        //get news data into tbl
        $news_data = App::get('database')->getAll_tbl_multi('tbl_news.*,tbl_category.id,tbl_category.name', 'tbl_news INNER JOIN tbl_category', 'tbl_news.cate_id = tbl_category.id', 'tbl_news.id DESC');
        return view_admin('news', ['news_data' => $news_data]);
    }
    public function get_add_news()
    {
        //get news autoid and form add
        $news_data = App::get('database')->getAll_tbl('tbl_news', 'id>0', 'id');
        return view_admin('add-news', ['news_data' => $news_data]);
    }
    public function add_news_data()
    {
        $query = "insert into tbl_news (date_post,title,name_link,des,img,od,location,cate_id,status) values
        (?,?,?,?,?,?,?,?,?)";
        $query2 = "insert into tbl_slide (title,img,od,cate_id,news_id,status) values
        (?,?,?,?,?,?)";

        $insert = App::get('connection')->prepare($query);
        $insert2 = App::get('connection')->prepare($query2);

        $input = $_POST;
        $des = trim($input['txt-des']);

        date_default_timezone_set("Asia/Phnom_Penh");
        $date = date("Y/m/d") . " " . date("h:i:s");

        $name_link = $input['txt-title'];
        $connect_string = trim($name_link);
        $connect_string = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $name_link);

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
            $insert2->execute([
                $input['txt-title'],
                $input['txt-photo'],
                $input['txt-od'],
                $input['txt-cate'],
                $input['txt-id'],
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
        return view_admin('edit-news', ['news_data' => $news_data]);
    }
    public function update_news()
    {
        //update news data
        $id = $_GET['id'];

        $query = "update tbl_news set title = ?, name_link = ?, des = ?, img = ?, od = ?, location = ?, cate_id = ?,status = ? where id = ?";

        $update = App::get('connection')->prepare($query);

        $input = $_POST;
        $des = trim($input['txt-des']);
        $name_link = $input['txt-title'];
        $connect_string = trim($name_link);
        $connect_string = preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u", "-", $name_link);

        $update->execute([
            $input['txt-title'],
            $connect_string,
            $des,
            $input['txt-photo'],
            $input['txt-od'],
            $input['txt-location'],
            $input['txt-cate'],
            $input['txt-status'],
            $id
        ]);
        return redirect('/admin/news');
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
        $file = $_FILES['txt-file']['tmp_name'];
        $sourceProperties = getimagesize($file);
        $fileNewName = time();
        $folderPath = "public/img/upload/news/";
        $ext = pathinfo($_FILES['txt-file']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];
        $filesize = filesize($file);
        $dst_w = 760;
        $dst_h = '';
        if ($filesize <= (500 * 1024)) {
            move_uploaded_file($file, $folderPath . $fileNewName . "." . $ext);
            $res['imgName'] = $fileNewName . "." . $ext;
            echo json_encode($res);
            return;
        }
        switch ($imageType) {
            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file);
                $targetLayer = Utils::imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $dst_w, $dst_h);
                imagepng($targetLayer, $folderPath . $fileNewName . "." . $ext);
                break;

            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file);
                $targetLayer = Utils::imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $dst_w, $dst_h);
                imagegif($targetLayer, $folderPath . $fileNewName . "." . $ext);
                break;
            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file);
                $targetLayer = Utils::imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $dst_w, $dst_h);
                imagejpeg($targetLayer, $folderPath . $fileNewName . "." . $ext);
                break;
            default:
                echo "Invalid Image type.";
                exit;
                break;
        }
        $res['imgName'] = $fileNewName . "." . $ext;
        echo json_encode($res);
    }
}

?>