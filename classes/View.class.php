<?php

class  View extends Model
{
    public function getStudentCount()
    {
        return $this->studentCount();
    }

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

    public function getTask()
    {
        if(!isset($_POST['task-id'])){
            header("LOCATION: ../");
        }

        $taskId = htmlspecialchars($_POST['task-id']);

        return $this->getSingleTask($taskId);
    }

    public function getAllStudents()
    {
        if(!isset($_POST['request_status'])){
            header('LOCATION: ../');
            exit();
        }
        return $this->getAllStudentsData();
    }

    public function getSchoolRecord()
    {
        if(!isset($_POST['request_status'])){
            header("LOCATION: ../");
            exit();
        }

        $stdId = htmlspecialchars($_POST['student_id']);

        return $this->schoolRecord($stdId);
    }

    public function viewBySelectValue()
    {
        if(!isset($_POST['request_status'])){
            header("LOCATION: ../status403.php");
            exit();
        }

        $selectValue = htmlspecialchars($_POST['request_status']);

        return $this->listBySelectValue($selectValue);
    }
    
}