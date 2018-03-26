<?php session_start();
    include_once 'php_code/User.php';
    $user = new User;


    if (isset($_SESSION['phoneUser']) && isset($_SESSION['idUser'])) {
    
 ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/donors_dash.css">
    <link rel="stylesheet" href="assets/css/donation.css">
    <script src="assets/js/jquery-3.2.1.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/donation.js"></script>
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

        <div class="content">

       
        <?php
            if (isset($_GET['idh'])) {
        ?>
        <form class="blood-form">
                <input type="hidden" id="hospital" name="hospital" value="<?php echo $_GET['idh']; ?>">
                <input type="hidden" id="idUser" name="idUser" value="<?php echo $_SESSION['idUser']; ?>">
                <label id="group-label" for="numberOfUnit">Number Of Unit</label><br>
                    <select name="numberOfUnit" id="numberOfUnit">
                        <option value="">Sélectionnez le Nombre de D'Unité...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br>
                <button type="submit" class="donate-button">Make Donation NOW</button>
        </form><br><br>
        <span class="msg"></span>
        <?php   
             }else{ 
         ?>
            <table>
                <caption>Select Hospital</caption>
                <thead>
                    <form>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Hospitals
                            </th>
                            <th>
                                <select name="city" id="city">
                                    <option value="">Ville</option>
                                    <option value="Bafoussam">Bafoussam</option>
                                    <option value="Yaounde">Yaounde</option>
                                    <option value="Bamenda">Bamenda</option>
                                    <option value="Buea">Buea</option>
                                    <option value="Maroua">Maroua</option>
                                    <option value="Garoua">Garoua</option>
                                    <option value="Ebolowa">Bertoa</option>
                                    <option value="Kribi">Kribi</option>
                                    <option value="Douala">Douala</option>
                                    <option value="Ebolowa">Ebolowa</option>
                                </select>
                            </th>
                            <th>
                                <select name="country" id="country">
                                    <option value="">Pays</option>
                                    <option value="Cameroun">Cameroun</option>
                                </select>
                            </th>
                            
                            <th>
                               Selectionner
                            </th>
                        </tr>

                    </form>
                </thead>
                <tbody class="contentResult">
                   
                    <?php 
                            try {
                                $bdd = new PDO('mysql:host=localhost;dbname=bloodbankdb','root','');
                                $query = $bdd -> prepare("SELECT * FROM hospitals");
                                $query->execute();
                                $i = 1;
                                while ($statement = $query->fetch()) {
                                    echo "<tr>
                                            <td>".$i."</td> 
                                            <td>".$statement['hospital_name']."</td> 
                                            <td>".$statement['hospital_city']."</td>
                                            <td>".$statement['hospital_country']."</td>
                                            
                                            <td>
                                            <a href=donation.php?idh=".$statement['ref_hospital'].">Select</a></td>
                                        </tr>";
                                    $i++;
                                }

                            } catch (Exception $e) {
                                echo "Une erreur est survenue";
                            }

                         ?>
                </tbody>
            </table>
            
         <?php
                }
         ?>
        </div>  
    </section>

    <footer>

    </footer>

</body>

</html>
<?php }else {
    header("Location:user_login.html");
}

?>