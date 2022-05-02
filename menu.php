<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" type="text/css" href="css/menuStyle.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <script src="js/menu.js"></script>
</head>

<body>
    <div class="nav">
        <img class="logo" src="img/FinalSomecopaLogo.svg" alt="logo">
        <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category" name="search" >
        <?php
        session_start();
        session_regenerate_id();
        // Turn off all error reporting
          error_reporting(0);
        if(empty($_SESSION["id"]))
        { header('Location: index.php'); exit(); }
        require 'config.php';
        $stmt = $conn->prepare("SELECT id,img_profile,nom,prenom FROM profile_employees WHERE id=? ");
        $stmt->execute(array($_SESSION["id"]));
        while ($row = $stmt->fetch()) {
            echo "<img src='img/".$row["img_profile"]."' alt='pdp'  > ";
            echo "<div class='name'>".$row["prenom"]." ".$row["nom"]."</div>" ;
        }
        ?>
       
       <a href="logout.php"> <img src="img/logout.png" alt="logout"></a>
       <img src="img/icon.png" alt="logout" width="24" height="24" onclick="hide()">
    </div>
    <div id="icons">
      <?php
        $stmt = $conn->prepare("SELECT acces FROM comptes WHERE id=? ");
        $stmt->execute(array($_SESSION["id"]));
      while ($row = $stmt->fetch()) {
        $acces= $row["acces"]  ;
         }
        $allAcces=explode(",",$acces);
       
        if (in_array("Ressource Humaine", $allAcces))
        {
         echo "<a href='R_H.php'><div class='rh'><svg class='iconRh' width='54px' height='54px' version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg'                xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 360 360'                style='enable-background:new 0 0 360 360;' xml:space='preserve'>                <g id='XMLID_232_'>                    <g id='XMLID_233_'>                        <circle id='XMLID_235_' cx='164.999' cy='120.012' r='45' />                    </g>                    <g id='XMLID_236_'>                        <path class='iconRh' id='XMLID_237_'                            d='M165,165.013c-38.659,0-70,31.337-70,70h139.999C234.999,196.35,203.658,165.013,165,165.013z' />                    </g>                    <g id='XMLID_238_'>                        <path class='iconRh' id='XMLID_239_'                            d='M355.606,334.381l-63.854-63.855C315.619,241.903,330,205.107,330,165.013c0-90.981-74.019-165-165-165			S0,74.031,0,165.013s74.019,165,165,165c40.107,0,76.914-14.391,105.541-38.271l63.853,63.853			c2.929,2.929,6.768,4.393,10.606,4.393s7.678-1.464,10.606-4.393C361.465,349.736,361.465,340.239,355.606,334.381z M30,165.013			c0-74.439,60.561-135,135-135s135,60.561,135,135c0,74.439-60.561,135-135,135S30,239.452,30,165.013z' />                    </g>                </g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>                <g></g>            </svg>            <p>                Ressource                Humaine            </p>        </div></a>";
        }
        if (in_array("Gestion De Stock", $allAcces))
        {
         echo " <a href='g_s.php'>  <div class='gs'>            <svg class='iconGs' width='54px' height='54px' viewBox='0 0 496 496' xmlns='http://www.w3.org/2000/svg'>                <path class='iconGs' d='m112 176h-64v-72h24v-16h-40v104h96v-48h-16zm0 0' />                <path class='iconGs'                    d='m80 132.6875-10.34375-10.34375-11.3125 11.3125 21.65625 21.65625 61.65625-61.65625-11.3125-11.3125zm0 0' />                <path class='iconGs'                    d='m328 384c-22.054688 0-40 17.945312-40 40s17.945312 40 40 40 40-17.945312 40-40-17.945312-40-40-40zm0 64c-13.230469 0-24-10.769531-24-24s10.769531-24 24-24 24 10.769531 24 24-10.769531 24-24 24zm0 0' />                <path class='iconGs'                    d='m473.3125 48.105469-87.402344-17.480469-36.175781 160.765625-173.734375-34.75v-156.640625h-123.3125l-52.6875 52.6875v171.3125h88.160156l-22.703125 104.457031c-9.953125 1.824219-18.128906 9.269531-20.664062 19.382813l-4.058594 16.222656c-.488281 1.960938-.734375 3.976562-.734375 6 0 11.9375 8.511719 22.167969 20.246094 24.34375l196.097656 36.3125c3.398438 36.5625 34.222656 65.28125 71.65625 65.28125 39.695312 0 72-32.296875 72-72 0-11.617188-2.832031-22.558594-7.734375-32.28125l40.167969-176.75-25.625-50.847656 15.605468-68.28125 38.050782 7.609375c1.824218.367187 3.6875.550781 5.535156.550781h1.777344c15.558594 0 28.222656-12.664062 28.222656-28.222656 0-13.410156-9.542969-25.042969-22.6875-27.671875zm-260.511719 132.214843 24.261719 4.855469-10.726562 37.535157-24.265626-4.855469zm40 8 24.261719 4.855469-10.726562 37.535157-24.265626-4.855469zm-204.800781-161.007812v20.6875h-20.6875zm-32 36.6875h48v-48h96v192h-144zm160 160v-51.039062l21.0625 4.214843-15.132812 52.976563 95.734374 19.152344 15.136719-52.984376 53.421875 10.6875-32.964844 146.527344c-12.195312 2.554688-23.226562 8.226563-32.3125 16.097656l-199.402343-39.878906 22.992187-105.753906zm-120 146.0625c0-.71875.089844-1.429688.265625-2.125l4.054687-16.21875c1.304688-5.191406 6.695313-8.558594 11.878907-7.519531l196.34375 39.273437c-6.207031 9.070313-10.335938 19.648438-11.839844 31.046875l-193.542969-35.839843c-4.152344-.777344-7.160156-4.398438-7.160156-8.617188zm272 109.9375c-30.878906 0-56-25.128906-56-56s25.121094-56 56-56 56 25.128906 56 56-25.121094 56-56 56zm33.921875-119.480469 10.484375-45.878906 20.066406 4.007813-12.617187 55.519531c-5.222657-5.425781-11.253907-10.054688-17.933594-13.648438zm27.269531-119.328125 19.96875 3.992188-13.152344 57.855468-20.039062-4.007812zm26.367188-24.160156-2.855469 12.554688-19.949219-3.992188 8.460938-37.019531zm-68.703125 137.5625c-5.40625-1.472656-11.046875-2.328125-16.878907-2.488281l59.152344-262.921875 17.582032 3.519531zm120.921875-266.59375h-1.777344c-.808594 0-1.609375-.078125-2.398438-.238281l-70.960937-14.195313 5.4375-24.191406 72.082031 14.417969c5.703125 1.144531 9.839844 6.183593 9.839844 11.984375 0 6.734375-5.488281 12.222656-12.222656 12.222656zm0 0' />                </svg>            <p>                Gestion De                Stock            </p>        </div></a>"   ;   
         }
         if (in_array("Discuter", $allAcces))
        {
            echo "   <a href='discuter.php'>     <div class='msg'>            <svg class='iconMsg' width='54px' height='54px' aria-hidden='true' focusable='false' data-prefix='fas'                data-icon='comments' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512'>                <path class='iconMsg' fill='currentColor'                    d='M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z'>                </path>            </svg>            <p>                Discuter            </p>        </div></a>";          
        }
         if (in_array("Documents", $allAcces))
         {
           echo "        <div class='doc'>            <svg class='iconDoc' width='54px' height='54px' aria-hidden='true' focusable='false' data-prefix='fas'                data-icon='folder-open' class='svg-inline--fa fa-folder-open fa-w-18' role='img'                xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512'>                <path class='iconDoc' fill='currentColor'                    d='M572.694 292.093L500.27 416.248A63.997 63.997 0 0 1 444.989 448H45.025c-18.523 0-30.064-20.093-20.731-36.093l72.424-124.155A64 64 0 0 1 152 256h399.964c18.523 0 30.064 20.093 20.73 36.093zM152 224h328v-48c0-26.51-21.49-48-48-48H272l-64-64H48C21.49 64 0 85.49 0 112v278.046l69.077-118.418C86.214 242.25 117.989 224 152 224z'>                </path>            </svg>            <p>                Documents            </p>        </div>";
         }
         if (in_array("Notes", $allAcces))
         {
            echo " <a href='notes.php'>        <div class='notes'>            <svg class='iconNotes' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='clipboard'                role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512'>                <path class='iconNotes' fill='currentColor'                    d='M384 112v352c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h80c0-35.29 28.71-64 64-64s64 28.71 64 64h80c26.51 0 48 21.49 48 48zM192 40c-13.255 0-24 10.745-24 24s10.745 24 24 24 24-10.745 24-24-10.745-24-24-24m96 114v-20a6 6 0 0 0-6-6H102a6 6 0 0 0-6 6v20a6 6 0 0 0 6 6h180a6 6 0 0 0 6-6z'>                </path>            </svg>            <p>                Notes            </p>        </div> </a>";
        }
        if (in_array("Ventes", $allAcces))
        {
         echo "<a href='vente.php'> <div class='ventes'>            <svg class='iconVentes' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='shopping-cart'                role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512'>                <path class='iconVentes' fill='currentColor'                    d='M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z'>                </path>            </svg>            <p>                <br>                Ventes            </p>        </div></a>";  
             }
     
         if (in_array("Notification", $allAcces))
             {
          echo " <a href='notifications.php'><div class='notification'>            <svg class='iconNotification' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='bell'                role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'>                <path class='iconNotification' fill='currentColor'                    d='M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z'>                </path>            </svg>            <p>                Notification            </p>        </div></a>";
            }
            if (in_array("Depenses", $allAcces))
             {
            echo " <a href='depenses.php'>   <div class='depenses'>            <svg class='iconDepenses' aria-hidden='true' focusable='false' data-prefix='fas'                data-icon='hand-holding-usd' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512'>                <path class='iconDepenses' fill='currentColor'                    d='M271.06,144.3l54.27,14.3a8.59,8.59,0,0,1,6.63,8.1c0,4.6-4.09,8.4-9.12,8.4h-35.6a30,30,0,0,1-11.19-2.2c-5.24-2.2-11.28-1.7-15.3,2l-19,17.5a11.68,11.68,0,0,0-2.25,2.66,11.42,11.42,0,0,0,3.88,15.74,83.77,83.77,0,0,0,34.51,11.5V240c0,8.8,7.83,16,17.37,16h17.37c9.55,0,17.38-7.2,17.38-16V222.4c32.93-3.6,57.84-31,53.5-63-3.15-23-22.46-41.3-46.56-47.7L282.68,97.4a8.59,8.59,0,0,1-6.63-8.1c0-4.6,4.09-8.4,9.12-8.4h35.6A30,30,0,0,1,332,83.1c5.23,2.2,11.28,1.7,15.3-2l19-17.5A11.31,11.31,0,0,0,368.47,61a11.43,11.43,0,0,0-3.84-15.78,83.82,83.82,0,0,0-34.52-11.5V16c0-8.8-7.82-16-17.37-16H295.37C285.82,0,278,7.2,278,16V33.6c-32.89,3.6-57.85,31-53.51,63C227.63,119.6,247,137.9,271.06,144.3ZM565.27,328.1c-11.8-10.7-30.2-10-42.6,0L430.27,402a63.64,63.64,0,0,1-40,14H272a16,16,0,0,1,0-32h78.29c15.9,0,30.71-10.9,33.25-26.6a31.2,31.2,0,0,0,.46-5.46A32,32,0,0,0,352,320H192a117.66,117.66,0,0,0-74.1,26.29L71.4,384H16A16,16,0,0,0,0,400v96a16,16,0,0,0,16,16H372.77a64,64,0,0,0,40-14L564,377a32,32,0,0,0,1.28-48.9Z'>                </path>            </svg>            <p>                Depenses            </p>        </div></a>";            }
           
            if (in_array("Contacts", $allAcces))
            {
            echo "<a href='contacts.php'><div class='contacts'>            <svg class='iconContacts' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='address-book'                class='svg-inline--fa fa-address-book fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg'                viewBox='0 0 448 512'>                <path class='iconContacts' fill='currentColor'                    d='M436 160c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h320c26.5 0 48-21.5 48-48v-48h20c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20v-64h20c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20v-64h20zm-228-32c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64 28.7-64 64-64zm112 236.8c0 10.6-10 19.2-22.4 19.2H118.4C106 384 96 375.4 96 364.8v-19.2c0-31.8 30.1-57.6 67.2-57.6h5c12.3 5.1 25.7 8 39.8 8s27.6-2.9 39.8-8h5c37.1 0 67.2 25.8 67.2 57.6v19.2z'>                </path>            </svg>            <p>                Contacts            </p>        </div></a>" ;
            }
            if (in_array("Graphiques", $allAcces))
            {
            echo "  <a href='graphique.php'>    <div class='graphiques'>            <svg class='iconGraphiques' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chart-bar'                role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>                <path class='iconGraphiques' fill='currentColor'                    d='M332.8 320h38.4c6.4 0 12.8-6.4 12.8-12.8V172.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V76.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-288 0h38.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zM496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z'>                </path>            </svg>            <p>                Graphiques            </p>        </div> </a>";            }
            




      ?>
    </div>
<div class="n">
</br>
<?php
$a=date("Y/m/d");
           $stmt = $conn->prepare("SELECT * FROM notification where id=? and date=?");
           $stmt->execute(array($_SESSION["id"],$a));
           while ($row = $stmt->fetch()) {
echo "<b>".$row["text"]."</b></br><small>".$row["date"]."</small></br></br>";
}   

            
            ?>
</div>
<?php
$count=$stmt->rowCount();
if ($count>0){
echo "<div class='r'>".$count."</div>";
}
?>


    <script>
function myFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("icons");
  li = ul.getElementsByTagName("div");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("P")[0];
      if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>

</body>

</html>