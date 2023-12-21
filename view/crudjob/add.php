<?php

// require('../../includes/connection.php');
// $job=new Jobs();

// if(isset($_POST['submit'])){
//     $image_name= $_FILES['jobImage']['name'];
//     $image_temp= $_FILES['jobImage']['tmp_name'];
//     $image_type= $_FILES['jobImage']['type'];
//     $image_size= $_FILES['jobImage']['size'];
//     $image_error= $_FILES['jobImage']['error'];
//     $allowed = array('jpg' , 'png' , 'jif');
//     $image = explode('.' , $image_name);
//     $image_ext = strtolower(end($image));

//     if($image_error == 4){
//         echo "file is not uploaded";
//     }
//     else if($image_size){
//         if(in_array($image_ext , $allowed)){
//             $jobImage = uniqid() . $image_name;
//             move_uploaded_file($image_temp , $_SERVER['DOCUMENT_ROOT'] . '/sprint3/dashboard/img/' . $jobImage);


//             $job->addJob($_POST['title'],$_POST['discription'],$_POST['company'],$_POST['location'],$_POST['status'],$jobImage);
//             if($job){
//                 header('location:../jobs.php');
//             } 
//         }else{
//             echo "file is not valid you need this extention ('jpg' , 'png' , 'jfif')";
//         }
//     }else{
//         echo "size to file is so heigh";
//     }






// }
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
        <form action="" method="POST" enctype="multipart/form-data" id="form">
            <label for="">chose image</label>
            <input type="file" name="jobImage">

            <label for="user_name" class="label">title</label>
            <input required type="text" name="title" id="user_name" class="input-field">

            <label for="email" class="label">discription</label>
            <input type="text" name="discription" id="email" class="input-field">

            <label for="password_user" class="label">company</label>
            <input type="text" name="company" id="password_user" class="input-field">

            <label for="password_user" class="label">location</label>
            <input type="text" name="location" id="password_user" class="input-field">

            <label for="role" class="label">statut</label>
            <select name="status" id="role" class="input-field">


                <option value="open"> open </option>
                <option value="closed"> closed </option>


            </select>

            <button type="submit" name="submit" class="submit-btn">submit</button>
        </form>
    </div>
</body>

</html>