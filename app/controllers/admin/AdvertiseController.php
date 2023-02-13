<?php

class AdvertiseController {

    public function ads()
    {
        //get advertise data into tbl
        $ads_data = App::get('database')->getAll_tbl('tbl_ads', 'id>0', 'id DESC');
        return view_admin('ads', ['ads_data' => $ads_data]);
    }
    public function get_add_ads()
    {
        //get advertise autoid and form add
        $ads_data = App::get('database')->getAll_tbl('tbl_ads', 'id>0', 'id');
        return view_admin('add-ads', ['ads_data' => $ads_data]);
    }
    public function add_ads_data()
    {
        $query = "insert into tbl_ads (url,img,location,type,status) values
        (?,?,?,?,?)";

        $insert = App::get('connection')->prepare($query);

        $input = $_POST;
        // var_dump($input);
        $insert->execute([
            $input['txt-url'],
            $input['txt-photo'],
            $input['txt-location'],
            $input['txt-type'],
            $input['txt-status']
        ]);

        return redirect('/admin/ads');
    }
    public function get_edit_ads()
    {
        //get advertise form edit
        $id = $_GET['id'];
        $ads_data = App::get('database')->getAll_tbl('tbl_ads', 'id=' . $id . '', 'id DESC');
        if(empty($ads_data)){
            die('There is no id "'.$id.'" in advertise data');
        }

        return view_admin('edit-ads', ['ads_data' => $ads_data]);
    }
    public function update_ads()
    {
        //update advertise data
        $id = $_GET['id'];
        $url = $_POST['url'];
        $photo = $_POST['photo'];
        $location = $_POST['location'];
        $type = $_POST['type'];
        $status = $_POST['status'];

        $query = "update tbl_ads set url = ?, img = ?, location = ?, type = ?,status = ? where id = ?";

        $update = App::get('connection')->prepare($query);

        $update->execute([
            $url,
            $photo,
            $location,
            $type,
            $status,
            $id
        ]);
        echo json_encode(['message' => 'updated_success']);
    }
    public function delete_ads()
    {
        //delete advertise data
        $query = "delete  from tbl_ads where id = :id";

        $delete = App::get('connection')->prepare($query);

        $delete->execute(['id' => $_GET['id']]);

        echo json_encode(['message' => 'success']);
    }
    public function upl_img_ads()
    {
        $folderPath = "public/img/upload/ads/";
        return Utils::uploadImage($folderPath, $_FILES);
    }
}

?>