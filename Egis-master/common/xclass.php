<?php
	class xclass{
		public $tid;
		public $post;
		public $arr;
		
		function __construct(){
			$this->post=$_POST["post"];//post is your post text name;
			$this->tid=$_POST["tid"];


		}
		
		function json($send){
			
			$js=json_encode($send);		
			return $js;



		}
		function need(){
			$tid=$this->tid;
			$text=$this->post;
			$this->arr=array($tid,$text);


		}

		









}



?>
