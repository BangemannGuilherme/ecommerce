<?php 

namespace BangemannGuilherme\Model;

use \BangemannGuilherme\Model;
use \BangemannGuilherme\DB\Sql;
use \BangemannGuilherme\Mailer;


class User extends Model {

	const SESSION = "User";

	const SECRET = "Guiboy_SecretKey";
	const SECRET_IV = "??";
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

        $db = new Sql();

        $db->query("CALL sp_users_delete(:iduser)", array(
            ":iduser"=>$this->getiduser()

        ));
    }

	public function setPassword($password)
   {

      $db = new Sql();

      $db->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser", array(
         ":password"=>$password,
         ":iduser"=>$this->getiduser()
      ));

   }

   public static function getForgot($email, $inadmin = true)
   {

      $db = new Sql();

      $results = $db->select("
         SELECT *
         FROM tb_persons a
         INNER JOIN tb_users b USING(idperson)
         WHERE a.desemail = :email;
      ", array(
         ":email"=>$email
      ));

      if (count($results) === 0)
      {

         throw new \Exception("It's not possible to recovery your password.");

      }
      else
      {

         $data = $results[0];

         $results2 = $db->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)", array(
            ":iduser"=>$data['iduser'],
            ":desip"=>$_SERVER['REMOTE_ADDR']
         ));

         if (count($results2) === 0)
         {

            throw new \Exception("It's not possible to recovery your password.");

         }
         else
         {

            $dataRecovery = $results2[0];

            $code = openssl_encrypt($dataRecovery['idrecovery'], 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_IV));

            $code = base64_encode($code);

            if ($inadmin === true) {

               $link = "http://www.guiboyecommerce.com.br/admin/forgot/reset?code=$code";

            } else {

               $link = "http://www.guiboyecommerce.com.br/forgot/reset?code=$code";
               
            }           

            $mailer = new Mailer($data['desemail'], $data['desperson'], "Change password", "forgot", array(
               "name"=>$data['desperson'],
               "link"=>$link
            ));            

            $mailer->send();

            return $link;

         }

      }

   }

   public static function validForgotDecrypt($code)
   {

      $code = base64_decode($code);

      $idrecovery = openssl_decrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_IV));

      $db = new Sql();

      $results = $db->select("
         SELECT *
         FROM tb_userspasswordsrecoveries a
         INNER JOIN tb_users b USING(iduser)
         INNER JOIN tb_persons c USING(idperson)
         WHERE
            a.idrecovery = :idrecovery
            AND
            a.dtrecovery IS NULL
            AND
            DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();
      ", array(
         ":idrecovery"=>$idrecovery
      ));

      if (count($results) === 0)
      {
         throw new \Exception("It was not possible to recovery your password.");
      }
      else
      {

         return $results[0];

      }

   }
   
   public static function setForgotUsed($idrecovery)
   {

      $db = new Sql();

      $db->query("UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE idrecovery = :idrecovery", array(
         ":idrecovery"=>$idrecovery
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

      $db = new Sql();

      $results = $db->select("SELECT * FROM tb_users WHERE deslogin = :deslogin", [
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

   public function getOrders()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT * 
			FROM tb_orders a 
			INNER JOIN tb_ordersstatus b USING(idstatus) 
			INNER JOIN tb_carts c USING(idcart)
			INNER JOIN tb_users d ON d.iduser = a.iduser
			INNER JOIN tb_addresses e USING(idaddress)
			INNER JOIN tb_persons f ON f.idperson = d.idperson
			WHERE a.iduser = :iduser
		", [
			':iduser'=>$this->getiduser()
		]);

		return $results;

	}

	public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson) 
			ORDER BY b.desperson
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson)
			WHERE b.desperson LIKE :search OR b.desemail = :search OR a.deslogin LIKE :search
			ORDER BY b.desperson
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	public static function getPageSearchBox($id , $nome, $email, $login, $admin, $page = 1, $itemsPerPage = 8)
	{
 
	   $start = ($page - 1) * $itemsPerPage;
 
	   $sql = new Sql();
 
	   $results = $sql->select("
		  SELECT SQL_CALC_FOUND_ROWS *
		  FROM tb_users a 
		  INNER JOIN tb_persons b USING(idperson) 
		  WHERE a.iduser LIKE :id
		  AND b.desperson LIKE :nome
		  AND b.desemail LIKE :email
		  AND a.deslogin LIKE :login
		  AND a.inadmin LIKE :admin
		  ORDER BY b.desperson
		  LIMIT $start, $itemsPerPage;
	   ", [
		  ':id'=>'%'.$id.'%',
		  ':nome'=>'%'.$nome.'%',
		  ':email'=>'%'.$email.'%',
		  ':login'=>'%'.$login.'%',
		  ':admin'=>'%'.$admin.'%'
	   ]);
 
	   $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");
 
	   return [
		  'data'=>$results,
		  'total'=>(int)$resultTotal[0]["nrtotal"],
		  'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
	   ];
 
	}

}

 ?>