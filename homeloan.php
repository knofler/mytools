<!DOCTYPE html>

<html>
<head>
    <title>Home Loan</title>
   <link type ="text/css" rel="stylesheet" href="./css/element.css" />
</head>
<script src="homeloan.js"></script>
   
    <script>
        //var form_submit=document.getElementById("submit");
        //form_submit.addEventListener("click",home_loan);
        //home_loan(535000,5.05,36000,1);
    </script> 

<body>
    <div id="input_div">
        
    <article>
    <form id="homeform" action="api/home_loan.php" method="get" >
        <fieldset>
            <legend>Home Loan Calculator</legend>
            <label for="principle">Principle</label>
            <input class="Home_loan" id="principle" type="text" name="principle" required />
            <label for="interest">Interest</label>
            <input class="Home_loan" id="interest" type="text" name="interest" required />
           <!-- <label for="repayment">Repayment</label>
            <input class="Home_loan" id="repayment" type="text" name="repayment" />-->
            <label for="year">Loan Term</label>
            <input class="Home_loan" id="year" type="text" name="year" />
            
             <input type="hidden" name="format" value="json"/>
             
            <button class="Home_loan" id="submit" type="submit" value="Calculate">Submit</button>
        </fieldset>
    </form>
</article>
    </div>
    
    <div id="output">
         <table>
                    <tr><th>Principle</th><td></td></tr>
                    <tr><th>Interest</th><td></td></tr>
                    <tr><th>Repayment</th><td></td></tr>
                    <tr><th>Loan Term</th><td></td></tr>
                    <tr><th>Total interest</th><td></td></tr>
                    <tr><th>Priniciple and Interest</th><td></td></tr>
                </table>
        
    </div>


 <!--running javascript to hijack form and make an ajax call to calculate the homeloan-->
   <script src="js/ajax-homeloan.js"></script>
   
</body>


</html>
