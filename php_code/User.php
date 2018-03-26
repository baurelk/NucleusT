<?php 
    class User  
    {
        private $_nameUser;
        private $_phoneUser;
        private $_bloodgroup;
        private $_cityUser;
        private $_passwordUser;
        private $_idUser;
        private $_birthDay;

        protected $bdd;

        public function __construct() {
            $this->bdd = new PDO('mysql:host=localhost;dbname=bloodbankdb','root','');
        }
        
        public function setNameUser($nameUser)
        {
            $this->_nameUser = $nameUser;
        }

        public function setBloodGroup($bloodgroup)
        {
            $this->_bloodgroup = $bloodgroup;
        }

        public function setPhoneUser($phoneUser)
        {
            $this->_phoneUser = $phoneUser;
        }

        public function setPasswordUser($passwordUser)
        {
                $this->_passwordUser = '5e543256c480ac577d30f76f9120eb74';
            
        }

        public function setIdUser($idUser)
        {
            $this->_idUser = $idUser;
        }

        // la fonction create permet d'inserer un nouvel utilisateur dans la base de donnee
        // elle ne prend rien en param ! retourne true quand l'operation cest effectue correctement 
        public function create()
        {
            $query = $this->bdd->prepare("INSERT INTO users (`id_user`,`name`, `phone`,`password`) VALUES( NULL, :nameUser, :phoneUser,:password)");
            $statement = $query->execute(array(
                ':nameUser' => $this->_nameUser,
                ':password' => $this->_passwordUser,
                ':phoneUser' => $this->_phoneUser
            ));
            if ($statement) {
                return true;
            } else {
                return false;
            }
        }

        //fonction Read permet de lire un utilisateur en base de donnee.
        // retourne True si Le User existe en BD
        public function read()
        {
            // try{
                $query = $this->bdd->prepare("SELECT * FROM users WHERE `phone` = :phoneUser and `password` = :passwordUser");
                $query->execute(array(
                    ':phoneUser' => $this->_phoneUser, 
                    ':passwordUser' => $this->_passwordUser
                ));
              // if (
                  return $query->rowCount();
                   //) {
                //     return 1;
                // } else {
                //    return 0;
                // }
                
            // }catch{
            //     echo " Wrong :( ";
            // }
        }

        public function getUserInfo()
        {
            // try{
                $query = $this->bdd->prepare("SELECT * FROM users WHERE phone = :phoneUser");
                $statement = $query->execute(array(
                    ':phoneUser' => $this->_phoneUser
                ));
        
                if ($query->rowCount()>=1) {
                   return true;
                } else {
                   return false;
                }
                
            // }catch{
            //     echo " Wrong :( ";
            // }
        }


        public function isExist()
        {
            // try{
                $query = $this->bdd->prepare("SELECT * FROM users WHERE `phone` = :phoneUser");
                $statement = $query->execute(array(
                    ':phoneUser' => $this->_phoneUser
                ));
                 
                if ($query->rowCount()>=1) {
                   return true;
                } else {
                    return false;
                }
                
            // }catch{
            //     echo " Wrong :( ";
            // }
        }
        
        /*function Update qui ne prend rien en parametre
         et Met a jour la un Utilisateur*/
        
        public function update()
        {
            // try{
                $query = $this->bdd->prepare("UPDATE user set nameUser=:nameUser,phoneUser=:phoneUser WHERE idUser =:idUser");
                $statement = $query->execute(array(
                    ':idUser' => $this->_idUser, 
                    ':nameUser' => $this->_nameUser, 
                    ':phoneUser' => $this->_phoneUser,
                ));
                if ($statement) {
                    return true;
                } else {
                    return false;
                }
                
            // }catch{
            //     echo " Wrong :( ";
            // }
        }


        public function delete($idUser)
        {
            //try{
                $query = $this->bdd->prepare("DELETE FROM user where iduser=:idUser");
                $statement = $query->execute(array(':idUser' => $idUser,));
                if ($statement) {
                    return true;
                } else {
                    return false;
                }
                
            // }catch{
            //     echo " Wrong :( ";
            // }
        }
    }
?> 