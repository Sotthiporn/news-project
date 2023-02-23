<?php
class AuthenticationController {

    public function loginPage(){
        session_start();
        if (isset($_SESSION['is_login']) && $_SESSION["is_login"] = true) {
            return redirect('/admin/category');
        }else {
            return view_admin('login', []);
        }
    }

    public function doLogin(){
        // if(password_verify($password, $hashed_password)) {
        // }
        
        session_start();
        $_SESSION["is_login"] = true;
        return redirect('/admin/category');
    }

    public function logout(){
        session_start();
        unset($_SESSION["is_login"]);
        session_destroy();
        return redirect('/admin');
    }
}
