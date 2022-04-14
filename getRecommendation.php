<?php
include 'db_connecting.php';
$type = $_POST['type'];
$service = $_POST['service'];
$city = $_POST['city'];

 $sql=$conn->query("
    SELECT charityId, name, descrption,location,licenseNumber, donationType, service, phone, email, city, status
    FROM `charity` 
    WHERE 
        status='Accepted' AND (city = '{$city}') AND
        ( (service = '{$service}')  
         OR (donationType LIKE '%{$type}%')) ORDER BY RAND() ") or die($conn->error);
   
   $res=array();
  while($row=$sql->fetch_assoc()){
           $res[] = $row;
         
  }
  
  // cosine similarity equasion = (A.B) / (||A||.||B||) 
  
  function cal(&$a){
      
      global $service, $city, $type;
      
        $l = ($a['service'] == $service)?0.20:0;
        $m = ($a['city'] == $city)?0.60:0;
        $n = ($a['donationType'] == $type)?0.20:0;
        
        $numerator = 0.20*$l + 0.60*$m + 0.20*$n;
        $d1 = sqrt($l * $l + $m * $m + $n * $n);
        $d2 = sqrt(0.44);
        $denominator = $d1 * $d2;
        
        return (double)($numerator/$denominator);
  }
  
  function cmp(&$a,&$b)
    {
        return (cal($a) < cal($b));
    }
    
    //The usort() function sorts an array using a user-defined comparison function.
  
  usort($res, "cmp");
 
  // remover first element which is the same charity since its the most simillar
array_shift($res);

  while(count($res) > 5){
      
      array_pop($res);
  }
  
  echo json_encode($res);

?>