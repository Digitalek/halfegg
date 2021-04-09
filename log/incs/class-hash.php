<?php

#
# COOKIE  ID HASH
#

class hash_init{

    public $hash = NULL;

    public function __construct(){

        $rnd = rand(1000,9999);

        $this->hash = $rnd;
        return $this->hash;

    }

}