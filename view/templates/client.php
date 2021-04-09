<?php
function print_client($us_dat,$us_lic){
        if(!empty($_SESSION['login'])&&!isset($_SESSION['logout'])){
            $cc = '<section><h3>Private seccion aca se muestra la parte de la bbdd para este usuario</h3>';       
            $cc .='<p>Nombre: '.$us_dat[0]['nombre'].'</p>';
            $cc .='<p>email: '.$us_dat[0]['email'].'</p>';
            if(!empty($us_lic)){
                $cc .='<p>Licence ID: '.$us_lic[0]['id'].'</p>';
                $cc .='<p>Licence key: '.$us_lic[0]['l_key'].'</p>';
                $cc .='<p>Licence status: ';
                if($us_lic[0]['status']==0):
                    $cc.='unactive</p>';
                elseif($us_lic[0]['status']==-1):
                    $cc.='admin</p>';
                elseif($us_lic[0]['status']==1):
                    $cc.='active</p>';
                else:
                    $cc.='unknown</p>';
                endif;
                $cc .='<p>Licence created on: '.$us_lic[0]['timestamp'].'</p>';
            }
            else{
                $cc .= '<p>There is no license attached to this account</p>';
            }
            $cc.=  '</section>';
        }
        else{
            $cc=NULL;        
        }
    return $cc;
}