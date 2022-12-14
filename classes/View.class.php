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

        if(strtolower($selectValue) == "all"){
            return $this->getAllStudentsData();
        } else {
            return $this->listBySelectValue($selectValue);
        }        
    }

    public function getStudentRecord($studentId)
    {
        if(!$this->singleStudentRecord($studentId)){
            exit(json_encode(false));
        } else {
            exit(json_encode($this->singleStudentRecord($studentId)));
        }
    }
    
}