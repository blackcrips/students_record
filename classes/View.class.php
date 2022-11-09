<?php

class  View extends Model
{
    public function getUserDetails()
    {
        $email = $_SESSION['login-details']['user-email'];
        return $this->getSingleDetails($email);
    }

    public function getTasks()
    {
        if(!isset($_POST['user-email'])){
            header("LOCATION: ../");
        }

        $email = htmlspecialchars($_POST['user-email']);

        return $this->getAllTask($email);
    }
}