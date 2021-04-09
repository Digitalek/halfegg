<?php
function print_head($pref,$name,$desc){


    if(isset($_SESSION['login'])){
        $_session=$_SESSION['login'];  
        $loged=true;
     }
     elseif(isset($_SESSION['logout'])){
         $_session= $_SESSION['logout'];    
         $loged=false;
     }
     else{
         $_session ='NULL';
         $loged=false;
     }

    $h= '<html>
<head>
    <title>'.$pref.'</title>
</head>
<body>
<h1>'.$name.'</h1>
<h3>'.$desc.'</h3>';

if($loged==false):
    $h.=
   
    ' <nav>
    <ul><li><a href="'.MANPATH.'/'.BASPATH.'">HOME</a></li>
    <li><a href="'.MANPATH.'/'.BASPATH.'/link.php">Account</a></li>
    </ul>
    </nav>';
elseif($loged==true):
    $h.=' <nav>
    <ul><li><a href="'.MANPATH.'/'.BASPATH.'">HOME</a></li>
    <li><a href="'.MANPATH.'/'.BASPATH.'/link.php">Account</a></li>
    </ul>
    </nav>';
else:
endif;
return $h;
}