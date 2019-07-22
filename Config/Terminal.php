<?php
/****************************************************************************************
*  	Database Terminal Manager (version 1.0)			*  	This library used for managing	*
*  	Write @ : 10/8/2014								*	wide range of databases. all	*
*  	Last Modify : 18/2/2015							*	needed function are included	*
*  	Written by : Shayan Zeinali                     *	and we added more database 		*
*  	Licensed by : Shayan Zeinali					*	support shortly.				*
*  	Email : SHAYANZD3000@GMAIL.COM              	*	and we added more database 		*
****************************************************************************************/
require_once __DIR__ ."/SystemConfig.php";

class Terminal {
	private
		$connection,
		$result;
	
	function __construct($Server)
	{
		// global $setting;
		try {
			$this->connection=new PDO(
				"mysql:host=".constant($Server."_HOST").";dbname=".constant($Server."_DBNAME"),
				constant($Server."_USERNAME"),
				constant($Server."_PASSWORD"),
				array ( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
			);
			
			
		} catch(PDOException $e) {
			die("error description:". $e->getMessage());
		}
	
	}
	
	function Run($query)
	{
		$this->result = $this->connection->query($query);
	}
	
	function Shell($query)
	{
		return $this->connection->query($query);
	}
	
	function Size($result=NULL)
	{
		if(!$result)
		{
			if($this->result) 
			{
				return $this->result->rowCount();
			} 
			else 
			{
				return FALSE;
			}
		}
		
		return $result->rowCount();
	}
	
	function Load($result=NULL)
	{
		if(!$result)
			if($this->result)
				return $this->result->fetch(PDO::FETCH_OBJ);
			else
				return FALSE;
		
		return $result->fetch(PDO::FETCH_OBJ);
	}
	
	function Buffer($result=NULL)
	{
		if(!$result)
			if($this->result)
				return $this->result->fetchAll(PDO::FETCH_OBJ);
			else
				return FALSE;
		
		return $result->fetchAll(PDO::FETCH_OBJ);
	}

	function Close()
	{
		
		$this->connection = NULL;
	}

	function __destruct()
	{
		$this->connection = NULL;
	}
}

?>
