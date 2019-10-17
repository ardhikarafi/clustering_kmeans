<?php
class objek {
     private $cluster = null;
     var $data = array();
     
     function __construct($dt) {
           $this->data = $dt;
     }
     
     public function setCluster($cls){
           $jml = 0;
           $tmpCluster = 0;
           $c = null;
           for ($i=0;$i<count($cls);$i++){
				  $jml = 0;
                  for ($j=0;$j<count($this->data);$j++){						
						$jml += pow(($this->data[$j] - $cls[$i][$j]),2);		
                  }				  
				  $tmpC = sqrt($jml);
                  if ($c==null){
                        $c = $tmpC;
                        $tmpCluster = $i;
                  }
                  if ($tmpC < $c){
                        $c = $tmpC;
                        $tmpCluster = $i;
                  }
           }
           $this->cluster = $tmpCluster;
     }
     
     public function getCluster(){
           return $this->cluster;
     }
}

?>
