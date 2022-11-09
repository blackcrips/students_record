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

        $sql = "SELECT task_name,content,target_date,bgColor,fColor FROM tasks WHERE user_id = ? AND status = 'active'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId]);

        
        if($stmt->rowCount() == 0) {
            return;
        } else {
            $result = $stmt->fetchAll();
            exit(json_encode($result));
        }
        
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
}