<?php
/**
* 
*/
class db_connect
{
	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $conn;
	public $db = "les_php";
	public $error;

	public function connect()
	{
		$this->conn = new mysqli ($this->host, $this->user, $this->pass, $this->db);
		if (!$this->conn)
		{
			$this->error = "Fatal Error :: Tidak Bisa terhubung database" .$this->connect->connect_error();
			return false;
		}
	}
}
?>