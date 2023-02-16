<?php

    namespace App\Http\Traits;
    use App\Models\User;

    /**
     * 
     */
    trait QueryTrait
    {
        public function getUserDetails($id){
            $user = User::where(['id' => $id])->first();
            return $user;
        }
    }
    
?>
