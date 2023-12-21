<?php
// include('../../includes/connection.php');
// $update=new Jobs();
// $connection=new Connection();
// $conn=$connection->conn;





// if(isset($_GET['id'])){
//     $x=$_GET['id'];

//     $select = "SELECT * FROM jobs WHERE job_id =$x";
//     $rs = mysqli_query($conn, $select);
//     $fetch = mysqli_fetch_array($rs);
//     $title = $fetch['title'];
//     $dis=$fetch['description']; 
//     $company=$fetch['company'];
//     $location=$fetch['location'];
//     $status=$fetch['status'];
// }
// // $x=$_GET['id'];
// if(isset($_POST['submit'])){
// $update->update($_POST['title'],$_POST['discription'],$_POST['company'],$_POST['location'],$_POST['status'],$_GET['id']);
// header('location:../jobs.php');
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
        <h2>update job</h2>
        <form action="index.php?route=UpdateJob" method="POST" id="form">
            <label for="user_name" class="label">title</label>
            <input type="text" name="title" id="user_name" class="input-field" value="<?php echo  $title ?>">

            <label for="email" class="label">discription</label>
            <input type="text" name="discription" id="" class="input-field" value="<?php echo  $dis ?>">
            <input type="hidden" name="job_id" id="" class="input-field" value="<?php echo  $id ?>">
            <label for="email" class="label">company</label>
            <input type="text" name="company" id="email" class="input-field" value="<?php echo  $company ?>">
            <label for="email" class="label">location</label>
            <input type="text" name="location" id="email" class="input-field" value="<?php echo  $location ?>">



            <label for="role" class="label">status</label>
            <select name="status" id="status" class="input-field" value="<?php echo  $status ?>">

                <option value="open">open</option>
                <option value="closed">closed</option>

            </select>

            <button type="submit" name="submit" class="submit-btn">submit</button>
        </form>
    </div>
</body>

</html>