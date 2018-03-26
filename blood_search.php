<?php session_start();
    include_once 'php_code/Request.php';
    
    if (isset($_SESSION['phoneUser']) && isset($_SESSION['idUser'])) {
    
        $request = new Request;
 ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/blood_search.css">
    <script src="assets/js/jquery-3.2.1.js"></script>
    <script src="assets/js/main.js"></script>
    <title>Blood Search</title>
</head>

<body>

<header>
    <nav>
        <a href="#">
            <img id="menu" src="assets/images/dash_icons/Dark_User_Male_50px.png" alt="menu button">
        </a>
        <a href="index.html">
            <img id="logo" src="assets/images/dark_logo.png" alt="logo">
        </a>
    </nav>
</header>

<div class="user-menu">
    <span>Marc Koriodan Enzo</span>
    <div class="separator"></div>
    <a href="#">Edit Profile</a>
    <a href="#">Log Out</a>
</div>

<section class="main">

    <h1>Blood Search</h1>
    <div id="separator"></div>
    <form action="request.php" method="post">
        <select name="hospital">
            <option value="">Sélectionnez la région ...</option>
            <?php
                $bdd = new PDO('mysql:host=localhost;dbname=bloodbankdb','root','');
                $query = $bdd -> prepare("SELECT * FROM hospitals GROUP BY hospital_city");
                $query->execute();
                while($statement = $query->fetch()){
                    echo "<option value='".$statement['hospital_city']."'>".$statement['hospital_city']."</option>";
                }
            ?>
        </select>

        <select name="bloodGroup" id="group">
            <option value="">Sélectionnez le groupe sanguin ...</option>
            <option value="A">Groupe A</option>
            <option value="AP">Groupe A+</option>
            <option value="AM">Groupe A-</option>
            <option value="ABP">Groupe AB+</option>
            <option value="ABM">Groupe AB-</option>
            <option value="BM">Groupe B-</option>
            <option value="BP">Groupe B+</option>
            <option value="OP">Groupe O+</option>
            <option value="OM">Groupe O-</option>
        </select>

    <!-- <div class="search-type">
            <input name="peoples" id="peoples" value="option1" type="radio"><label for="peoples">Peoples</label>
            <input name="hospitals" id="hospitals" value="option2" checked="" type="radio"><label for="hospitals">Hospitals</label>
        </div> -->

        <button type="submit" class="search-button">view results</button>

    </form>
    
</section>

</body>

</html>

<?php 
    }else {
        header('Location:user_login.html');
    }    
 ?>