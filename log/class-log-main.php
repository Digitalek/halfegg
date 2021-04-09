<?php
/*
    LOG = Controller
*/
# constants
require_once(dirname(__DIR__).'/config.php'); 
# session start
if(!isset($_SESSION)){
  session_start();  
}
# includes
require_once (HOMPATH.'/mod/class-mod-main.php');
require_once (HOMPATH.'/view/class-view-main.php');
# inst validation class
$hg = new val_client;
# get session
if($hg->_sess==true):
  if(!empty($_SESSION['login'])):
  $us_dat=$hg->_sess;
  // get user ID
    $g_id=str_split($us_dat['HASH']);
    $id_l=$g_id[6];
    $get_id='';
      for ($i=0; $i < $id_l; $i++) { 
        $get_id .=$g_id[$i+7];
      }  
   $user_dat= $hg->val_user($get_id);
   $user_lic= $hg->val_lic($get_id);
  else:
    $user_dat=NULL;
    $us_dat=NULL;
    $user_lic=NULL;
  endif;
else:
  $user_dat=NULL;
  $us_dat=NULL;
  $user_lic=NULL;
endif;
# inst view class
$hs = new view_main($hg->_sess,$user_dat,$user_lic);
# destroy session
if(isset($_POST['sesion_destroy'])){
    session_destroy();
    echo 'Are you sure? This will logout and erase current session savings.<a href="'.MANPATH.'/'.PREFIX.'-'.VERSION.'">YES</a>';
  }
# Expiration
  if(!empty($_SESSION['login'])):
    $dt = new DateTime(); 
    $tmp = $dt->getTimestamp();
    $ses_tmp = $_SESSION['login']['TIMESTAMP'];  
    if($tmp >$ses_tmp+3600){    
      echo "sesion expired";
      unset($_SESSION['login']);
      unset($_SESSION['logout']);
      session_destroy();  
    }
  endif;