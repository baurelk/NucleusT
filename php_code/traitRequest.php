<?php 
    include_once 'Request.php';
    if (isset($_POST['idUser']) && isset($_POST['hospital']) && isset($_POST['numberOfUnit'])) {
        $time = time();
		
		
		$donation = new Request($_POST['idUser'],$_POST['hospital'],$_POST['numberOfUnit'],$time);
		$info = $donation->getInfoHospital();
		$result = $donation->makeRequest();
		
		
		if ($result == true) {
			echo "Bien vous avez jusqu'au ".date('d-m-Y',$time)." anvant ".date('h:i:s a',$time)."  pour vous rendre a l'hopital ".$info['hospital_name']." Situé à  ".$info['hospital_country'];
		}else if($result == false){
			echo " l'hopital ".$info['hospital_name']." Situé à  ".$info['hospital_city']." Vous attend pour le don de sang ";
		}
		
    }else{
    	echo "Veriifier tout les champs";
    }
 ?>