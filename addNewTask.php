<?php include('header.php'); ?>
<link rel="stylesheet" href="./css/addNewTask.css">

    <div class="container-addTask">
        <div class="addTask__table">
            <table>
                <tbody>
                    <tr>
                        <td><label for="task-name">Task name:</label></td>
                        <td><input type="text" name="task-name" id="task-name"></td>
                    </tr>
                    <tr>
                        <td><label for="task-targetDate">Target date:</label></td>
                        <td><input type="date" name="task-targetDate" id="task-targetDate"></td>
                    </tr>
                    <tr>
                        <td><label for="task-description">Description: </label></td>
                        <td><textarea name="task-description" id="task-description"></textarea>
                    </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><div class="task-buttons">
                            <em><span id="task-reminder"></span></em>
                            <button type="submit" name="submitTask" class="btn btn-primary" id="submitTask">Submit</button>
                            <button type="button" class="btn btn-danger" id="task__back">Cancel</button>
                        </div></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="task-overview">
            <h3>Task overview</h3>
            <div class="overview__wrapper" id="overview__wrapper">
                <div class="wrapper__taskName">
                    <label class="taskName__content"></label>
                </div>
                <div class="wrapper__taskTargetDate">
                    <label class="taskTargetDate__content"></label>
                </div>
                <div class="wrapper__taskDescription">
                    <label class="taskDescription"></label>
                </div>
            </div>
            <div class="overview__color">
                <div class="color__background">
                    <label for="color">Background color: </label>
                    <input type="color" id="bgColor" value="#ffffff">
                </div>
                <div class="color__font">
                    <label for="color">Font color: </label>
                    <input type="color" id="fColor" value="#000000">
                </div>
            </div>
        </div>
    </div>

    <script src="./js/addNewTask.js" defer></script>
<?php include('footer.php'); ?>