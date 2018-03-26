<?php  session_start();
    if(isset($_POST['phone']) && isset($_POST['password'])){
        //include_once 'User.php';
       // $user = new User;
    
        // $user->setPhoneUser($_POST['phone']);
        // $user->setPasswordUser($_POST['password']);
        //if ($user->read()==1) {
        	//$row = $user->getUserInfo();
            $_SESSION['phoneUser'] = "697322429";//$_POST['phone'];
            $_SESSION['idUser'] = "5";//$row['id_user'];
            $_SESSION['nameUser'] = " Kounchou baurel";//$row['name'];
            header("Location:../dash.php");
        // }else {
        //     echo " verifiez encor votre login et votre pass"; 
        // }
    }else{
        echo "remplir tout les champs";
    }
?>