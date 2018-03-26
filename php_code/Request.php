<?php
    class Request
    {
        private $_idUser;
        private $_idHospital;
        private $_hospitalName;
        private $_numberOfUnit;
        private $_dateRequest;
        private $_requestStatus = "waiting";

        protected $bdd;

        public function __construct($idUser, $hospitalName, $unit, $date) {
            $this->bdd = new PDO('mysql:host=localhost;dbname=bloodbankdb','root','');
            $this->_idUser = $idUser;
            $this->_hospitalName = $hospitalName;
            $this->_numberOfUnit = $unit;
            $this->_dateRequest = $date;
        }

        
        /*getinfo
        *function getinfo : prend en entree une requete sql et reourne un tableau de resultat
        *@param mixed $sql
        */
        private function ifExist()
		{
			$query = $this->bdd->prepare("SELECT * FROM requests WHERE id_user = :idUser and ref_hospital = :idHospital");
			$query->execute(array(
				":idUser"=>$this->_idUser,
				":idHospital"=>$this->_idHospital
			));

			return $statement = $query->rowCount();
	
        }
        
       public function makeRequest()
       {
           if ($this->ifExist()==1) {
            return false;
           }else {
                $query = $this->bdd->prepare("INSERT INTO `requests`(`id_request`, `id_user`, `ref_hospital`, `request_date`, `unit`, `request_status`) VALUES (:id_request, :id_user,:ref_hospital,:request_date,:unit,:request_status)");
                $query->execute(array(
                ':id_request'=>NULL, 
                ':id_user'=>$this->_idUser,
                ':ref_hospital'=>$this->_idHospital,
                ':request_date'=>$this->_numberOfUnit,
                ':unit'=>$this->_dateRequest,
                ':request_status'=>$this->_requestStatus 
                ));
           }
           
           if($query){
               return true;
           }

       }

       public function getInfoHospital()
		{
			$query = $this->bdd -> prepare("SELECT * FROM hospitals WHERE hopital_name = :hospital_name");
            $query->execute(array(':hospital_name'=>$this->_hospitalName));
            $result = $query->fetch();
            $this->_idHospital = $result['ref_hospital'];
            return $result;   
		}
        


       

    }
    


?>