(function(){
    document.getElementsByTagName("input")[0].value=Math.floor(Math.random() * 100000);
    document.getElementsByClassName("date")[0].innerHTML=document.getElementsByTagName("input")[0].value;
    document.querySelector(".div2").style.display="none";
}());

function add()
{
var para = document.getElementsByClassName("inventory")[0];
var a = "<tr><td><a class='cut' onclick='cut(this)' >-</a><input type='text' name='fname[]'  onkeyup='checkS(this)' ></td><td><input type='text' name='fname[]' ></td><td><input type='text' name='fname[]'></td><td><input type='text' name='fname[]'></td><td><input type='text' name='fname[]' onkeyup='somme(this)'></td><td><input type='text' name='fname[]' class='final'></td></tr>";
para.innerHTML +=a ;

}
function cut(b){
b.parentElement.parentElement.style.display = "none";
}

function div1(){
    document.querySelector(".div2").style.display="none";
    document.querySelector(".div1").style.display="block";

    }
function div2(){
    document.querySelector(".div1").style.display="none";
    document.querySelector(".div2").style.display="block";
    
        }




  


    function checkS(b)
    {   var x=b.value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementsByName("small")[0].innerHTML=this.responseText;
          }
        };
        xmlhttp.open("GET", "components/checkStock.php?to=" + x, true);
        xmlhttp.send();

    }




    function somme(b)
    {
        var x = b.parentElement.previousElementSibling.children[0].value;
       b.parentElement. nextElementSibling.children[0].value=b.value*x;
    
       total();
    }

    function total()
    {
var  x = document.getElementsByName("client[]")[4];
var k= document.getElementsByClassName("final");
var s=0;
var i=0;
for(i=0;i<=k.length-1;i++)
{
s=s+parseInt(k[i].value);
}
x.value=s;
 }