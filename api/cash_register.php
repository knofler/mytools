         <?php
         
         //use this function to grab input from html form
       function fetch($name){
       
       return (isset($_GET[$name])? $_GET[$name]:''); 
       }
       
       $price=fetch('price');
       $paid=fetch('paid');
       
       
         //Define Object
         class Cash_register{

         public  $coinNames=array('Hundred Dollar Bills','Fifty Dollar Bills','Twenty Dollar Bills','Ten Dollar Bills','five dollar bills','Two dollar bills', 'one dollar bills', 'fifty cents', 'Twenty cents', 'Ten cents','Five cents','One cent');         
         public  $currency=array(100.00,50.00,20.00,10.00,5.00,2.00,1.00, 0.5, 0.20, 0.1,0.05,0.01);
         
         public $out=array();
         
         public $coinsSoFar=0;
         
         //public $cost=100;
         public $change=0;
         
         function __construct($price){
          
          $this->price = $price;
         }
              
             function get_paid($paid){
              if($this->price > $paid){
                       echo 'Please match the marked price. <br />';
              }else{
                  $this->change=$paid-$this->price;
                 //echo 'Change returned to customer is:  ', $this->change;
                  $this->makeChange($this->coinNames,$this->currency,0);
              }
              
             }
             
             
             function howManyCoins($coinName, $coinAmount, $coinsSoFar){
                  
                  if ($this->change<$coinAmount){
                                
                         
                        //echo $this->coinsSoFar , $coinName;
                       $this->out[]=$coinsSoFar;
                       
                  }else{
                           $this->change-=$coinAmount;
                           $this->howManyCoins($coinName, $coinAmount, $coinsSoFar+1);
                  }
               
             }
       
             
             function makeChange($coinNames,$currency,$index){
                  
                  if ($index >= count($currency) ){
                           
                           return;
                  }else{
                           $this->howManyCoins($coinNames[$index],$currency[$index],0);
                           $this->makeChange($coinNames,$currency,$index+1);     
                  }
                  
             }
             
             
             
         };
         
         $my_cashreg = new Cash_register($price);
         
           $my_cashreg->get_paid($paid);
           
 
          $coin_count=$my_cashreg->out;  
            
            
            $out =array(
         'hundred'=>$coin_count[0],
         'fifty'=>$coin_count[1],
         'twenty'=>$coin_count[2],
         'ten'=>$coin_count[3],
         'five'=>$coin_count[4],
         'two'=>$coin_count[5],
         'one'=>$coin_count[6],
         'fifty_cent'=>$coin_count[7],
         'twenty_cent'=>$coin_count[8],
         'ten_cent'=>$coin_count[9],
         'five_cent'=>$coin_count[10],
         'one_cent'=>$coin_count[11]
        
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