<?php

//fetch GET value
function fetch($name){
    return (isset ($_GET[$name]) ? $_GET[$name] : '');
}
    
    //fetch principle
    $principle=fetch('principle');
    
    //fetch interest
    $interest=fetch('interest');
    
    //fetch repayment
    //$repayment=fetch('repayment');
    
    // fetch loan term
    $year=fetch('year');
  
    
    //home_loan($principle,$interest,$repayment,$year);
    
    //Math to find the repayment
    
    function home_loan($principle,$interest,$year) {
         $totalInt=0;
        if ($year<=0 || $principle<=0) {
            return;
        }else{
            $interest_perYear=($principle*$interest)/100;
             $totalInt=+$interest_perYear*$year;
            $lnp=$principle+$interest_perYear*$year;
            $repayment=($lnp/$year)/12;
            $principle=$lnp-$repayment;
            home_loan($principle,$interest,$year-1);
        }
       
        return array($repayment,$totalInt,$lnp);
    }
    list($repayment,$totalInt,$lnp) = home_loan($principle,$interest,$year);
    
    //$repayment;
    //$totalInt;
    //$lnp;
    
    //$repayment=home_loan($principle,$interest,$year);
    
     //output values
    $out =array(
        'principle'=>$principle,
        'interest'=>$interest,
        'repayment'=>$repayment,
        'year'=>$year,
        'totalInt' =>$totalInt,
        'lnp' =>$lnp
    );

//output correct format
switch(strtolower(fetch('format'))){
    
    //plain text
        case 'text':
            header('Content-Type:text/plain; charset=UTF-8');
            foreach ($out as $n => $v){
                echo $n,':',$v,'\n';
            }
            break;
        
        // Output HTML
        case 'html':
            header('Content-Type:text/HTML; charset=UTF-8');
            echo "<table>\n";
            foreach($out as $n => $v){
                echo '<tr><th>',$n,'</th><td>',number_format($v,2),'</td></tr>\n';
            }
            echo "</table>";
            break;
        
        // Output XML
        case 'xml':
            header('Content-Type:text/xml; charset=UTF-8');
          $xml=new SimpleXMLElement('<cost/>');
          array_walk($out,create_function('$i,$k','global $xml;$xml->addChild($k,$i);'));
          echo $xml->asXML();
          break;
        case 'jsonp':
            header('Content-Type:application/javascript;charset=UTF');
            echo fetch('callback'),'(',json_encode($out),');';
            break;
        default:
            header('Content-Type:application/json; charset=UTF-8');
            echo json_encode($out);
            break;
}



?>
