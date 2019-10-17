<html>
<head>
	<style>
		body{
			font-size:14px;
			font-family:tahoma;
			font-weight:bold;
		}
		table{
			border : 1px solid #000;
			text-align : center;
			font-family:tahoma;
			font-size:12px;
		}
		table tr th{
			border : 1px solid #000;
			background : gray;
			color : #FFF;
			padding:3px;
		}
		table tr td{
			border : 1px solid #000;
		}
	</style>
</head>
<body>
<?php
      include "objek.php";
	  include "ClusteringKMean.php";
	  include "ClusteringKMenoid.php";
	  
      for ($i=0;$i<count($_POST[objek]);$i++){
			$obj = $_POST[objek];
			$data = explode(",",$obj[$i]);
			for ($j=0;$j<count($data);$j++){
				$objek[$i][$j] = $data[$j];
			}
	  }
	  for ($i=0;$i<count($_POST[cluster]);$i++){
			$cls = $_POST[cluster];
			$data = explode(",",$cls[$i]);
			for ($j=0;$j<count($data);$j++){
				$centroid[$i][$j] = $data[$j];
			}
	  }	  
	  
     /* $objek = array(array(22.21,11.64),
                     array(43.25,8.95),
                     array(19.71,10.93),
                     array(21.05,10.38),
                     array(17.93,12.85),
                     array(17.72,12.00),
                     array(18.71,11.53),
                     array(25.86,9.33),
                     array(19.15,11.80),
                     array(18.42,11.20),
                     array(22.94,10.60),
                     array(26.89,10.44),
                     array(24.91,10.63),
                     array(22.99,11.47),
                     array(26.81,9.17),
                     array(19.14,12.11),
                     array(21.09,10.67),
                     array(18.71,12.36),
                     array(20.58,10.80),
                     array(27.66,9.94));
      
      $centroid = array(array(20,9),
                        array(23,10),
                        array(27,11));*/
	
	   //K-MEAN	   
	  echo "<div style='width:500px;float:left;'>
			<div style='width:500px;text-align:center;padding-bottom:30px;'>K- MEAN</div>";
      $clustering = new ClusteringKMean($objek, $centroid);
      $clustering->setClusterObjek(1);
	  echo "</div>";
	  
	  //K-MEAN	   
	  echo "<div style='padding-left:50px;width:500px;float:left;'>
			<div style='width:500px;text-align:center;padding-bottom:30px;'>K- MENOID</div>";
      $clustering = new ClusteringKMenoid($objek, $centroid);
      $clustering->setClusterObjek(1);
	  echo "</div>";
?>	
</body>
</html>