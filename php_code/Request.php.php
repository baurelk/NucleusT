<?php 
	/**
	* Donation For Donate blood;
	*/
	class Donation
	{
		private $_donationDate;
		private $_expirationDate;
		private $_numberOfUnit;
		private $_status = "RAS";
		private $_idUser;
		private $_idHospital;
		protected $bdd;

		function __construct($idUser,$idHospital,$numberOfUnit,$dateOfMakingDonation)
		{
			$this->_donationDate = $dateOfMakingDonation;
			$this->_numberOfUnit = $numberOfUnit;
			$this->_idUser = $idUser;
			$this->_idHospital = $idHospital;
			$this->_expirationDate + 4;
			$this->bdd = new PDO('mysql:host=localhost;dbname=test','root','');
		}


		public function makeDoantion()
		{
			$query = $this->bdd->prepare("INSERT INTO donation (idDonation,donationDate, expirationDate,numberOfUnit, statusDonate,idUser,idHospital) VALUES(:idDonation,:donationDate,:expirationDate,:numberOfUnit,:statusDonate,:idUser,:idHospital)");
			$query->execute(array(
				":idDonation" => NULL,
				":donationDate" => $this->_donationDate,
				":expirationDate" =>$this->_expirationDate,
				":numberOfUnit" =>$this->_numberOfUnit,
				":statusDonate"=>$this->_status,
				":idUser"=>$this->_idUser,
				":idHospital"=>$this->_idHospital
			));

			if ($query) {
					return 1;
			}
		}
	}
 ?>