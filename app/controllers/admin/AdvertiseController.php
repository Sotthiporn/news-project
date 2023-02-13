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
        $file = $_FILES['txt-file']['tmp_name'];
        $sourceProperties = getimagesize($file);
        $fileNewName = time();
        $folderPath = "public/img/upload/ads/";
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
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $dst_w, $dst_h);
                imagepng($targetLayer, $folderPath . $fileNewName . "." . $ext);
                break;

            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $dst_w, $dst_h);
                imagegif($targetLayer, $folderPath . $fileNewName . "." . $ext);
                break;
            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1], $dst_w, $dst_h);
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