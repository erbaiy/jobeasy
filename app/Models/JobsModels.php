<?php

namespace App\Models;

class JobsModels
{
    public \mysqli $conn;

    public function __construct()
    {
        $db = new ModelConnection();
        $this->conn = $db->conn;
    }
    public function selectJobs()
    {
        $query = "SELECT * FROM jobs";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }
    public function addJob($title, $description, $company, $location, $status, $image)
    {
        $query = $this->conn->prepare("INSERT INTO jobs (title, description, company, location, status, image_path) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param("ssssss", $title, $description, $company, $location, $status, $image);

        $result = $query->execute();
        $query->close();
        return $result;
    }

    //     public function addJob($title, $description, $company, $location, $status, $image)
    // {
    //     $query = $this->conn->prepare("INSERT INTO jobs (title, description, company, location, status, image_path) VALUES (?, ?, ?, ?, ?, ?)");
    //     $query->bind_param("ssssss", $title, $description, $company, $location, $status, $image);

    //     $result = $query->execute();
    //     $query->close();
    //     return $result;
    // }




    public function delete($id)
    {
        $query = "DELETE from jobs where job_id=$id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }


    public function SelcectData()
    {
        // $x = $_GET['id'];

        // $select = "SELECT * FROM jobs WHERE job_id =$x";


        $select = "SELECT * FROM jobs";
        $rs = mysqli_query($this->conn, $select);

        return $rs;
    }
    public function update($n_tiltle, $n_discription, $n_company, $n_location, $n_status, $id)
    {
        // $x = $_GET['id'];


        $query = "UPDATE  jobs set title='$n_tiltle', description='$n_discription', company='$n_company', location='$n_location', status='$n_status' where job_id=$id";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }
    public function search($search)
    {
        $sql = "SELECT * FROM jobs WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR company LIKE '%$search%' OR location LIKE '%$search%'";

        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function offre()
    {
        $query = "SELECT * FROM `offre`INNER JOIN jobs ON offre.job_id=jobs.job_id
INNER JOIN users ON users.id=offre.user_id";
        $result = mysqli_query($this->conn, $query);
        // $row = mysqli_fetch_assoc($result);
        return $result;
    }
    //-------------aplay------------------------
    public function checkIfAlreadyApplied($userId, $jobId)
    {
        $selectQuery = "SELECT * FROM offre WHERE user_id=$userId AND job_id=$jobId";
        $result = mysqli_query($this->conn, $selectQuery);
        return mysqli_num_rows($result) > 0;
    }

    public function applyForJob($jobId, $userId)
    {
        $insertQuery = "INSERT INTO offre VALUES(null, $jobId, $userId, 'not approved')";
        mysqli_query($this->conn, $insertQuery);
    }
}
