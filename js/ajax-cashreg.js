// XMLHttpRequest
var Lib = Lib || {};

Lib.Ajax = (function() {

	// hijack form
	function Hijack(form, callback) {
	
		var args = {};
		
		for (var i = 0; i < form.elements.length; i++) {
			var f = form.elements[i];
			if (f.name) args[f.name] = f.value;
		}

		// make Ajax call
		Call(form.action, args, form.method, callback);
	
	}

    
    //call web services
    function Call(url, args, type, callback) {
        
        //check type (GET or POST)
        type=(type || "GET").toUpperCase();
        
        //create argument list
        args=args || {};
        var arglist="";
        
        for (var n in args) {
            arglist += "&" + n + "=" + escape(args[n]);
        }
        
        if (arglist.length>0) {
            arglist =arglist.substr(1);
        }
        
        //append args to GET URL
        if (type=="GET") {
            url +="?" +arglist;
            arglist=null;
        }
        
        //XMLHttpRequest object
        var xhr= new XMLHttpRequest();
        xhr.open(type,url,true);
        
        //callback function
        if (callback) {
            xhr.onreadystatechange = function(){
                if (xhr.readyState==4 && xhr.status==200) {
                    callback(xhr.responseText);
                }
            };
        }
        
        //open request
        
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");
        xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");
        xhr.send(arglist);
    }
    
    return {
              Hijack: Hijack,
		Call: Call
    };

 }());
 
 
 //Start
 
 var
    
    cashregform=document.getElementById("cashregform"),
    output=document.getElementById("output"),
    td=output.getElementsByTagName("td");
   
    
 //form submit  - direct to Ajax Call
 cashregform.addEventListener("submit",function(e){
    e.preventDefault();
    Lib.Ajax.Hijack(cashregform,function(r){
       
        r=JSON.parse(r);
         td[0].textContent = r.hundred;
	 td[1].textContent = r.fifty;
	 td[2].textContent = r.twenty;
	 td[3].textContent = r.ten;
	 td[4].textContent = r.five;
	 td[5].textContent = r.two;
	 td[6].textContent = r.one;
	 td[7].textContent = r.fifty_cent;
	 td[8].textContent = r.twenty_cent;
	 td[9].textContent = r.ten_cent;
	 td[10].textContent =r.five_cent;
	 td[11].textContent = r.one_cent;
    });
 
 });
    
    
        
 
 