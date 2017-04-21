<?php
//data base detail
define( 'DB_HOST', 'localhost');

define( 'DB_USER', 'RemoteAccess');
define( 'DB_PASS', 'uwTxeyXb6SvDDM9j');
define( 'DB_NAME', 'u_games');

define( 'DB_TYPE', 'mysql');
define( 'DB_PREFIX', '');


class dbopenconn
	{
		var $connection;
		var $db;
		
		// constructor
		function dbopenconn()
		{
		
		}
		
		function dbconnect()
		{
			$connect = @mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("could not connect to server");
			
			$this->connection = $connect;
			
			// Selecting the Database for use 
			$db_select = @mysql_select_db(DB_NAME) or die("could not select the database"); 
		
			$this->db = $db_select;
		}
	function insert_query($sqltext,$print="")
		{
			$query = $sqltext;
			$result = ($print == "")?mysql_query($query):$query;
			return $result;
		}
	function select_query($sqltext,$print="")
		{
			$query = $sqltext;
			$result = ($print == "")?mysql_query($query):$query;
			return $result;	
		}
		function numRows($result)
		{
			$rows = @mysql_num_rows($result);
			if ($rows === null) 
			{
				return $this->mysqlRaiseError();
			}
			return $rows;
		}
		
	}
	
	class AllTables
	{
	
		function AllTables()
		{
			$this->obj1 = new dbopenconn();
			$this->con = $this->obj1-> dbconnect();
		}
	function AddInfo($CompanyData,$tableName)
		{
		if (is_array($CompanyData)== false)
			{
				return false;
			}
			else
			{
				$fieldnames =  "(";
				$fieldvalues = "(";
				foreach ($CompanyData as $k => $v) 
				{
					
					$fieldnames .=  ($fieldnames=="(")?"$k":",$k";
					$fieldvalues .= ($fieldvalues=="(")?"'$v'":",'$v'";
				}
				$sqltext = "insert into ".$tableName." ".$fieldnames.") values ".$fieldvalues.")";
				//echo $sqltext;
				$applications = $this->obj1->insert_query($sqltext);
				
				return ($applications == 1)?"true":"false";
			}
		
		}
	function getInfo($KeyID='',$sql='',$debugquery='',$fields='*',$tablename='',$KeyFieldName='')
		{
			if (($KeyID!="")&&($tablename!=""))
			{
				$sqltext = "Select $fields from $tablename where $KeyFieldName='".$KeyID."'";
				//echo $sqltext;
			}
			else if ($sql!="")
			{
				 $sqltext = $sql;
			}
				
			$companies = $this->obj1->select_query($sqltext);
			
			if ($companies)
			{
				$numrows = $this->obj1->numRows($companies);
			}
			if ($numrows ==1)
			{
				while ($companylist = mysql_fetch_assoc($companies))
				{
					$compstr[] = $companylist;
				}	
			}
			else if($numrows > 1)
			{
				while ($companylist = mysql_fetch_assoc($companies))
				{
					$compstr[] = $companylist;
				}
			}
			return  $compstr;
		
		}	
		
		
		
		
	}
?>