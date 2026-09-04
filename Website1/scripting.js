var display = 1;
var main = document.getElementsByTagName('main');
var menucontainer = document.getElementById('menu-container');
var menudiv = document.getElementById('menu-div');
var menuButton = document.getElementById('menu-button').
addEventListener("click",function(){
if(display == 1){
    menucontainer.style.marginBotton = '-35px';
    menucontainer.style.transition = '2s';
    main.style.height = '100%'
    display = 0;
}
else{
    menucontainer.style.marginBottom = '35px';
    menudiv.style.top = '0vh';
    display = 1;

} 
});


var div1 = document.getElementById('div1');
var div2 = document.getElementById('div2');
const divs = [div1,div2];
const test = ["names","More name","And even more"];

var nextbutton = document.getElementById('next-button').
addEventListener("click",function(){
   if(display == 1){
        div1.style.marginLeft = '-40px';
        div1.style.transition = '2s';
        display = 0;
   }else{
        div1.style.marginLeft = '40px'
        display = 1;
   }
});


        