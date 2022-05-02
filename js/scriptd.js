function goDown(){
  var objDiv = document.getElementsByClassName("messanger")[0];
 var t=objDiv.scrollHeight+20;
  objDiv.scrollTop = t;
}
(function (){
 var x= document.getElementsByClassName("chats-item")[0].getAttribute('value') ;
 var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementsByClassName("messanger-list")[0].innerHTML=this.responseText;
      }
    };
    xmlhttp.open("GET", "components/affmessages.php?to=" + x, true);
    xmlhttp.send();
    localStorage.setItem("current", x);
    console.log(localStorage.getItem("current"));
    goDown();
})();
 
 function rootFolder(b) {
  goDown();
        var x=b.getAttribute('value');
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementsByClassName("messanger-list")[0].innerHTML=this.responseText;
          }
        };
        xmlhttp.open("GET", "components/affmessages.php?to=" + x, true);
        xmlhttp.send();
        localStorage.setItem("current", x);
        console.log(localStorage.getItem("current"));
       
    }
 function addMessage(){
 var x= document.getElementsByClassName("text-input")[0].value;
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          }
        };
        xmlhttp.open("GET", "components/sendmessage.php?to="+localStorage.getItem("current")+"&content="+x, true);
        xmlhttp.send();
        goDown();
 }

 function refresh() {
  var x=localStorage.getItem("current");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementsByClassName("messanger-list")[0].innerHTML=this.responseText;
    }
  };
  xmlhttp.open("GET", "components/affmessages.php?to=" + x, true);
  xmlhttp.send();
  console.log("done");

}

setInterval(function(){ refresh(); }, 3000);

