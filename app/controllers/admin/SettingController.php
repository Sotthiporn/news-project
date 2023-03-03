<?php

class SettingController {

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
        $name = $_POST['name'];
        $photo = $_POST['photo'];
        $od = $_POST['od'];
        $status = $_POST['status'];

        $query = "update tbl_setting set website_name = ?, website_logo = ? where id = ?";

        $update = App::get('connection')->prepare($query);

        $update->execute([
            $name,
            $photo,
            $od,
            $status,
            $id
        ]);
        echo json_encode(['message' => 'updated_success']);
    }
}

?>