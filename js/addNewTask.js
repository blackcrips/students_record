let taskName = $('#task-name');
let taskDescription = $('#task-description');
let taskTargetDate = $('#task-targetDate');
let userId = '';
const overViewHeight = $('#overview__wrapper').height();

taskName.keyup(function(event){
    $('.taskName__content').html(event.target.value);
    $('#task-reminder').html('');
    checkOverViewHeight($('#overview__wrapper').height());
    console.log(overViewHeight);
});

taskDescription.keyup(function(event){
    $('.taskDescription').html(event.target.value);
    $('#task-reminder').html('');
    checkOverViewHeight($('#overview__wrapper').height());
});

taskTargetDate.on('change',function(event){
    $('.taskTargetDate__content').html($(this).val());
    $('#task-reminder').html('');
});

let bgColor = $('#bgColor');
let fColor = $('#fColor');

bgColor.on('change',function(event){
    $('#overview__wrapper').css('background-color',$(this).val())
    $('#overview__wrapper').css('border','none');
});

fColor.on('change',function(event){
    $('#overview__wrapper').css('color',$(this).val())
    console.log($(this).val());
});


$('#submitTask').click(function(){
    if(taskName.val() == "" || taskDescription.val() == "" || taskTargetDate.val() == ""){
        $('#task-reminder').html('Please fillup all fields!');
    } else {
        let addNewTask = new Tasks(taskName.val(),taskTargetDate.val(),taskDescription.val(),bgColor.val(),fColor.val());
        addNewTask.addTask();
    }
})

$('#task__back').click(function(){
    window.location.href = "./";
});


function checkOverViewHeight(newheight)
{
    if(newheight > overViewHeight){
        $('#overview__wrapper').css('overflow-y','scroll');
    } else {
        $('#overview__wrapper').css('overflow-y','auto');
    }
}