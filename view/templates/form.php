<?php
function print_form(){  
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
     
     if($loged==false):
        
        $f= '<h3>Public WebSite</h3>       
        <section id="form_l">
        <form method="post" name="login_f">
        <label for="user_f">User</label>
        <input type="text" name="user_f" >
        <label for="psw_f">Pasword</label>
        <input type="text" name="psw_f">
        <input type="submit" name="submit_f"value="LOGIN">
        <input type="submit" name="logout_f" value="LOGOUT">
        <input type="submit" name="sesion_destroy" value="destroy session">
        </form>
        </section>';
    elseif($loged==true):
        $f = '<h3>Private section</h3>
        <section id="form_l">
        <form method="post" name="login_f">       
        <input type="submit" name="submit_f" value="Lost Password"> 
        <input type="submit" name="logout_f" value="LOGOUT">
        <input type="submit" name="sesion_destroy" value="destroy session">

        </form>
        </section>
        ';
    endif;
        
        return $f;
    }