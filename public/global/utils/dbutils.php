<?php
	class DBUtils{
		private $config;
		private $conn = null;
		private $result = null;
		private $resultSet = null;
		private $resultSize = 0;

		function __construct(){
			$this->config = new DBConfig();
			$this->connect();
		}

		function connect(){
			$this->conn = mysql_connect($this->config->getHost(),$this->config->getUser(),$this->config->getPassword()) or die("Connect error:".mysql_error());
			mysql_select_db($this->config->getDbname(), $this->conn) or die(mysql_error());
			mysql_query("SET NAMES UTF8") or die("Encoding error");
			return $this->conn;
		}

		function close(){
			if($this->conn != null){
				try{
					mysql_close($this->conn) or die("Close error:".mysql_error());
				}catch(Exception $e){
					echo $e->getMessage()."<br>";
					exit();
				}
			}
		}

		function blurQuery($column, $keyword, $table){
			$sql = "select * from ".$table." where ".$column." like %".$keyword."%";
			return $this->query($sql);
		}

		function pageBlurQuery($column, $keyword, $table, $pageNo, $pageSize){
			$sql = "select * from ".$table." where ".$column." like %".$keyword."%";
			return $this->pageQuery($sql, $pageNo, $pageSize);
		}

		/*
			raw query
		*/
		function raw_query($sql){
			echo $sql;
			$this->result = mysql_query($sql,$this->getConn());
		}
		function query($sql){
			if($this->isValidStatement($sql)){
				if($this->getConn() != null){
					$result = mysql_query($sql, $this->conn) or die("Query error:".mysql_error());
					$this->resultSet = array();
					$i = 0;
					while($row = mysql_fetch_assoc($result)){
						$this->resultSet[$i++] = $row;
					}
					$this->resultSize = $i;
					return $this->resultSet;
				}
			}else{
				exit("Illegal statement");
			}
		}

		function drop($table){
			$sql = "drop table if exists ".$table;
			return $this->query($table);
		}

		function insert($table, $columns, $values){
			$sql = "insert into `".$table."`(";
			for($i=0, $size = count($columns);$i<$size;$i++){
				$value = $columns[$i];
				if($i == 0)$sql .="`".$value."`";
				else $sql .=",`".$value."`";
			}
			$sql .=") values(";
			for($i=0, $size = count($values);$i<$size;$i++){
				$value = $values[$i];
				if($i == 0)$sql .="`".$value."`";
				else $sql .=",`".$value."`";
			}
			$sql .=")";
			echo $sql;
		}
		
		function delete($table,$column,$keyword){
			$sql = "delete from `".$table."` where `".$column."`=".$keyword;
			return $this->query($sql);
		}

		function blurDelete(){

		}
		function isValidStatement($sql){
			//regular expression
			return true;
			//return preg_match("/^\?(.*)(select\s|insert\s|delete\sfrom\s|count\(|drop\stable|update\struncate\s|asc\(|mid\(|char\(|xp_cmdshell|exec\smaster|net\slocalgroup\sadministrators|\"|:|net\suser|\'|\sor\s)(.*)$/",$sql);
		}

		function pageQuery($sql, $pageNo, $pageSize){
			$start = ($pageNo - 1)*$pageSize;
			$pageSql = $sql." LIMIT ".$start.",".$pageSize;
			return $this->query($pageSql);
		}
		function showResultSet(){
			for($i = 0, $size = $this->getResultSize(); $i< $size; $i++){
				$row = $this->resultSet[$i];
				$first  = true;
				foreach($row as $key => $value){
					if(!$first){
						echo ",\t";
					}
					$first = false;
					echo $key.":".$value;
				}
				echo '<br>';
			}
		}

		function __destruct(){
			$this->close();
		}

		function setConfig($config){
			$this->config = $config;
		}
		function getConfig(){
			return $this->config;
		}
		function getConn(){
			return $this->conn;
		}
		function getResult(){
			return $this->result;
		}
		function getResultSet(){
			return $this->resultSet;
		}

		function getResultSize(){
			return $this->resultSize;
		}

		function __get($key){
			echo $key." does not exist"."<br />";
		}
		function __toString(){
			return "CONFIG:".$config;
		}

		function toJSON(){
			return json_encode($this->resultSet);
		}
	}
?>