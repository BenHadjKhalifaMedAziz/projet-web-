<?PHP

class QueryController
{
	function getQueryResult($sql)
	{
		$db  = Config::getConnection();
		try {
			$list = $db->query($sql);
			return $list;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	}
}
