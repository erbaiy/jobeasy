<?php 



// $dbName = "sprint3";
// $dbHost = "localhost";
// $dbUser = "root";
// $dbPass = "";
// $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
// if (!$conn) {
//     die("Something went wrong");
    
// }

class Connection
{
    
    public $conn;

    public function __construct()
    {
      $this->conn=mysqli_connect('localhost','root','','sprint3');
    //    print_r($this->conn);
    }
   
}
class Register extends  Connection
{ 

  public function registration($username,$email,$password)
  {
    
      
      $query="INSERT into `users`(username,email,password,role_name)values('$username','$email','$password','candidat')";
      $result=mysqli_query( $this->conn,$query);
      print_r($result);
      echo $query;
      return $result;
     
}

}

class Login extends Connection
{
  public function login($username,$password)
{



  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($this->conn, $query);
  $row = mysqli_fetch_assoc($result);

 if($username==$row['username'])
 { 
  if(password_verify($password, $row['password'])){
    header('location:dashboard/offre.php');
    exit(); 
  }
}else{
  echo 
  "<script>alert('ivalid! invalid username');</script>";
  exit(); 
}
return $result;
}


}
class Users extends Connection
{
  public function selectUsers(){
    $query = "SELECT * FROM users";
$result = mysqli_query($this->conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr class="freelancer">
        <td>
            <div class="d-flex align-items-center">
                <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle"
                    alt="" style="width: 45px; height: 45px" />
                <div class="ms-3">
                    <p class="fw-bold mb-1 f_name"><?php echo $row["username"]?></p>
                </div>
            </div>
        </td>
        <td>
            <p class="fw-normal mb-1 f_title"><?php echo $row["email"]?></p>
        </td>
        <td>
            <span class="f_status"><?php echo $row["password"]?></span>
        </td>
        <td>
            <img class="delet_user" src="img/user-x.svg" alt="">
            <img class="ms-2 edit" src="img/edit.svg" alt="">
        </td>
    </tr>
    <?php
}

  }
}
class Jobs extends Connection{
  public function selectJobs(){
    
$query="SELECT * FROM  jobs";
$result=mysqli_query($this->conn,$query);

while($row=mysqli_fetch_assoc($result)){
    ?>

                    </thead>
                    <tbody>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name"><?php echo $row['title']?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?php echo $row['description']?></p>

                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?php echo $row['company']?></p>

                            </td>

                            
                            <td class="f_position"><?php echo $row['location']?></td>
                            <td class="f_position"><?php echo $row['status']?></td>
                            <td class="">
                              <a href="../dashboard/crudjob/update.php?id=<?php echo $row['job_id']?>">edit</a>
                              <a href="../dashboard/crudjob/delete.php?id=<?php echo $row['job_id']?>">delete</a>
                            </td>
                        </tr>

                        <?php

}
}
public function addJob($title, $description, $company, $location, $status) {
  $query = "INSERT INTO jobs (title, description, company, location, status) VALUES ('$title', '$description', '$company', '$location', '$status')";    

  $result = mysqli_query($this->conn, $query);
}


  public function delete($id){
    $query="DELETE from jobs where job_id=$id";
    $result=mysqli_query($this->conn,$query);

   

  }
  public function update($n_tiltle,$n_discription,$n_company,$n_location,$n_status,$id){
    $query="UPDATE  jobs set title='$n_tiltle', description='$n_discription', company='$n_company', location='$n_location', status='$n_status'  where job_id=$id";
    $result=mysqli_query($this->conn,$query);
    
    echo $query;

  }
   


 
}


  




  
  



// $duplicate=mysqli_query($this->username,$this->fullname,$this->email,$this->password,$this->confirmpassword)