<?php

use Dcblogdev\PdoWrapper\Database;

class user {
public $db;
public function __construct()
{
    // make a connection to mysql here
$options = [
   //required
   'username' => 'root',
   'database' => 'apidata',
   //optional
   'password' => '',
   'type' => 'mysql',
   'charset' => 'utf8',
   'host' => 'localhost',
   'port' => '3306'
];

$this->db = new Database($options);
    
}


 public function add( $data){
   $id=$this ->db->insert('user', $data);
   return $id;
 }

 public function all(){
     $data=$this ->db->rows ("SELECT * FROM user");
    return $data;
     }



     public function update($id, $data){
  
     $res= $this->db->update('user', $data,$id);
        return $res;
         }


         public function delete($id){
           
            $res= $this->db->delete('user', ['user_id' =>$id], $limit = 1);
            return $res;
            
             }


}

