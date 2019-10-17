<?php
class ClusteringKMean {
      private $objek = array();
      private $centroidCluster = null;
      private $cekObjCluster = null;
      
      public function __construct($obj,$cnt) {
            $this->centroidCluster = $cnt;
            for ($i=0;$i<count($obj);$i++){
                  $this->objek[$i] = new objek($obj[$i]);
				  $this->cekObjCluster[$i] = 0;
            }
      }
      
      public function setClusterObjek($itr){               
            echo "<table width='500' cellpadding=0 cellspacing=0>
                        <tr><th colspan='100'>ITERASI ".$itr."</th></tr>
						<tr><th>Objek</th>";            
            for ($i=0;$i<count($this->objek[0]->data);$i++){
                  echo "<th>Data ".($i+1)."</th>";
            }            
            for ($j=0;$j<count($this->centroidCluster);$j++){
                  echo "<th>Cluster ".($j+1)."</th>";
            }            
            echo "</tr>";          
            for ($i=0;$i<count($this->objek);$i++){
                  $this->objek[$i]->setCluster($this->centroidCluster);
				  echo "<tr><td>Objek ".($i+1)."</td>";                  
                  for ($j=0;$j<count($this->objek[$i]->data);$j++)
                        echo "<td>".$this->objek[$i]->data[$j]."</td>";
                  
                  for ($j=0;$j<count($this->centroidCluster);$j++){
                        if ($j == $this->objek[$i]->getCluster())
                              echo "<td>X</td>";
                        else  echo "<td>&nbsp;</td>";
                  }                  
                  echo "</tr>";
            }
            echo "</table><br><br>";            
            $cek = TRUE;
            for ($i=0;$i<count($this->cekObjCluster);$i++){
                  if ($this->cekObjCluster[$i]!=$this->objek[$i]->getCluster()){
                        $cek = FALSE;
                        break;
                  }
            }            
           if ((!($cek))&&($itr<20)){
                  for ($i=0;$i<count($this->cekObjCluster);$i++){
                        $this->cekObjCluster[$i] = $this->objek[$i]->getCluster();
                  }
                  $this->setCentroidCluster();
                  $this->setClusterObjek($itr+1);
            }else{
				for ($i=0;$i<count($this->centroidCluster);$i++){
					echo "Cluster ".($i+1)." -> ";
					for ($j=0;$j<count($this->centroidCluster[$i]);$j++){
						echo $this->centroidCluster[$i][$j]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}
					echo "<br>";
				}
			}         
      }
      
      private function setCentroidCluster(){
           for ($i=0;$i<count($this->centroidCluster);$i++){
                 $countObj = 0;
                 $x = array();            
                 for ($j=0;$j<count($this->objek);$j++){
                       if ($this->objek[$j]->getCluster()==$i){
                             for ($k=0;$k<count($this->objek[$j]->data);$k++){
                                    $x[$k] += $this->objek[$j]->data[$k];
							 }
                             $countObj++;
                       }
                 }
                 for ($k=0;$k<count($this->centroidCluster[$i]);$k++){
					   if ($countObj>0)
							$this->centroidCluster[$i][$k] = $x[$k]/$countObj;
					   else{
							echo "<font color='red'>Terdapat ketidak sesuai Nilai Awal Cluster</font><br>";
							break;
					   }						
                 }
           } 
      }      
}

?>