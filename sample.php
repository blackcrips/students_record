<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

 .task-overview {
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding-bottom: 50px;
}

.task-overview .overview__wrapper{
    width: 50%;
    min-height: 210px;
    max-height: 210px;
    padding: 10px;
    box-shadow: 10px 10px 5px 0 #3e3e3e;
    border: 1px solid #ccc;
    border-radius: 5px;
}

</style>

<body>
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
    </div>
</body>
</html>