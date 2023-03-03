<?php

class TeamController {

    public function team()
    {
        //get advertise data into tbl
        $team_data = App::get('database')->getAll_tbl('tbl_team', 'id>0', 'id DESC');
        return view_admin('team', ['team_data' => $team_data]);
    }
    public function get_add_team()
    {
        //get team autoid and form add
        $team_data = App::get('database')->getAll_tbl_limit('tbl_team', 'id>0', 'id DESC', '1');
        return view_admin('add-team', ['team_data' => $team_data]);
    }
    public function add_team_data()
    {
        $query = "insert into tbl_team (name,img,od,status) values (?,?,?,?)";

        $insert = App::get('connection')->prepare($query);

        if ($_POST['txt-name'] == '') {
            return redirect('/admin/add-team');
        } else {
            $insert->execute([
                $_POST['txt-name'],
                $_POST['txt-photo'],
                $_POST['txt-od'],
                $_POST['txt-status']
            ]);
            return redirect('/admin/team');
        }
    }
    public function get_edit_team()
    {
        //get team form edit
        $id = $_GET['id'];
        $team_data = App::get('database')->getAll_tbl('tbl_team', 'id=' . $id . '', 'id DESC');
        if (empty($team_data)) {
            die('There is no id "' . $id . '" in team data');
        }
        return view_admin('edit-team', ['team_data' => $team_data]);
    }
    public function update_team()
    {
        //update team data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $photo = $_POST['photo'];
        $od = $_POST['od'];
        $status = $_POST['status'];

        $query = "update tbl_team set name = ?, img = ?, od = ?,status = ? where id = ?";

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
    public function delete_team()
    {
        //delete team data
        $query = "delete  from tbl_team where id = :id";

        $delete = App::get('connection')->prepare($query);

        $delete->execute(['id' => $_GET['id']]);

        echo json_encode(['message' => 'success']);
    }
    public function upl_img_team()
    {
        $folderPath = "public/img/upload/team/";
        return Utils::uploadImage($folderPath, $_FILES);
    }
}

?>