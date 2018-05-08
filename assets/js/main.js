(function(){
    
    var selectCustomer, fname, lname, street, zip, city ;
    function init(){
        
        selectCustomer = document.querySelector('[name="selectCustomers"]');
         fname = document.querySelector('[name="fname"]');
          lname = document.querySelector('[name="lname"]');
           street = document.querySelector('[name="address"]');
            zip = document.querySelector('[name="zip"]');
             city = document.querySelector('[name="city"]');
         ajax('get', 'customersGetAll.php', {}, fillSelectCustomers);

function fillSelectCustomers(json){
//    console.log(json);
var data = JSON.parse(json);
console.log(data);
    for(var i = 0; i < data.length; i++){
      
            var opt = document.createElement('option');
            opt.text = data[i].firstname +' '+ data[i].lastname;
            opt.value =data[i].cid;
//   console.log(provinces[i]);
            selectCustomer.appendChild(opt);
        
        
//        selectCustomer.innerHTML = data["0"].cid +' '+ data["0"].firstname +' '+data["0"].lastname
//        fname.innerHTML = data["0"].firstname;
//        lname.innerHTML = data["0"].lastname;
//        street.innerHTML = data["0"].street;
//        zip.innerHTML = data["0"].zip;
//        city.innerHTML = data["0"].city;
//     
    }

    }
   
    
    
}


//for(var i = 0; i < data.length; i++){
//        fname.innerHTML = data["0"].firstname;
//        lname.innerHTML = data["0"].lastname;
//        street.innerHTML = data["0"].street;
//        zip.innerHTML = data["0"].zip;
//        city.innerHTML = data["0"].city;
//     
//    }










window.addEventListener('load', init);
})();
