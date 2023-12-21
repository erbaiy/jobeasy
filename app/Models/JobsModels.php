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
        $x = $_GET['id'];

        $select = "SELECT * FROM jobs WHERE job_id =$x";
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
        // $sql = "SELECT * FROM jobs WHERE title  LIKE '%".$search."%'";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
?>
                <article class="postcard light yellow">
                    <a class="postcard__img_link" href="#">
                        <img class="postcard__img" src="dashboard/img/<?php echo $row['image_path'] ?>" alt="Image Title" />
                    </a>
                    <div class="postcard__text t-dark">
                        <h3 class="postcard__title yellow"><a href="#"><?php echo $row['title'] ?></a></h3>
                        <div class="postcard__subtitle small">
                            <time datetime="2020-05-25 12:00:00">
                                <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2023
                            </time>
                        </div>
                        <div class="postcard__bar"></div>
                        <div class="postcard__preview-txt"><?php echo $row['description'] ?></div>

                        <ul class="postcard__tagbox">
                            <li class="tag__item"><i class="fas fa-tag mr-2"></i>France</li>
                            <li class="tag__item"><i class="fas fa-clock mr-2"></i> 3 mins.</li>
                            <li class="tag__item play yellow">
                                <form action="dashboard/apllay.php" method="POST">
                                    <input type="hidden" name="jobid" value="<?php echo $row['job_id'] ?>">
                                    <button type='submit' name="submit"><i class="fas fa-play mr-2"></i>APPLY NOW</button>
                                </form>

                            </li>
                        </ul>

                    </div>
                </article>
<?php
            }
        } else {
            echo "No matching records found";
        }
    }
}
