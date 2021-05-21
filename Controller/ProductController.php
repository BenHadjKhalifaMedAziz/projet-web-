<?PHP

class ProductController
{
	function addProduct($service, $type)
	{
		$table = "produitscult";
		if ($type == "art") {
			$table = "produitsart";
		}
		$sql = "INSERT INTO $table (idUsr,titreProd,descProd,prixProd,quantProd,img1,img2,img3) 
        VALUES (:idusr,:titre,:descProd,:prix,:quant,:img1,:img2,:img3)";
		$db  = Config::getConnection();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				':idusr' => $service->getIdUsr(),
				':titre' => $service->getTitreProd(),
				':descProd' => $service->getDescProd(),
				':prix' => $service->getPrixProd(),
				':quant' => $service->getQuantProd(),
				':img1' => $service->getImg1(),
				':img2' => $service->getImg2(),
				':img3' => $service->getImg3()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}

	function getMyArtList($idUser)
	{
		$sql = "SElECT * From produitsart where idUsr = $idUser";

		$db  = Config::getConnection();
		try {
			$list = $db->query($sql);
			return $list;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	}

	function getMyCulturalList($idUser)
	{
		$sql = "SElECT * From produitscult where idUsr = $idUser";
		$db  = Config::getConnection();
		try {
			$list = $db->query($sql);
			return $list;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	}


	function getArtList($order)
	{
		$sql = "SElECT * From produitsart ";
		if ($order == "asc" || $order == "desc") {
			$sql = $sql  . "order by prixProd " . $order;
		}
		$db  = Config::getConnection();
		try {
			$list = $db->query($sql);
			return $list;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	}

	function getArtListSearch($order, $search)
	{
		$sql = "SElECT * From produitsart WHERE (titreProd LIKE '%" . $search . "%') ";
		if ($order == "asc" || $order == "desc") {
			$sql = $sql  . "order by prixProd " . $order;
		}
		$db  = Config::getConnection();
		try {
			$list = $db->query($sql);
			return $list;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	}

	function getCulturalListSearch($order, $search)
	{
		$sql = "SElECT * From produitscult  WHERE (titreProd LIKE '%" . $search . "%') ";
		if ($order == "asc" || $order == "desc") {
			$sql = $sql  . "order by prixProd " . $order;
		}
		$db  = Config::getConnection();
		try {
			$list = $db->query($sql);
			return $list;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	}

	function getOneByIdByType($id, $type)
	{
		$sql = "SElECT * From produitscult where idProd = $id LIMIT 1";
		if ($type == 'art') {
			$sql = "SElECT * From produitsart where idProd = $id LIMIT 1";
		}
		$db  = Config::getConnection();
		try {
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetch();
			if (empty($row["idProd"])) {
				return null;
			} else {
				return $row;
			}
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	}

	function getCulturalList($order)
	{
		$sql = "SElECT * From produitscult ";
		if ($order == "asc" || $order == "desc") {
			$sql = $sql  . "order by prixProd " . $order;
		}
		$db  = Config::getConnection();
		try {
			$list = $db->query($sql);
			return $list;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	}
	function getTopCulturalList()
	{
		$sql = "SElECT * From produitscult limit 5";
		$db  = Config::getConnection();
		try {
			$list = $db->query($sql);
			return $list;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	}


	function getTopArtList()
	{
		$sql = "SElECT * From produitsart limit 5";
		$db  = Config::getConnection();
		try {
			$list = $db->query($sql);
			return $list;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	}

	function getProductUrl($product, $type)
	{
		$id = $product['idProd'];
		return "service_detail.php?id=$id&type=$type";
	}
}
