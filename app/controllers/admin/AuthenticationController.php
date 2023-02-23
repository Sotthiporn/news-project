<?php
session_start();
class AuthenticationController {

    public function loginPage(){
        // $_SESSION["is_login"] = true;
        redirect('/admin/category');
    }

    public function doLogin(){
        // $_SESSION["is_login"] = true;
        redirect('/admin/category');
    }

    public function logout(){
        session_destroy();
        redirect('/admin');
    }
}

?>