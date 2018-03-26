<?php 
    include_once('User.php');
    if (isset($_POST['nameuser']) and isset($_POST['phoneuser']) and isset($_POST['bloodgroup']) and isset($_POST['password'])) {
        
        $user = new User;

        $user->setNameUser($_POST['nameuser']);
        $user->setPhoneUser($_POST['phoneuser']);
        $user->setPasswordUser($_POST['password']);
        

        if ($user->isExist()==true) {
           echo "Ce numero est deja inscrit ! Changer de Numero";
        }else {
            if($user->create()==true){
                echo "true";
            }else {
                echo "Erreur";
            }
        }
        
    } else {
        echo "verifier le nom svp ";
    }
    
?>