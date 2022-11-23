<?php


class Model extends Dbh
{
    protected function validLogin($username,$password)
    {
        $sql = "SELECT * FROM user_accounts WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $rowCount = $stmt->rowCount();

        $results = $stmt->fetch();

        if($rowCount == 0){
            return false;
        } else {
            if(!password_verify($password,$results['password'])){
                return false;
            } else {
                return true;
            }
        }
    }

    protected function insertLoginAction($device,$ipAddress,$location)
    {
        $sql = "INSERT INTO user_action (`device`,`ip_address`,`location`) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$device,$ipAddress,$location]);
        return;
    }

    protected function getPrivilege($email)
    {
        $sql = "SELECT privilege FROM user_accounts WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }

    protected function getSingleDetails($email)
    {
        $sql = "SELECT firstname,lastname,email FROM user_details WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        $result = $stmt->fetch();
        return $result;
    }

    protected function getUserId($email)
    {
        $sql = "SELECT id FROM user_accounts WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        $result = $stmt->fetch();
        return $result['id'];
    }

    protected function getAllTask($email)
    {
        $userId = $this->getUserId($email);

        $sql = "SELECT id,task_name,content,target_date,bgColor,fColor FROM tasks WHERE user_id = ? AND status = 'active'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId]);

        
        if($stmt->rowCount() == 0) {
            return;
        } else {
            $result = $stmt->fetchAll();
            exit(json_encode($result));
        }
        
    }

    protected function getSingleTask($taskId)
    {
        $sql = "SELECT id,task_name,content,target_date,bgColor,fColor FROM tasks WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$taskId]);

        
        if($stmt->rowCount() == 0) {
            return;
        } else {
            $result = $stmt->fetch();
            exit(json_encode($result));
        }
        
    }

    protected function validateTaskAction($taskId)
    {
        $sql = "SELECT user_id FROM tasks WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$taskId]);

        $userId = $stmt->fetch();

        $sql = "SELECT email FROM user_details WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId['user_id']]);

        $result = $stmt->fetch();

        return $result;
        
    }

    protected function addNewTask($taskName,$userId,$taskDescription,$bgColor,$fColor,$taskTargetDate)
    {
        $sql = "INSERT INTO tasks (`task_name`,`user_id`,`content`,`bgColor`,`fColor`,`target_date`,`status`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute([$taskName,$userId,$taskDescription,$bgColor,$fColor,$taskTargetDate,'Active'])){
            echo "<script>alert('Error adding task')</script>";
            echo "<script>window.location.href = '../addNewTask.php'</script>";
        }
    }

    protected function editOldTask($taskName,$taskDescription,$bgColor,$fColor,$taskTargetDate,$taskId)
    {
        $sql = "UPDATE tasks SET `task_name` = ?, `content` = ?, `bgColor` = ?, `fColor` = ?, `target_date` = ? WHERE `id` = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute([$taskName,$taskDescription,$bgColor,$fColor,$taskTargetDate,$taskId])){
            echo "<script>alert('Error updating task')</script>";
            echo "<script>window.location.href = '../'</script>";
        }
    }

    protected function finishTask($status,$finishDate,$taskId)
    {
        $sql = "UPDATE tasks SET `status` = ?, `finish_date` = ? WHERE `id` = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute([$status,$finishDate,$taskId])){
            echo "<script>alert('Error updating task')</script>";
            echo "<script>window.location.href = '../'</script>";
        }
    }

    protected function deleteTask($taskId)
    {
        $sql = "DELETE FROM tasks WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute([$taskId])){
            echo "<script>alert('Error updating task')</script>";
            echo "<script>window.location.href = '../'</script>";
        }
    }


    // studentsList Model starts here

    protected function getSelectData()
    {
        // $sql = "SELECT grade_level,section,course,school_year,student_id FROM students_school_profile";
        // $sql = "SELECT grade_level,section,course,school_year,unique_section FROM students_school_profile ORDER BY grade_level";
        // $sql = "SELECT unique_section FROM students_school_profile";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();

        // $uniqueArray = array_unique($results);
        // echo "<pre>";
        // var_dump($results);
    }

    protected function createUniqueSection($sample,$stdId)
    {
        $sql = "UPDATE students_school_profile SET `unique_section` = ? WHERE `student_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sample,$stdId]);
    }



}