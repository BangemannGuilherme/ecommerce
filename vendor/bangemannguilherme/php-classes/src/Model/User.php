<?php 

namespace BangemannGuilherme\Model;

use \BangemannGuilherme\Model;
use \BangemannGuilherme\DB\Sql;

class User extends Model {

	const SESSION = "User";

	//const SECRET = "??";
	//const SECRET_IV = "??";
	const ERROR = "UserError";
	const ERROR_REGISTER = "UserErrorRegister";
	const SUCCESS = "UserSucesss";


	protected $fields = [
		"iduser", "idperson", "deslogin", "despassword", "inadmin", "dtergister", "desperson", "desemail", "nrphone"
	];


	public static function getFromSession()
	{

		$user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0) {

			$user->setData($_SESSION[User::SESSION]);

		}

		return $user;

	}

	public static function checkLogin($inadmin = true)
	{

		if (
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
		) {
			//Não está logado
			return false;

		} else {

			if ($inadmin === true && (bool)$_SESSION[User::SESSION]['inadmin'] === true) {

				return true;

			} else if ($inadmin === false) {

				return true;

			} else {

				return false;

			}

		}

	}

	public static function login($login, $password)
	{

		$error = 1;

		$db = new Sql();

		/*$results = $db->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
			":LOGIN"=>$login
		));*/
		$results = $db->select("SELECT * FROM tb_users a INNER JOIN tb_persons b ON a.idperson = b.idperson WHERE a.deslogin = :LOGIN", array(
			":LOGIN"=>$login
		));

		if (empty($results))
		{
			//throw new \Exception("Usuário inexistente ou senha inválida.");
         	//header("Location: /admin/login");
			$error += 1;

			return $error;
        }

		$data = $results[0];

		if (password_verify($password, $data["despassword"]) === true) 
		{

			$user = new User();

			$data['desperson'] = utf8_encode($data['desperson']);

			$user->setData($data);			

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} /*else {

			throw new \Exception("Não foi possível fazer login.");

		}*/

	}

	public static function verifyLogin($inadmin = true)
	{

		if (!User::checkLogin($inadmin)) {

			if ($inadmin) {
				header("Location: /admin/login");
			} else {
				header("Location: /login");
			}
			exit;

		}

	}
	
	/*public static function verifyLogin($inadmin = true)
	{

		if (
			!isset($_SESSION[User::SESSION])
			|| //"ou"
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0  //verifica se o id do usuário não for vazio. Se for maior que 0 é um usuário
			||
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin  //verifica se o usuário é um usuário admin  "bool" = boolean
		) {
			
			header("Location: /admin/login");
			exit;

		}

	}*/

	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;

	}

	public static function listAll()
	{
		$db = new Sql();

		return $db->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson");

	}

	public function save()
	{
		$db = new Sql();

		$results = $db->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
			":desperson"=>$this->getdesperson(),
			":deslogin"=>$this->getdeslogin(),
			":despassword"=>User::getPasswordHash($this->getdespassword()),
			//":despassword"=>$this->getdespassword(),
			":desemail"=>$this->getdesemail(),
			":nrphone"=>$this->getnrphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);

	}

	public function get($iduser) 
    {
		$db = new Sql();
    	$results = $db->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(
			       ":iduser"=>$iduser
    ));
 
    $data = $results[0];

    $data['desperson'] = utf8_encode($data['desperson']);
 
    $this->setData($data);

    }

    public function update() {

		$db = new Sql();

		if (strlen($this->getdespassword()) >= 5)
		{

			$results = $db->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)",
            	array(
            	":iduser"=>$this->getiduser(),
            	":desperson"=>$this->getdesperson(),
            	":deslogin"=>$this->getdeslogin(),
            	":despassword"=>User::getPasswordHash($this->getdespassword()),
				//":despassword"=>$this->getdespassword(),
            	":desemail"=>$this->getdesemail(),
            	":nrphone"=>$this->getnrphone(),
            	":inadmin"=>$this->getinadmin()
        	));

        	$this->setData($results[0]);

		} else {

			$results = $db->select("CALL sp_usersupdate_edit_pass(:iduser, :desperson, :deslogin, :desemail, :nrphone, :inadmin)",
				array(
	   			":iduser"=>$this->getiduser(),
	   			":desperson"=>$this->getdesperson(),
	   			":deslogin"=>$this->getdeslogin(),
	   			":desemail"=>$this->getdesemail(),
	   			":nrphone"=>$this->getnrphone(),
	   			":inadmin"=>$this->getinadmin()
   			));

   			$this->setData($results[0]);

		}
	}
    public function delete() {

        $sql = new Sql();

        $sql->query("CALL sp_users_delete(:iduser)", array(
            ":iduser"=>$this->getiduser()

        ));
    }

	public function setPassword($password)
   {

      $sql = new Sql();

      $sql->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser", array(
         ":password"=>$password,
         ":iduser"=>$this->getiduser()
      ));

   }

   public static function setError($msg)
   {

      $_SESSION[User::ERROR] = $msg;

   }

   public static function getError()
   {

      $msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

      User::clearError();

      return $msg;

   }

   public static function clearError()
   {

      $_SESSION[User::ERROR] = NULL;

   }

   public static function setSuccess($msg)
   {

      $_SESSION[User::SUCCESS] = $msg;

   }

   public static function getSuccess()
   {

      $msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

      User::clearSuccess();

      return $msg;

   }

   public static function clearSuccess()
   {

      $_SESSION[User::SUCCESS] = NULL;

   }

   public static function setErrorRegister($msg)
   {

      $_SESSION[User::ERROR_REGISTER] = $msg;

   }

   public static function getErrorRegister()
   {

      $msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : '';

      User::clearErrorRegister();

      return $msg;

   }

   public static function clearErrorRegister()
   {

      $_SESSION[User::ERROR_REGISTER] = NULL;

   }

   public static function checkLoginExist($login)
   {

      $sql = new Sql();

      $results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :deslogin", [
         ':deslogin'=>$login
      ]);

      return (count($results) > 0);

   }

   public static function getPasswordHash($password)
   {

      return password_hash($password, PASSWORD_DEFAULT, [
         'cost'=>12
      ]);

   }

}

 ?>