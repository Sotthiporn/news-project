<?php
class AuthenticationController
{

    public function loginPage()
    {
        session_start();
        if (isset($_SESSION['is_login']) && $_SESSION["is_login"] = true) {
            return redirect('/admin/user');
        } else {
            return view_admin('login', []);
        }
    }

    public function doLogin()
    {
        session_start();
        $username = $_POST['txt-username'];
        $password = $_POST['txt-password'];
        $user_data = App::get('database')->getAll_tbl_limit('tbl_user', 'username = "'.$username.'" and status = 1', 'id DESC', '1');
        if (!empty($user_data)) {
            if (password_verify($password, $user_data[0]->password)) {
                $_SESSION["is_login"] = true;
                return redirect('/admin/user');
            } else {
                $_SESSION['error_message_login'] = "The password is incorrect!";
                return redirect('/admin');
            }
        } else {
            $_SESSION['error_message_login'] = "The username does not exist!";
            return redirect('/admin');
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION["is_login"]);
        session_destroy();
        return redirect('/admin');
    }
}
