var display = 1;

function errorDisplay(){
    if(display == 1){
        document.getElementById("error-display-div").
        style.height = "10px";
        
        
        
        document.querySelector("button").
        innerHTML = '<p>Clicked Again For Error Report</p>';
        
        display = 0;
        
    }else{
        
        document.getElementById("error-display-div").
        style.height = "max-content";
        
      
        
        document.querySelector("button").
        innerHTML = '<p>Error report</p>';
        
        
        display = 1;
    }
    
};



