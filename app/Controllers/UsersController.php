<?php

namespace App\Controllers;

use App\Models\UserModel;

class UsersController
{
    public function loginURL()
    {
        require('../view/login.php');
    }
    public function login()
    {

        $userModel = new UserModel();

        if (isset($_POST["submit"])) {
            // dump($_POST["submit"]);

            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = $userModel->login($username, $password);

            $row = mysqli_fetch_assoc($result);

            // dump($row['password']);
            if (password_verify($password, $row['password']) & $username == $row['username']) {
                // dump(password_verify($password, $row['password']));
                $_SESSION['user_id'] = $row['id'];
                if (password_verify($password, $row['password']) && $row['role_name'] == 'admin') {
                    header('location:index.php?route=selectJobs');
                } elseif (password_verify($password, $row['password']) && $row['role_name'] == 'candidat') {
                    // dump("testt rout");
                    header('location:index.php?route=home');

                    echo 'welcome';
                }
            } else {
                // echo
                // "<script>alert('ivalid! invalid username');</script>";

                echo 'error';
                exit();
            }
        }
        // require('../view/login.php');
    }
    public function register()
    {
        $register = new UserModel();


        if (isset($_POST['submit'])) {

            $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $result = $register->registration($_POST['username'], $_POST["email"], $password_hash);
            print_r($result);
        }
        require('../view/register.php');
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?route=home');
        exit();
    }
}
