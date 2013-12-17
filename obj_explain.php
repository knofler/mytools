         <?php
         
         //Define Object
         class cash_register{
         
         //public $total=100;
          function __construct($cost,$total,$name) {
                   
                   $this->name=$name;
               }
               
             public function setTotal($total){
              
              $this->total=$total;
             }
             
             public function change($amount_paid){
                 $change=$amount_paid-$this->total; return $change;
             }
             
             
             public function get_paid($amount_paid){
              if($this->total > $amount_paid){
                       
                       echo 'Please match the marked price';
              }else{
                       
                       $this->change($amount_paid);
              }
              
             }
             
              public function extendTest($name){
              
              echo 'This is inside a class and testing function ',$this->name, '<br/>';
             }
             
             
             public static function hello($name){
              
              echo 'Hello Mr ',$name, ' This is pulled from scope and direct access to class because of static option.<br/>';
             }
             
         };
         
         
         //Create New Instance of the Class
         $mycashreg= new cash_register(23,50,"rumman");
         
             if (is_a($mycashreg, "cash_register")) {
               echo "Ready to open cash register,Object is copied well. <br />";
             }
             if (property_exists($mycashreg, "total")) {
               echo 'Total cash I have in my register is ', $mycashreg->total , '<br />';
             }
             if (method_exists($mycashreg, "change")) {
               echo "found change function as well to do the work <br />";
             }
             
             
             //use functions from objects
              $mycashreg->setTotal(99);
              $mycashreg->extendTest();
              
              echo 'Change returned to customer is', $mycashreg->change(93), '<br />';
             
            //Access function directly from Class
            cash_register::hello("Rumman");
            
             
         //Extend Class to new Object and modify function from Parent Class
         class Overwrite extends cash_register{
              public function extendTest($name){         
              echo "Now this is same Extend Test function, but displaying different function because of override function,Dont worry about my name";
              }
         }
         
         //Create new instances from new Extended class.
         $new_overwrite = new Overwrite();
         
         //Use function from new class
         echo $new_overwrite->extendTest();
         
         ?>