<?php session_start();

    if (isset($_SESSION['phoneUser']) && isset($_SESSION['idUser'])) {
 ?>
 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/donors_dash.css">
    <script src="assets/js/jquery-3.2.1.js"></script>
    <script src="assets/js/request.js"></script>
    <script src="assets/js/main.js"></script>
    <title>><?php echo $_SESSION['nameUser']; ?> - Dashboard</title>
</head>

<body>
    
    <header>
        <nav>
            <a href="#"><img id="menu" src="assets/images/dash_icons/User_Male_50px.png" alt="menu button"></a>
            <a href="index.html"><img id="logo" src="assets/images/logo.png" alt="logo"></a>
        </nav>
    </header>

    <div class="user-menu">
        <span><?php echo $_SESSION['nameUser']; ?></span>
        <div class="separator"></div>
        <a href="#">Edit Profile</a>
        <a href="deconnect.php">Log Out</a>
    </div>
    
    <div class="shadow"></div>

    <section class="main">
    
         <div class="middle-separator"></div>
            
            <div class="login-box">
            
        <?php
            if (isset($_GET['hospital'])) {
          ?>                       
                <form class="login-form" id="login-form" method="post" action="php_code/traitDonation.php">
                    <label id="group-label" for="numberOfUnit">Number Of Unit</label><br>

                    <input type="hidden" id="hospital" name="hospital" value="<?php echo $_GET['hospital']; ?>">
                    <input type="hidden" id="idUser" name="idUser" value="<?php echo $_SESSION['idUser']; ?>">

                    <select name="numberOfUnit" id="numberOfUnit">
                        <option value="">Sélectionnez le Nombre de D'Unité...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br>

                    <button type="submit" class="request-button">Request NOW</button>
                </form>
                <span class="msg"> </span>
            <?php }else{

             ?>


            
            <table border="1">
                <caption>Liste des Hopitaux en fonction de leurs stock</caption>
                <thead>
                    <form>
                        <tr>
                            <th>
                                <select name="city" id="city">
                                    <option value="">Ville</option>
                                </select>
                            </th>
                            <th>
                                <select name="country" id="country">
                                    <option value="">Pays</option>
                                </select>
                            </th>
                            
                            <th>
                                <select name="bloodgroup" id="bloodgroup">
                                    <option value="">Groupe Sangin</option>
                                </select>
                            </th>
                        </tr>
                    </form>
                </thead>
                <tbody class="contentResult">
                    <tr>
                        <td colspan=4>
                            Liste des Hopitaux Proche de vous
                        </td>
                    </tr>
                    <?php  
                            $group = 'AP';//$_POST['bloodGroup'];
                            $hospital_city ='Bafoussam';// $_POST['hospital']; 
                            try{
                                $bdd = new PDO('mysql:host=localhost;dbname=bloodbankdb','root','');
                                $sql = "SELECT $group,hospital_name FROM blood_bank, hospitals WHERE blood_bank.ref_hospital = hospitals.ref_hospital AND hospital_city = '$hospital_city'";                            
                                $query = $bdd->prepare($sql);
                                $query->execute();
                                $statement = $query->fetchAll();
                                $i = 1;
                            }catch (Exeption $e){
                                echo $e;
                            }
                        foreach ($statement as $value) {

                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $value[$group]; ?></td>
                            <td><?php echo $value['hospital_name']; ?></td>
                            <td><?php echo "<a href='request.php?hospital=".$value['hospital_name']."'>Select</a>" ;?></td>
                        </tr>
                    <?php
                     $i++;
                    }
                    ?>
                </tbody>
            </table>
         <?php } ?>
                
            </div>
            
        </section>
        
    </section>

    <footer>

    </footer>

</body>

</html>
<?php }else {
    header("Location:user_login.html");
}

?>