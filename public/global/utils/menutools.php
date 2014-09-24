<?php
	class Menu{
		public $dbutils;
		function __construct(){
			$this->dbutils = new DBUtils();
		}

		function getRootList($pid = 0,& $result = array()){
			$sql = "SELECT * FROM menu WHERE parent_id=".$pid;
			$res = mysql_query($sql,$this->dbutils->getConn());
			while($row = mysql_fetch_assoc($res, MYSQL_ASSOC)){
				$result[] = $row;
			}
			return $result;
		}

		function getList($pid = 0, & $result = array(), $level = 0){
			$sql = "SELECT * FROM menu WHERE parent_id=".$pid;
			$res = mysql_query($sql,$this->dbutils->getConn());
			$level++;
			while($row = mysql_fetch_assoc($res, MYSQL_ASSOC)){
				$row['name'] = '|'.str_repeat("---",$level).$row['name'];
				$result[] = $row;
				$this->getList($row['id'],$result,$level);
			}
			return $result;
		}

		function displayRootMenu($pid = 0){
			$list = $this->getRootList($pid);
			$str ="<ul class='nav nav-tabs nav-stacked affix' id='myNav'>";
			if(is_array($list)){
				$cnt = 0;
				foreach($list as $key => $value){
					$act = "";
					if($cnt++ == 0){
						$act = "active";
					}
					$str .= "<li class={$act}><a id='menuItem{$value["id"]}' onclick=getSubMenu({$value["id"]})>{$value['name']}<i class='fui-arrow-right'></i></a></li>";
				}
			}
			$str .= "<li><a onclick=getSubMenu(0)>返回根菜单<i class='fui-arrow-left'></i></a></li>";
			$str .= "</ul>";
			
			return $str;
		}

		function displayMenu($pid = 0){
			$str ="<ul class='nav nav-tabs nav-stacked affix' id='myNav'>";
			$list = $this->getList($pid);

			foreach($list as $key => $value){
				$active = "";
				if($value['id'] == 1){
					$active = 'active';
				}
				$str .= "<li class={$active}><a href='#section-{$value["id"]}'>{$value['name']}<i class='fui-arrow-right'></i></a></li>";
			}
			$str .= "</ul>";
			return $str;
		}

		function __destruct(){
			//$this->dbutils->close();	2C-D0-5A-61-07-E2
		}
	}
?>