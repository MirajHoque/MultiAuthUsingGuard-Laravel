<?php
namespace App\Gates;

class AdminGate{
    public function isAdmin($user){
        foreach($user->roles as $role){
            if($user->id == $role->id){
                return true;
            }
            else{
                return false;
            }
           
        }
    }
}


?>