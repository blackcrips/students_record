<?php


class Model extends Dbh
{
    protected function getTableColumnNames($tableName)
    {
        $sql = "SELECT Column_name FROM INFORMATION_SCHEMA.Columns WHERE TABLE_NAME = ?";
         $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$tableName]);
        $results = $stmt->fetchAll();

        $arrayOfColumnNames = [];

        for($i = 1; $i < count($results) - 1;$i++){
            array_push($arrayOfColumnNames,$results[$i]['Column_name']);
        }

        return $arrayOfColumnNames;
    }

    protected function studentCount()
    {
        $sql = "SELECT count(id) AS studentCount FROM students_personal_profile";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetch();

        return $results;


    }

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

    protected function getAllStudentsData()
    {
        $sql = "SELECT firstname,middlename,lastname,gender,scf.student_id,scf.school,scf.section,scf.grade_level,scf.school_year,contact_no,birthday,email,address,spp.guardian_name,spp.guardian_no,spp.emergency_contact,spp.emergency_cont_no
        FROM students_personal_profile spp
        JOIN students_school_profile scf
        ON spp.id = scf.id ORDER BY lastname";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();

        exit(json_encode($results));
    }

    protected function createUniqueSection($sample,$stdId)
    {
        $sql = "UPDATE students_school_profile SET `unique_section` = ? WHERE `student_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sample,$stdId]);
    }

    protected function schoolRecord($stdId)
    {
        $sql = "SELECT id,school,grade_level,section,course,school_year FROM students_school_profile WHERE student_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$stdId]);

        $results = $stmt->fetchAll();
        $arrayTemplate = [];

        foreach($results as $result){
            array_push($arrayTemplate,$result);
        }
        exit(json_encode($results));
    }

    protected function getSectionList()
    {
        $sql = "SELECT section FROM students_school_profile ORDER BY section";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        
        $emptyArray = [];

        foreach($results as $result){
            array_push($emptyArray,$result['section']);
        }

        exit(json_encode($emptyArray));
    }

    protected function listBySelectValue($selectValue)
    {
        $sql = "SELECT firstname,middlename,lastname,gender,scf.student_id,scf.school,scf.section,scf.grade_level,scf.school_year,contact_no,birthday,email,address,spp.guardian_name,spp.guardian_no,spp.emergency_contact,spp.emergency_cont_no
        FROM students_personal_profile spp
        JOIN students_school_profile scf
        ON spp.id = scf.id WHERE scf.section = ? ORDER BY lastname";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$selectValue]);

        $results = $stmt->fetchAll();

        exit(json_encode($results));
    }

    protected function singleStudentRecord($studentId)
    {
        $sql = 'SELECT * FROM students_personal_profile spp JOIN students_school_profile scf ON spp.id = scf.id WHERE scf.student_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$studentId]);
        $row = $stmt->rowCount();

        $result = $stmt->fetch();

        if($row <= 0){
            return false;
        } else {
            return $result;
        }
    }


    protected function sampleNames($tableName)
    {
        // $sql = "SELECT * FROM students_personal_profile JOIN students_school_profile LIMIT 1";
        // $stmt = $this->connect()->prepare($sql);
        // $stmt ->execute();

        // $results = $stmt->fetchAll();

        // return count($results[0]) - 3;
        $columnNames = $this->getTableColumnNames($tableName);

        $dynamicQuestionMark = [];

        for($i = 0; $i < count($columnNames);$i++){
            array_push($dynamicQuestionMark, "?");
        }

        $sqlFirstQuery = "INSERT INTO $tableName ('";
        $sampleQueryColumn =  implode("','", $columnNames);
        $sqlLastQuery = "') VALUES (";


        echo $sqlFirstQuery . $sampleQueryColumn . $sqlLastQuery . implode(',', $dynamicQuestionMark) . ")";
        echo '<br>';
        echo count($columnNames);
    }

    protected function deleteThisStudentRecord($studentId)
    {
        $sql = "SELECT id FROM students_school_profile WHERE student_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$studentId]);
        $rowCount = $stmt->rowCount();
        
        if($rowCount > 0){
            $idLists = $stmt->fetchAll();
            
            foreach($idLists as $idList){
                $sql = "DELETE FROM students_school_profile WHERE id = " . $idList['id'];
                $stmt = $this->connect()->prepare($sql);
                
                if($stmt->execute()){
                    $sql = "DELETE FROM students_personal_profile WHERE id = " . $idList['id'];
                    $stmt = $this->connect()->prepare($sql);
                    $stmt->execute();
                } else {
                    return false;
                }
            }

            return true;


        } else {
            return false;
        }
    }



}