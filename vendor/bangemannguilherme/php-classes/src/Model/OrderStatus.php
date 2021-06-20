<?php 

namespace BangemannGuilherme\Model;

use \BangemannGuilherme\DB\Sql;
use \BangemannGuilherme\Model;

class OrderStatus extends Model {

	const EM_ABERTO = 1;
	const AGUARDANDO_PAGAMENTO = 2;
	const PAGO = 3;
	const ENTREGUE = 4;

	/*const OPEN = 1;
	const WAITING_PAYMENT = 2;
	const PAID = 3;
	const DONE = 4;*/

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_ordersstatus ORDER BY desstatus");

	}

}

?>