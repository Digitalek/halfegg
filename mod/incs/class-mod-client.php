<?php
class mod_cl{

    public $_client = NULL;

    public function cl_hash($id){
        $h = rand(11,99).strlen($id).$id;    
        $this->_client = 'HEG-';
        return $this->_client.$h;
    }
  

}