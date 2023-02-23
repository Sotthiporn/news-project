<?php
class AuthenticationController {

    public function loginPage(){
        if (isset($_SESSION['is_login'])) {
            return view_admin('category', []);
        }else {
            return view_admin('login', []);
        }
    }

    public function doLogin(){
        $_SESSION["is_login"] = true;
        redirect('/admin/category');
    }

    public function logout(){
        redirect('/admin');
    }
}
