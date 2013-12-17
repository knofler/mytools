 function home_loan(principle,interest,repayment,year) {
        document.write('Loan starts as <strong>' + principle + '</strong> on year <strong>' + year + '</strong><br />');
        if (year>=30 || principle<=0) {
            return;
        }else{
            var lnp=principle+((principle*interest)/100)*year;
            document.write('Total loan and principle on year <strong>' + year + '</strong> is <strong>'+ lnp + '</strong><br />');
            principle=lnp-repayment;
            //amount-=payment;
            document.write('After year <strong>' + year + '</strong> loan and principle is <strong>' + principle + '</strong><br /><br />');
            //document.write(remain + '<br />');
            home_loan(principle,interest,repayment,year+1);
        }
    }