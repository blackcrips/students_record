class Tasks {

    constructor(firstParam,secondParam,thirdParam,fourthParm,fifthParam,sixthParam) {
        this.firstParam = firstParam;
        this.secondParam = secondParam;
        this.thirdParam = thirdParam;
        this.fourthParm = fourthParm;
        this.fifthParam = fifthParam;
        this.sixthParam = sixthParam;
    }

    // JSX output
    noTaskMessage()
    {
        const messageTemplate = `<div class="task-message">
                                    <h1>No pending task</h1>
                                    <em><h3>Good Job!!</h3></em>
                                </div>`;

                            return messageTemplate;
    }

    createTaskOutput()
    {
        const taskOutput = `<div class="task-overview">
                                <input type='hidden' class='task-id' value='${this.sixthParam}'>
                                <div class="overview__wrapper" id="overview__wrapper" style='background-color:${this.fourthParm};color:${this.fifthParam}'>
                                    <div class='wrapper__action'>
                                        <button class='btn btn-primary action__taskEdit'>Edit</button>
                                        <button class='btn btn-secondary action__taskDone'>Done</button>
                                        <button class='btn btn-danger action__taskDelete'>Delete</button>
                                    </div>
                                    <div class="wrapper__taskName">
                                        <label class="taskName__content">${this.firstParam}</label>
                                    </div>
                                    <div class="wrapper__taskTargetDate">
                                        <label class="taskTargetDate__content">${this.secondParam}</label>
                                    </div>
                                    <div class="wrapper__taskDescription">
                                        <label class="taskDescription">${this.thirdParam}</label>
                                    </div>
                                </div>
                            </div>`;

                            $('#tasks-show').append(taskOutput);

                            
                            
    }

    createTaskEdit()
    {
        let overlayEdit = "<div class='overlay_edit'></div>";
        let editContent = `<div class="container-addTask">
                            <div class="addTask__table">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><label for="task-name">Task name:</label></td>
                                            <td><input type="text" name="task-name" id="task-name" value='${this.firstParam}'></td>
                                        </tr>
                                        <tr>
                                            <td><label for="task-targetDate">Target date:</label></td>
                                            <td><input type="date" name="task-targetDate" id="task-targetDate" value='${this.secondParam}'></td>
                                        </tr>
                                        <tr>
                                            <td><label for="task-description">Description: </label></td>
                                            <td><textarea name="task-description" id="task-description">${this.thirdParam}</textarea>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><div class="task-buttons">
                                                <em><span id="task-reminder"></span></em>
                                                <button type="submit" name="submit-edit" class="btn btn-primary" id="submit-edit">Submit</button>
                                                <button type="button" class="btn btn-danger" id="task__back">Cancel</button>
                                            </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="task-overview">
                                <h3>Task overview</h3>
                                <div class="overview__wrapper" id="overview__wrapper">
                                    <div class="edit__taskName">
                                        <label class="taskName__content"></label>
                                    </div>
                                    <div class="edit__taskTargetDate">
                                        <label class="taskTargetDate__content"></label>
                                    </div>
                                    <div class="edit__taskDescription">
                                        <label class="taskDescription"></label>
                                    </div>
                                </div>
                                <div class="overview__color">
                                    <div class="color__background">
                                        <label for="color">Background color: </label>
                                        <input type="color" id="bgColor" value="${this.fourthParm}">
                                    </div>
                                    <div class="color__font">
                                        <label for="color">Font color: </label>
                                        <input type="color" id="fColor" value="${this.fifthParam}">
                                    </div>
                                </div>
                            </div>
                        </div>`;
        $('.body').append(overlayEdit);
        $('.overlay_edit').append(editContent);
    }

    // end of JSX output


    getUserId()
    {
        $.ajax(
            {
                type: "POST",
                url: "./includes/getUserId.inc.php",
                data: {
                    "user-email": this.firstParam,
                },
                success: function(data)
                {
                    let parseData = JSON.parse(data);
                    userId = parseData;
                },
                error: function(error){
                    console.log(error);
                }
            }
        );
    }

    //load multiple tasks
    getTasks()
    {
        $.ajax(
            {
                type: "POST",
                url: "./includes/getTasks.inc.php",
                data: {
                    "user-email": this.firstParam,
                },
                success: function(data)
                {
                    try{
                        JSON.parse(data);
                        let parseData = JSON.parse(data);
                        
                        for(let i = 0; i  < parseData.length; i++){
                            const task = new Tasks(parseData[i].task_name,parseData[i].target_date,parseData[i].content,parseData[i].bgColor,parseData[i].fColor,parseData[i].id);
                            task.createTaskOutput();    
                        }

                        let taskEdit = $('.action__taskEdit')

                            taskEdit.each(function(){
                                $(this).click(function(){
                                    let taskId = $(this).parent().parent().parent().children('.task-id').val();
                                    const task = new Tasks(taskId);
                                    task.getTask(); 
                                })
                              });
                        
                    } catch(e){
                        let noTaskMessage = new Tasks();
                        $('#tasks-show').append(noTaskMessage.noTaskMessage());
                        console.log(e);
                    }

                },
                error: function(error){
                    console.log(error);
                }
            }
        );
    }

    //get single task
    getTask()
    {
        $.ajax(
            {
                type: "POST",
                url: "./includes/getTask.inc.php",
                data: {
                    "task-id": this.firstParam,
                },
                success: function(data)
                {
                    try{
                        JSON.parse(data);
                        let parseData = JSON.parse(data);
                        const task = new Tasks(parseData.task_name,parseData.target_date,parseData.content,parseData.bgColor,parseData.fColor,parseData.id);
                        task.createTaskEdit();   

                        $('#submit-edit').click(function(){

                            let taskName = $('#task-name');
                            let taskDescription = $('#task-description');
                            let taskTargetDate = $('#task-targetDate');
                            let bgColor = $('#bgColor');
                            let fColor = $('#fColor');

                            let task = new Tasks(taskName.val(),taskTargetDate.val(),taskDescription.val(),bgColor.val(),fColor.val(),parseData.id);
                            task.editTask();
                        });

                        
                    } catch(e){
                        let noTaskMessage = new Tasks();
                        $('#tasks-show').append(noTaskMessage.noTaskMessage());
                        console.log(e);
                    }

                },
                error: function(error){
                    console.log(error);
                }
            }
        );
    }

    addTask()
    {
        $.ajax(
            {
                type: "POST",
                url: "./includes/addNewTask.inc.php",
                data: {
                    "submitTask": this.firstParam,
                    "task-name": this.firstParam,
                    "task-targetDate": this.secondParam,
                    "task-description": this.thirdParam,
                    "bgColor": this.fourthParm,
                    "fColor": this.fifthParam,
                    'task-id': this.sixthParam
                },
                success: function(data)
                {
                    alert('Task added successfully!');
                    location.reload();
                }
            }
        );

    }

    editTask()
    {
        $.ajax(
            {
                type: "POST",
                url: "./includes/editTask.inc.php",
                data: {
                    "task-name": this.firstParam,
                    "task-targetDate": this.secondParam,
                    "task-description": this.thirdParam,
                    "bgColor": this.fourthParm,
                    "fColor": this.fifthParam,
                    'task-id': this.sixthParam
                },
                success: function(data)
                {
                    alert('Task edit successfully!');
                    // location.reload();
                }
            }
        );
    }
    
}