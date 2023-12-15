<?php
// include('../../connect.php');


 
// if (isset($_POST['submit'])) {
//     // Retrieve form data
//     $user_name = htmlspecialchars(trim($_POST['user_name'])) ;
//     $email =htmlspecialchars(trim($_POST['email']));
//     $password_user = htmlspecialchars(trim($_POST['password_user']));
//     $hashpwd=password_hash($password_user,PASSWORD_DEFAULT);
//     $role = $_POST['role'];


//     // $valid_email=filter_var($email,FILTER_VALIDATE_EMAIL);
    
    
//     // Insert data into the personne table
//     $query = "INSERT INTO personne (user_name, email, password_user) VALUES ('$user_name', '$email', '$hashpwd')";
   
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         echo 'Invalid email address.';
//     }else{
        
//         $result = mysqli_query($conn, $query);
        
//         // Execute the query
        
//         // Check if the query executed successfully
//         if ($result) {
            
            
            
//             // Get the last inserted user_id
//             $user_id = mysqli_insert_id($conn);
            
//             // Insert data into the autority_user table
//             $rol_insert = "INSERT INTO autority_user (role_name, user_id) VALUES ('$role', $user_id)";
//             $rol_result = mysqli_query($conn, $rol_insert);
            
            
//         // Check if the query executed successfully
//         if ($rol_result) {
//         header('location:index.php');
//         } else {
//             echo 'invalid';
//         }
//     } else {
//         echo 'invalid';
//     }
// }
// }
require('../../includes/connection.php');
$job=new Jobs();

if(isset($_POST['submit'])){
    $job->addJob($_POST['title'],$_POST['discription'],$_POST['company'],$_POST['location'],$_POST['status']);
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .input-field {
            display: block;
            margin-top: 13px;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .input-field:focus {
            border-color: #6e81e2;
            outline: none;
        }
        
        .label {
            font-weight: bold;
        }
        
        .submit-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6e81e2;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .submit-btn:hover {
            background-color: #5266c9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add job</h2>
        <form action="" method="POST" id="form">
            <label for="user_name" class="label">title</label>
            <input required type="text" name="title" id="user_name" class="input-field" >
            
            <label for="email" class="label">discription</label>
            <input type="text" name="discription" id="email" class="input-field">
            
            <label for="password_user" class="label">company</label>
            <input type="text" name="company" id="password_user" class="input-field" >
            
            <label for="password_user" class="label">location</label>
            <input type="text" name="location" id="password_user" class="input-field" >
            
            <label for="role" class="label">statut</label>
            <select name="status" id="role" class="input-field" >

                    
                    <option value="open"> open </option>
                    <option value="closed"> closed </option>
                   
                
            </select>
            
            <button type="submit" name="submit" class="submit-btn">submit</button>
        </form>
    </div>
</body>
</html>