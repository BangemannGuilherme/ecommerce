<?php 

namespace BangemannGuilherme\Model;

use \BangemannGuilherme\Model;
use \BangemannGuilherme\DB\Sql;

class User extends Model {

	const SESSION = "User";

	protected $fields = [
		"iduser", "idperson", "deslogin", "despassword", "inadmin", "dtergister", "desperson", "desemail", "nrphone"
	];

	public static function login($login, $password)
	{

		$db = new Sql();
		//$sql = new Sql();

		$results = $db->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
			":LOGIN"=>$login
		));

		if (count($results) === 0) {
			throw new \Exception("Não foi possível fazer login.");
		}

		$data = $results[0];

		if (password_verify($password, $data["despassword"]) === true) {

			$user = new User();
			$user->setData($data);			

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {

			throw new \Exception("Não foi possível fazer login.");

		}

	}

	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;

	}

	public static function verifyLogin($inadmin = true)
	{

		if (
			!isset($_SESSION[User::SESSION])
			|| //"ou"
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0  //verifica se o id do usuário não for vazio. Se for maior que 0 é um usuário
			||
			(bool)$_SESSION[User::SESSION]["iduser"] !== $inadmin  //verifica se o usuário é um usuário admin  "bool" = boolean
		) {
			
			header("Location: /admin/login");
			exit;

		}

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
			":despassword"=>$this->getdespassword(),
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

        $results = $db->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)",
             array(
            ":iduser"=>$this->getiduser(),
            ":desperson"=>$this->getdesperson(),
            ":deslogin"=>$this->getdeslogin(),
            ":despassword"=>$this->getdespassword(),
            ":desemail"=>$this->getdesemail(),
            ":nrphone"=>$this->getnrphone(),
            ":inadmin"=>$this->getinadmin()
        ));

        $this->setData($results[0]);

    }

    public function delete() {

        $sql = new Sql();

        $sql->query("CALL sp_users_delete(:iduser)", array(
            ":iduser"=>$this->getiduser()

        ));
    }

}

 ?>