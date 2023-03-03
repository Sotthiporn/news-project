<?php

class SettingController
{

    public function setting()
    {
        //get advertise data into tbl
        $setting_data = App::get('database')->getAll_tbl_limit('tbl_setting', 'id>0', 'id DESC', '1');
        return view_admin('setting', ['setting_data' => $setting_data]);
    }
    public function update_setting()
    {
        //update setting data
        $id = $_POST['id'];
        $website_name = $_POST['website_name'];
        $website_phone = $_POST['website_phone'];
        $website_email = $_POST['website_email'];
        $website_address = $_POST['website_address'];
        $website_description = $_POST['website_description'];
        $website_logo = $_POST['website_logo'];
        if ($id == null) {
            $query = "insert into tbl_setting (website_name,website_phone,website_email,website_address,website_description,website_logo) values (?,?,?,?,?,?)";
        } else {
            $query = "update tbl_setting set website_name = ?, website_phone = ?, website_email = ?, website_address = ?,website_description = ?,website_logo = ? where id = $id";
        }

        $update = App::get('connection')->prepare($query);

        $update->execute([
            $website_name,
            $website_phone,
            $website_email,
            $website_address,
            $website_description,
            $website_logo
        ]);
        echo json_encode(['message' => 'updated_success']);
    }

    public function upl_img_setting()
    {
        $folderPath = "public/img/upload/setting/";
        return Utils::uploadImage($folderPath, $_FILES);
    }
}
