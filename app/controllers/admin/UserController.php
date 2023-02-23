<?php

class UserController
{

    public function index()
    {
        //get user data into tbl
        $user_data = App::get('database')->getAll_tbl('tbl_user', 'id>0', 'id DESC');
        return view_admin('user', ['user_data' => $user_data]);
    }
    public function get_add_user()
    {
        //get user auto id and form add
        $user_data = App::get('database')->getAll_tbl_limit('tbl_user', 'id>0', 'od DESC', '1');
        return view_admin('add-user', ['user_data' => $user_data]);
    }
    public function add_user_data()
    {
        $query = "insert into tbl_user (fullname,username,password,status) values (?,?,?,?)";

        $insert = App::get('connection')->prepare($query);

        $input = $_POST;

        $password = password_hash($input['txt-password'], PASSWORD_DEFAULT);
        $insert->execute([
            $input['txt-fullname'],
            $input['txt-username'],
            $password,
            $input['txt-status']
        ]);

        return redirect('/admin/user');
    }
    public function get_edit_user()
    {
        //get user form edit
        $id = $_GET['id'];
        $user_data = App::get('database')->getAll_tbl('tbl_user', 'id=' . $id . '', 'id DESC');

        if (empty($user_data)) {
            die('There is no id "' . $id . '" in user data');
        }

        return view_admin('edit-user', ['user_data' => $user_data]);
    }
    public function update_user()
    {
        //update user data
        $id = $_GET['id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $status = $_POST['status'];

        $password = $_POST['old_password'];
        if(!empty($_POST['password'])){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        $query = "update tbl_user set fullname = ?, username = ?, password = ?, status = ? where id = ?";

        $update = App::get('connection')->prepare($query);

        $update->execute([
            $fullname,
            $username,
            $password,
            $status,
            $id
        ]);
        echo json_encode(['message' => 'updated_success']);
    }
    public function delete_user()
    {
        //delete user data
        $query = "delete  from tbl_user where id = :id";

        $delete = App::get('connection')->prepare($query);

        $delete->execute(['id' => $_GET['id']]);

        echo json_encode(['message' => 'success']);
    }
}
