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
                            const task = new Tasks(parseData[i].task_name,parseData[i].target_date,parseData[i].content,parseData[i].bgColor,parseData[i].fColor);
                            task.createTaskOutput();    
                        }
                        
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
                },
                success: function(data)
                {
                    alert('Task added successfully!');
                    location.reload();
                }
            }
        );

    }
    
}