<?php 
	/**
	* Donation For Donate blood;
	*/
	class Donation
	{
		private $_donationDate;
		private $_expirationDate;
		private $_numberOfUnit;
		private $_idUser;
		private $_idHospital;
		private $_status="pending";
		protected $bdd;

		function __construct($idUser,$idHospital,$numberOfUnit,$dateOfMakingDonation,$expirationDate)
		{
			$this->_donationDate = $dateOfMakingDonation;
			$this->_numberOfUnit = $numberOfUnit;
			$this->_idUser = $idUser;
			$this->_idHospital = $idHospital;
			$this->_expirationDate = $expirationDate;
			$this->bdd = new PDO('mysql:host=localhost;dbname=bloodbankdb','root','');
		}

		private function ifExist()
		{
			$query = $this->bdd->prepare("SELECT * FROM donations WHERE id_user = :idUser and ref_hospital = :idHospital");
			$query->execute(array(
				":idUser"=>$this->_idUser,
				":idHospital"=>$this->_idHospital
			));

			return $statement = $query->rowCount();
	
		}

		public function makeDoantion()
		{
			if($this->ifExist()==1){
				return false;
			}else{
				$query = $this->bdd->prepare("INSERT INTO donations (id_donation,id_user,ref_hospital,donation_date, expiration_date,unit,donation_status) VALUES(:id_donation,:id_user,:ref_hospital,:donation_date, :expiration_date,:unit,:donation_status)");
				$query->execute(array(
					":id_donation" => NULL,
					":id_user"=>$this->_idUser,
					":ref_hospital"=>$this->_idHospital,
					":donation_date"=>$this->_donationDate, 
					":expiration_date"=>$this->_expirationDate,
					":unit"=>$this->_numberOfUnit,
					":donation_status"=>$this->_status
				));

				if ($query) {
						return true;
				}
			}
		}

		public function getInfoHospital()
		{
			$query = $this->bdd -> prepare("SELECT * FROM hospitals WHERE ref_hospital=:idHospital");
			$query->execute(array(':idHospital'=>$this->_idHospital));
			return $result = $query->fetch();
		}
	}
 ?>