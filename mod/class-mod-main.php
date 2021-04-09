<?php
error_reporting(E_ALL);
# includes
require_once (HOMPATH.'/mod/incs/class-mod-db.php');
require_once (HOMPATH.'/mod/incs/class-mod-client.php');
// get database users table


class val_client{
  public $_sess = NULL;
  public function __construct(){  
    $date = new DateTime();    
    $data=array();    
    # database conection
    $cl=new mod_db();     
    # login
    if(
      # front end form validation 
      isset($_POST['user_f'])&&$_POST['user_f']
      &&isset($_POST['psw_f'])&&$_POST['psw_f']
      &&isset($_POST['submit_f'])){   
        # DB validation
        if(!empty($cl->conn_db(3,$_POST['user_f'])[0]['nombre'])&&!empty($_POST['psw_f'])):        
          $user_dat= $cl->conn_db(3,$_POST['user_f']);
          # PSW validation
          if($user_dat[0]['contrasena']==$_POST['psw_f']): 
              # 
              $data['LABEL']='Client LOGED IN';
              # 
              $data['TIMESTAMP']=$date->getTimestamp();
              # create hash
              $hs= new mod_cl;
              $hash = $hs->cl_hash($user_dat[0]['id']);
              $data['HASH']=$hash;              
              $_SESSION['login'] = $data;
              # 
              $this->_sess= $data;
              #      
              unset($_SESSION['logout']); 
              #
              return $this->_sess;
          endif;
        endif;
      }
    # logout
    elseif(isset($_POST['logout_f'])&&!isset($_SESSION['logout'])){  
      $data['LABEL']='Client is loged out';
      $data['TIMESTAMP']=$date->getTimestamp();
      $data['HASH']=NULL; 
        $_SESSION['logout'] = $data;
        $this->_sess= $data;
        unset($_SESSION['login']);
        return $this->_sess;      
    }  
    # Default
    else{
          if(!empty($_SESSION['login'])){
            $_session = $_SESSION['login'];               
        }
        elseif(!empty($_SESSION['logout'])){
          $_session =  $_SESSION['logout'];             
        }
        else{
          $_session =  NULL; 
        }
      $this->_sess= $_session;
      return $this->_sess;
    }
  }

  public function val_user($us_id){
    $us_cl=new mod_db(); 
    return $us_cl->conn_db(6,$us_id);
  }

  public function val_lic($us_id){
    $u_l=new mod_db();
    $lic_id= $u_l->conn_db(7,$us_id); 
    $id_lic = $u_l->conn_db(9,$lic_id[0]['lic_id']);
    return $id_lic;
   
  }

}