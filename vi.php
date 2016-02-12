<html>
<head>
	<meta charset="utf-8">
	<SCRIPT TYPE="text/javascript" SRC="common/jquery.js"></SCRIPT>
	<style type="text/css">

		#video{
			
			position: absolute;
		}
		#bfq{
			left: 400px;
			top: 200px;
			width: 853px;
			height: 480px;
			overflow:hidden;

			position: absolute;
			
			
		}
		span{
				position: absolute;
				white-space:nowrap; 

			

		}
		#su{
			left:400px;
			top:700px;
			position: absolute;
		
		}

	</style>
</head>

<body>
	<div style="display:none" id="data">
	<?php
		include "common/connect.php";
		include "common/xclass.php";
		include "common/mysqlclass.php";

		$text=new mysqlclass();
		$xclass= new xclass();

		$text->select();
		$json=$xclass->json($text->arrsql);
		echo $json;



	?>
</diV>
	<div id="bfq">
		<video controls id="video" src="music/g.mp4" width=853 height=480>

		</video>
		
	</div>



	<div id="su">
		<input type='text' id="text" value="不发点什么吗？">
		<input type="button" id="button" value="发射" >


	</div>






</body>
</html>
	<script>
	
	
		//send("dddddd");
		var bfq=$("#bfq");
		var t=0;
		var tt;
		

		var json=eval("("+$("#data").text()+")");
		//var	y=$("#bfq").height();
		var video=$("#video")[0];
		var v=0;
		video.ontimeupdate=function(){
			var all=video.duration;
			//console.log(all);
			var ti=video.currentTime;
			t=Math.floor(ti);//时间点
			if(t>v){
				v=t;
				tt="a"+t;
				 if ("#json[tt]".length>0) {
						//var dan=json[tt];s
					for(x in json[tt]){
						send(json[tt][x]);
				 		//$("#demo").text(json[tt][x]);
						//alert(json[a2][0])
					} 
				}
			}else{
				v=t;

			}


		}

$(document).ready(function(){
		$(":button").click(function(){//
			var text=$(":text").val();
			send(text);
			$(":text").val("");//

			aj("",tt);
			aj(text,tt);
			console.log(tt);
	
		})
		$(":text").focus(function(){
			$(":text").val("");
		})
		$(document).keypress(function(e){
			if(e.keyCode==13){
			var text=$(":text").val();
			send(text);
			$(":text").val("");//
		
			aj("",tt);
			aj(text,tt);
		
	}


})


	})

		function send(text){


			var father=$("video");
			var p=$("<span style=left:900></span>");
			var y=480;
			var height=Math.floor(Math.random()*480-40)+20;
			var color=new Array("green","red","yellow","blue","white","pink");
			var col=Math.floor(Math.random()*5+1)
			p.css("top",height);
			p.css("color",color[col]);



			p.text(text);

			p.appendTo(bfq);

			p.animate({left:'-300px'},6000,function(){

				this.remove();
			})
		}


		function aj(text,t){

			$.post("con.php",{
			post : text ,
		
			tid  : t

			},function(data,textStatus){
			var m=data;//可以更新到前端 然后定时刷新

			})	
		}



	</script>