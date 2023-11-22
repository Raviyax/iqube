function openNav() {
  
    if (document.getElementById("main").style.left== "60px") {
        
        document.getElementById("main").style.left = "240px";
        document.getElementById("sidebar_top").style.display = "block";
        document.getElementById("usericon").style.left = "20px";
        document.getElementById("userdetails").style.display = "block";
       
    } else {
       
       document.getElementById("main").style.left= "60px";
    
        document.getElementById("usericon").style.left = "0px";
        document.getElementById("userdetails").style.display = "none";
    }
}


