<?php
	class mysqlclass{

		public $arrsql;
		public function __construct(){
			$this->arrsql=array();
		}
		function insert($post,$tid){
			
			$query="INSERT INTO da(t,danmu) VALUES('$tid','$post')";
//			$query=mysql_real_escape_string($query);
			mysql_query($query);

			
		}
		function select(){

			$swap=array();
			$data=mysql_query("SELECT t,danmu FROM da");
			while($row=mysql_fetch_array($data)){
				$x=array($row[t]=>$row[danmu]);
				$swap=array_merge_recursive($swap,$x);
				
			}
			$this->arrsql=$swap;

		}



}



?>
