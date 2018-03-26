<?php 
    include_once 'Donation.php';
    if (isset($_POST['idUser']) && isset($_POST['hospital']) && isset($_POST['numberOfUnit'])) {
		$time = time();
		$timeExp = $time + 201000;
		$donation = new Donation($_POST['idUser'],$_POST['hospital'],$_POST['numberOfUnit'],$time,$timeExp);
		$result = $donation->makeDoantion();
		
		$info = $donation->getInfoHospital();
		if ($result == true) {
			echo "Bien vous avez jusqu'au ".date('d-m-Y',$time)." anvant ".date('h:i:s a',$time)."  pour vous rendre a l'hopital ".$info['hospital_name']." Situé à  ".$info['hospital_country'];
		}else if($result == false){
			echo " l'hopital ".$info['hospital_name']." Situé à  ".$info['hospital_city']." Vous attend pour le don de sang ";
		}
		
    }else{
    	echo "Veriifier tout les champs";
    }
 ?>