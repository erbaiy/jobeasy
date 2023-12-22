<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">

                    <a href="#" class="nav-link text-white-50">Dashboard</a>

                </div>

                <ul class="sidebar_nav">
                    <li class="sidebar_item active" style="width: 100%;">
                        <a href="dashboard.php" class="sidebar_link"> <img src="assets/img/overview.svg" alt="icon">Overview</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="candidat.php" class="sidebar_link"> <img src="assets/img/agents.svg" alt="icon">Candidat</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="offre.php" class="sidebar_link"> <img src="assets/img/task.svg" alt="icon">Offre</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="contact.php" class="sidebar_link"><img src="assets/img/agent.svg" alt="icon">Contact</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="#" class="sidebar_link"><img src="assets/img/articles.svg" alt="icon">Articles</a>
                    </li>

                </ul>
                <div class="line"></div>
                <a href="#" class="sidebar_link"><img src="assets/img/settings.svg" alt="">Settings</a>


            </div>
        </aside>
        <div class="main">
            <nav class="navbar justify-content-space-between pe-4 ps-2">
                <button class="btn open">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar  gap-4">
                    <div class="">
                        <input type="search" class="search " placeholder="Search">
                        <img class="search_icon" src="assets/img/search.svg" alt="iconicon">
                    </div>
                    <!-- <img src="img/search.svg" alt="icon"> -->
                    <img class="notification" src="assets/img/new.svg" alt="icon">
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                                <p class="mt-auto">Notification</p><a href="#"><img src="assets/img/settingsno.svg" alt="icon"></a>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="assets/img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="assets/img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
                        </div>
                    </div>
                    <div class="inline"></div>
                    <div class="name"> Admin</div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="assets/img/photo_admin.svg" alt="icon">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <a class="dropdown-item" href="/PeoplePerTask/project/pages/index.html">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="Agents px-4">
                <table class="agent table align-middle bg-white" style="min-width: 700px;">
                    <thead>
                        <a href="index.php?route=addJob"><button type="button" class="btn btn-secondary">add </button></a>
                    </thead>
                    <thead class="bg-light">
                        <tr>
                            <th>title</th>
                            <th>description</th>
                            <th>company</th>
                            <th>location</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>


                        <?php


                        // dump($result);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                    </thead>
                    <tbody>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name"><?php echo $row['title'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?php echo $row['description'] ?></p>

                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?php echo $row['company'] ?></p>

                            </td>


                            <td class="f_position"><?php echo $row['location'] ?></td>
                            <td class="f_position"><?php echo $row['status'] ?></td>
                            <td class="">
                                <a href="index.php?route=SelcectData&id=<?php echo $row['job_id'] ?>">edit</a>
                                <a href="index.php?route=DeleteJob&id=<?php echo $row['job_id'] ?>">delete</a>
                            </td>
                        </tr>

                    <?php

                        }





                        // use App\Models\JobsModels;



                        // $selct = new JobsModels();
                        // $selct->selectJobs();
                    ?>

                    </tbody>




                </table>


            </section>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../public//assets/dashboard.js"></script>
</body>

</html>