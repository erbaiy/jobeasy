<?php

namespace App\Controllers;

use App\Models\UserModel;

class UsersController
{
    public function login()
    {
        $userModel = new UserModel();

        if (isset($_POST["submit"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = $userModel->login($username, $password);

            $row = mysqli_fetch_assoc($result);
            if ($username == $row['username']) {
                $_SESSION['user_id'] = $row['id'];
                if (password_verify($password, $row['password']) && $row['role_name'] == 'admin') {
                    header('location:dashboard/offre.php');
                } elseif (password_verify($password, $row['password']) && $row['role_name'] == 'candidat') {
                    header('location: index.php');
                }
            } else {
                echo
                "<script>alert('ivalid! invalid username');</script>";

                // echo 'error';
                exit();
            }
        }
        require('../view/login.php');
    }
}
