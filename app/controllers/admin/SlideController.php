<?php

class SlideController
{

    public function slide()
    {
        //get slide data into tbl
        $slide_data = App::get('database')->getAll_tbl_multi('tbl_slide.*,tbl_category.id,tbl_category.name', 'tbl_slide INNER JOIN tbl_category', 'tbl_slide.cate_id = tbl_category.id', 'tbl_slide.id DESC');
        return view_admin('slide', ['slide_data' => $slide_data]);
    }
    public function get_add_slide()
    {
        //get slide autoid and form add
        $slide_data = App::get('database')->getAll_tbl_limit('tbl_slide', 'id>0', 'id DESC', '1');
        return view_admin('add-slide', ['slide_data' => $slide_data]);
    }
    public function add_slide_data()
    {
        $query = "insert into tbl_slide (title,img,od,cate_id,status) values
        (?,?,?,?,?)";

        $insert = App::get('connection')->prepare($query);
        $input = $_POST;

        if ($input['txt-cate'] == 0) {
            return redirect('/admin/add-slide');
        } else {
            $insert->execute([
                $input['txt-title'],
                $input['txt-photo'],
                $input['txt-od'],
                $input['txt-cate'],
                $input['txt-status']
            ]);
            return redirect('/admin/slide');
        }
    }
    public function get_edit_slide()
    {
        //get slide form edit
        $id = $_GET['id'];
        $slide_data = App::get('database')->getAll_tbl('tbl_slide', 'id=' . $id . '', 'id DESC');
        if(empty($news_data)){
            die('There is no id "'.$id.'" in slide data');
        }
        return view_admin('edit-slide', ['slide_data' => $slide_data]);
    }
    public function update_slide()
    {
        //update slide data
        $id = $_GET['id'];
        $title = $_POST['title'];
        $photo = $_POST['photo'];
        $od = $_POST['od'];
        $cate_id = $_POST['cate_id'];
        $status = $_POST['status'];

        $query = "update tbl_slide set title = ?, img = ?, od = ?, cate_id = ?,status = ? where id = ?";

        $update = App::get('connection')->prepare($query);

        $update->execute([
            $title,
            $photo,
            $od,
            $cate_id,
            $status,
            $id
        ]);
        echo json_encode(['message' => 'updated_success']);
    }
    public function delete_slide()
    {
        //delete slide data
        $query = "delete  from tbl_slide where id = :id";

        $delete = App::get('connection')->prepare($query);

        $delete->execute(['id' => $_GET['id']]);

        echo json_encode(['message' => 'success']);
    }
    public function upl_img_slide()
    {
        $folderPath = "public/img/upload/slide/";
        return Utils::uploadImage($folderPath, $_FILES);
    }
}
