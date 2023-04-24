<?php

// This code includes the 'connect.php' file.
    include("connect.php");

//  retrieves information from a database
    $user_id = $_GET["id"];
    $query = "  SELECT * FROM junction_table 
                JOIN children  ON children.children_id = junction_table.child_id 
                JOIN materials  ON materials.id = junction_table.mateirials_id 
                JOIN teachers  ON teachers.id = junction_table.teachers_id 
                JOIN grades  ON grades.grade_id	 = junction_table.grades_id	
                WHERE children.children_id = $user_id ";


// Database query fetches and assigns student information to variables.
    $resu = $database->query($query);
    $row = $resu->fetchAll();
    $Student_Name = $row[0]["name"] ;
    $Student_Description = $row[0]["Description"] ;
    $Student_phone = $row[0]["phone"] ;
    $teachers_name = $row[0]["teachers_name"] ;
    $email = $row[0]["email"] ;
    $address = $row[0]["address"] ;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
        <style>
            body {
                color: #6f8ba4;
                margin-top: 20px;
            }
            .section {
                padding: 100px 0;
                position: relative;
            }
            .gray-bg {
                background-color: #f5f5f5;
            }
            img {
                max-width: 100%;
            }
            img {
                vertical-align: middle;
                border-style: none;
            }
            /* About Me 
            ---------------------*/
            .about-text h3 {
                font-size: 45px;
                font-weight: 700;
                margin: 0 0 6px;
            }
            @media (max-width: 767px) {
                .about-text h3 {
                    font-size: 35px;
                }
            }
            .about-text h6 {
                font-weight: 600;
                margin-bottom: 15px;
            }
            @media (max-width: 767px) {
                .about-text h6 {
                    font-size: 18px;
                }
            }
            .about-text p {
                font-size: 18px;
                max-width: 450px;
            }
            .about-text p mark {
                font-weight: 600;
                color: #20247b;
            }

            .about-list {
                padding-top: 10px;
            }
            .about-list .media {
                padding: 5px 0;
            }
            .about-list label {
                color: #20247b;
                font-weight: 600;
                width: 88px;
                margin: 0;
                position: relative;
            }
            .about-list label:after {
                content: "";
                position: absolute;
                top: 0;
                bottom: 0;
                right: 11px;
                width: 1px;
                height: 12px;
                background: #20247b;
                -moz-transform: rotate(15deg);
                -o-transform: rotate(15deg);
                -ms-transform: rotate(15deg);
                -webkit-transform: rotate(15deg);
                transform: rotate(15deg);
                margin: auto;
                opacity: 0.5;
            }
            .about-list p {
                margin: 0;
                font-size: 15px;
            }

            @media (max-width: 991px) {
                .about-avatar {
                    margin-top: 30px;
                }
            }

            .about-section .counter {
                padding: 22px 20px;
                background: #ffffff;
                border-radius: 10px;
                box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            }
            .about-section .counter .count-data {
                margin-top: 10px;
                margin-bottom: 10px;
            }
            .about-section .counter .count {
                font-weight: 700;
                color: #20247b;
                margin: 0 0 5px;
            }
            .about-section .counter p {
                font-weight: 600;
                margin: 0;
            }
            mark {
                background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
                background-size: 100% 3px;
                background-repeat: no-repeat;
                background-position: 0 bottom;
                background-color: transparent;
                padding: 0;
                color: currentColor;
            }
            .theme-color {
                color: #fc5356;
            }
            .dark-color {
                color: #20247b;
            }
        </style>
        <title>Student Profile</title>
    </head>

    <body>
        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">About the student</h3>
                            <h6 class="theme-color lead">
                                Hello
                                <?php echo $Student_Name ; ?>, welcome to your personal page!
                            </h6>
                            <p><?php echo $Student_Description ; ?></p>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Birthday</label>
                                        <p>4th april 1998</p>
                                    </div>
                                    <div class="media">
                                        <label>Age</label>
                                        <p>22 Yr</p>
                                    </div>
                                    <div class="media">
                                        <label>Residence</label>
                                        <p>Canada</p>
                                    </div>
                                    <div class="media">
                                        <label>Address</label>
                                        <p><?php echo $address ; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p><?php echo $email ;  ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Phone</label>
                                        <p><?php echo $Student_phone ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Skype</label>
                                        <p>skype.0404</p>
                                    </div>
                                    <div class="media">
                                        <label>Freelance</label>
                                        <p>Available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img class="img-fluid rounded"src="https://www8.0zz0.com/2023/04/24/11/151957378.png" title="" alt=""  />
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500">مواد يدرسها</h6>
                                <p class="m-0px font-w-600">
                                    <?php // "The number of results returned from the array."
                                        $number_array = count($row); 
                                        $i = $number_array - 1 ;
                                        for ($i ; $i >= 0; $i--) { print_r($row[$i]['Name_subject']) ; echo "<br />
                                    "; }?>
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150">مدرسين الطالب</h6>
                                <p class="m-0px font-w-600">
                                    <?php $number_array = count($row); 
                                     $i = $number_array - 1 ;
                                     for ($i ; $i >= 0; $i--) { print_r($row[$i]['teachers_name']) ; echo "<br />
                                    "; } ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                                <p class="m-0px font-w-600">Photo Capture</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                                <p class="m-0px font-w-600">Telephonic Talk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
