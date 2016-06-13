<?php

/**
 * Created by PhpStorm.
 * User: jonat
 * Date: 12/06/2016
 * Time: 21:59
 */
class CRUD extends ThatchDb
{
    public function query($stmt, $data_array = null)
    {
        $query = $this->pdo->prepare($stmt);
        $check_exec = $query->execute($data_array);

        if ($check_exec){
            return $query;
        } else {
            $error = $query->errorInfo();
            $this->error =  $error[2];
            
            return false;
        }
    }
}