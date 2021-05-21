<?php
class Config
{
	private static $instance = NULL;
	public static function getConnection()
	{
		if (!isset(self::$instance)) {
			try {
				self::$instance = new PDO("mysql:host=localhost;dbname=miniartdb", 'root', '');
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				die('Erreur: ' . $e->getMessage());
			}
		}
		return self::$instance;
	}
}
