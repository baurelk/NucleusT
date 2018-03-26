<?php  session_start();
    include("User.php");
    if(isset($_SESSION['phoneUser'])){
        $user = new User;
        $user->setPhoneUser($_SESSION['phoneUser']);
            $row = $user->getUserInfo();
            $user->setNameUser($_POST['nameuser']);
            $user->setIdUser($row['idUser']);
            $user->setPhoneUser($_POST['phoneuser']);            

       if($user->update()==true){
            echo "update well";
        }else{
            echo "update fail";
        }

        header("Location:../dash.php");
    }else{
        
    }
?>