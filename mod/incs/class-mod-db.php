<?php
class mod_db{
    # Return 
    private $user_db;  
    # DDBB QUERY
    public function conn_db($con,$query){
        # constant
        $sbname= NAMBDAT;
        $sbhost= HOSBDAT;
        # conect 
		try {
			$dsn = "mysql:host=$sbhost;dbname=$sbname";
			$dbh = new PDO($dsn, 'root',''); // user & pasword
		} catch (PDOException $poet){
			$poet->getMessage();
        }	   
        # query  
        if($con==1):
        $see = "select * from users;";
        elseif($con==3):            
        $see = "SELECT * FROM users WHERE nombre LIKE '$query';"; 
        elseif($con==6):            
            $see = "SELECT * FROM users WHERE id LIKE '$query';"; 
        elseif($con==7):               
            $see = "SELECT lic_id FROM users WHERE id LIKE '$query';"; 
        elseif($con==9):               
           $see = "SELECT * FROM licencias WHERE id LIKE '$query';"; 
        else:
        $see = "select hash from users;";
        endif;
     
        if(@$dbh!==NULL):
            $stmt = $dbh->prepare($see);	
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();	
            $user_db=array();		
            while ($row = $stmt->fetch()){
                array_push($user_db,$row);						
            }
            $this->user_db=$user_db;        
            # close connection
            $dbh = NULL;
            # return  value      
            return $this->user_db;
        else:
            # return  value NULL 
            $this->user_db = NULL;
            return $this->user_db;
        endif;
    }

}