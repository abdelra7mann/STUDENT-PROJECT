<?php 
// session_start(); 


/* Beginning of my database connection*/
		$dsn = "mysql:host=localhost,dbname=product";
		$user = "root";
		$password = "";
		$optional = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAME utf8" );
try{
       $database = new PDO("mysql:host=localhost;dbname=international_school",$user,$password);  
       $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
	}

catch(PDOException $e){
		echo $e->getMessage();
	}

/* Beginning of my database connection*/


		// Get search query
		// function getSearchQuery() {
		// 	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// 		return $_REQUEST["search"];
		// 	}
		// }

		// $searchQuery = getSearchQuery();

		// Build SQL query
        $query = " SELECT * FROM junction_table 
        JOIN children  ON children.children_id = junction_table.child_id 
        JOIN materials  ON materials.id = junction_table.mateirials_id 
        JOIN teachers  ON teachers.id = junction_table.teachers_id 
        JOIN grades  ON grades.grade_id	 = junction_table.grades_id";
		

		// Execute query
		$result = $database->query($query);
		$row = $result->fetchAll();
        

		// Display results
        foreach ($row as $s) {           
        echo '<pre>'; 
        // print_r($s);
        echo '</pre>'; }  
?>




<!-- PHP code end and HTML code beginning-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
		body {
			color: #6F8BA4;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
	 rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
	  crossorigin="anonymous">
    <title>Student Information</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        header {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #dddddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <header>
        <h1>Student Information</h1>
    </header>

    <main>
	<!-- This form allows the user to search for a student by their ID -->	
	<form method="POST"  style="display: flex; flex-direction: column; align-items: center; margin-top: 50px; font-size: 18px;">
		<label for="search" style="margin-bottom: 10px;">Please enter student id:</label>
		<input type="text" id="search" name="search"
		 style="padding: 5px; border-radius: 5px; 
		 border: none; box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.5);
		 margin-bottom: 10px;">
		<button type="submit" style="padding: 10px; background-color: #4CAF50;
		 color: white; border: none; border-radius: 5px; cursor: pointer;">Search</button>
   </form>
   	<!-- This form allows the user to search for a student by their ID -->	



<!-- This table displays a list of students and their information, with a link to view their profile -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>address</th>
            <th>Grade</th>
            <th>Her teacher</th>  
            <th>Description</th>  
            <th>Visit Student Account</th>  
        </tr>
    </thead>
    <tbody id="student-data">
        
	<!-- Looping through each row of data in the array -->
    <?php foreach ($row as $data) {  ?>
    <tr>
        <td><?php echo $data['children_id']; ?></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['address']; ?></td>
        <td><?php echo $data['phone']; ?></td>
        <td><?php echo $data['teachers_name']; ?></td>    
        <td><?php echo $data['Description']; ?></td> 
	<!-- Looping through each row of data in the array -->

        <!-- Link to view the student's profile -->
        <td> <button style="background-color: #4CAF50; border: none; color: white;">
		 <a style="background-color: #4CAF50; border: none; color: white;
		  padding: 6px 20px; text-align: center; text-decoration: none;
		   display: inline-block; font-size: 15px; margin: 4px 2px; cursor: pointer;"
		     href="View_Profile.php?id='<?php echo $data["children_id"]?>'"> View Profile </a> </button> </td>
    </tr>
    <?php } ?>
        
    </tbody>
</table>
<!-- This table displays a list of students and their information, with a link to view their profile -->


    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
	crossorigin="anonymous">
    </script>
</body>
</html>
