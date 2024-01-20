<!DOCTYPE html>
<html lang="en"
  xmlns:th="http://www.thymeleaf.org"
>
<?php
include("./connect.php"); // connection to db
error_reporting(0);




?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="css/network.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- Google Font -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />


<style>
    td{
        padding:10px;
    }
    input{
        height:40px;
        width:80%;
    }
    select{
        height:40px;
        width:80%;
    }
    table{
        font-size:18px;
        background-color:#0abde3;
        color:white;
        box-shadow:0px 0px 5px blue;
    }
    </style>


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <title>Network</title>
</head>
<body>
    <?php

    if(isset($_REQUEST['log'])){
        $se = $_REQUEST['name'];
        $br = $_REQUEST['branch'];
        $sem = $_REQUEST['sem'];
        $em = $_REQUEST['email'];
        $pa = $_REQUEST['pass'];
        $fn = $_FILES['profile']['name'];
		$ftmp = $_FILES['profile']['tmp_name'];
		
       
       $q = "insert into studentadmin (name,branch,semester,email,password,pic) values('$se','$br','$sem','$em','$pa','$fn')";
       $r = mysqli_query($db,$q);
        if($r){
          echo "<script>alert('Student Added');</script>";
		move_uploaded_file($ftmp,'profile/'.$fn);
       }
       else{
        echo "<script>alert('error');</script>";
        //   mysqli_query($con);
       }

    }
?>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo" id="ggg"><a href="#"><img src="./assests/logo1.png" style="height: 35px;margin-top: 10px;"></a></span>

            <div class="menu">
                <div class="logo-toggle" >
                    <span class="logo" style="margin-top:40px;"><a href="#">GRITUP</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                <li><a href="dashboard.php" >Upload Material</a></li>
                    <li><a href="faq.php">Add FAQ</a></li>
                    <li><a href="studentadmin.php">Add Student Admin</a></li>
                    <li><a href="jobs.php">Add Jobs</a></li>  
                    <li><a href="adduserie.php">Add IE</a></li>  
                    <li><a href="index.php">Logout</a></li>
                </ul>
            </div>

            <div class="darkLight-searchBox">
                <div class="dark-light" style="margin-bottom: 20px;"><a href="Profile.html">
                    <i class="fa-solid fa-user"></i></a>
                </div>

                <div class="searchBox">
                   <div class="searchToggle">
                    
                   </div>

                    <div class="search-field">
                        
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <br><br><br><br><br><br>
   
    <div>
    <form method="post" action="" enctype="multipart/form-data">
    <table border="0" align="center" width="40%" cellspacing="10" cellpadding="10">
    <tr>
    <td>Student Name</td>
    <td><input type="text" name="name" id="name"></td>
</tr>
    
<tr>
    <td>Branch</td>
    <td>
        <select name="branch">
        <option value="CS">CS</option>
        <option value="EC">EC</option>
        <option value="AU">AU</option>
        <option value="ME">ME</option>
        </select>
    </td>
</tr>
<tr>
    <td>Semester</td>
    <td>
        <select name="sem">
        <option value="1st Sem">1st Sem</option>
        <option value="2nd Sem">2nd Sem</option>
        <option value="3rd Sem">3rd Sem</option>
        <option value="4th Sem">4th Sem</option>
        <option value="5th Sem">5th Sem</option>
        <option value="6th Sem">6th Sem</option>
        </select>
    </td>
</tr>
<tr>
    <td>Student Email</td>
    <td><input type="email" name="email" id="email"></td>
</tr>


<tr>
    <td>Password</td>
    <td><input type="password" name="pass" id="pass"></td>
</tr>
<tr>
    <td>Profile Pic</td>
    <td><input type="file" name="profile" id="profile"></td>
</tr>

<tr>
    <td colspan="2"><input type="submit" value="Add Student" name="log"></td>
</tr>

  </table>
</form>

</div>


<div class="home">
    <button type="button" class="Home"><a href="index.html">Home</a></button>
</div>


<script>
const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");

      let getMode = localStorage.getItem("mode");
          if(getMode && getMode === "dark-mode"){
            body.classList.add("dark");
          }

// js code to toggle dark and light mode
      modeToggle.addEventListener("click" , () =>{
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");

        // js code to keep user selected mode even page refresh or file reopen
        if(!body.classList.contains("dark")){
            localStorage.setItem("mode" , "light-mode");
        }else{
            localStorage.setItem("mode" , "dark-mode");
        }
      });

// js code to toggle search box
        searchToggle.addEventListener("click" , () =>{
        searchToggle.classList.toggle("active");
      });
 
      
//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
    nav.classList.add("active");
});

body.addEventListener("click" , e =>{
    let clickedElm = e.target;

    if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove("active");
    }
});

</script>
    



    
</body>
</html>