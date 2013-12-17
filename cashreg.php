<!DOCTYPE html>

<html>
<head>
    <title>Cash Register</title>
   <link type ="text/css" rel="stylesheet" href="./css/element.css" />
</head>
   
<body>
    <div id="input_div">
        
    <article>
    <form id="cashregform" action="api/cash_register.php" method="get" >
        <fieldset>
            <legend>Cash Register</legend>
            <label for="Price">Price</label>
            <input class="cash_register" id="price" type="text" name="price" required />
            <label for="Paid">Paid</label>
            <input class="cash_register" id="paid" type="text" name="paid" required />
            
             <input type="hidden" name="format" value="json"/>
             
            <button class="cash_register" id="submit" type="submit" value="Calculate">Submit</button>
        </fieldset>
    </form>
</article>
    </div>
    
    <div id="output">
         <table>
                    <tr><th>$100 </th><td></td></tr>
                    <tr><th>$50 </th><td></td></tr>
                    <tr><th>$20 </th><td></td></tr>
                    <tr><th>$10 </th><td></td></tr>
                    <tr><th>$5 </th><td></td></tr>
                    <tr><th>$2 </th><td></td></tr>
                    <tr><th>$1 </th><td></td></tr>
                    <tr><th>50c</th><td></td></tr>
                    <tr><th>20c</th><td></td></tr>
                    <tr><th>10c</th><td></td></tr>
                    <tr><th>5c</th><td></td></tr>
                    <tr><th>1c</th><td></td></tr>
                </table>
        
    </div>


 <!--running javascript to hijack form and make an ajax call to calculate the homeloan-->
   <script src="js/ajax-cashreg.js"></script>
   
</body>


</html>
