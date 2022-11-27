
// let selectedStudentList = new Students();
// selectedStudentList.selectStudentList();

function studentOnload()
{
	let students = new Students();
	students.loadData();
	students.dropdownList();
}

studentOnload();

$('#options__section').change(function(){
	let students = new Students($(this).val());
	students.selectStudentList();
});

function update(){
    let focusPosition = document.getElementById('std__infoThead');
    let rect = focusPosition.getBoundingClientRect();

    return rect.y;
}

$(document).scroll(function(){
    
    if(update() <= 0){
		$('#std__infoThead').addClass('active');
	} else {
	$('#std__infoThead').removeClass('active');	
	}
});




$('.advSearch__key').click(function(){
	let advHidden = $('.advSearch_hiddenDetails');
	
	if(advHidden.hasClass('active')){
		removeAndChangeColor();
	} else {
		advHidden.addClass('active');
	}
});

$('#advSearch__close').click(function(){
	removeAndChangeColor();
});


$('#advSearch__submit').click(function(){
	let validateInputs = $('[data-advSearch-validation]');
	let sendValidate = validateInputs.length;
	
	validateInputs.each(function(){
		if($(this).val() == ''){
			$(this).css('box-shadow','0 0 5px 1px red');
			$('.advSearch__message').html('please fill up all field');
		} else {
			sendValidate--;
		}
	});
	
	validateAction(sendValidate,validateInputs);
});

function validateAction(sendValidate,validateInputs)
{
	if(sendValidate != 0 ){
		return;
	} else {
		validateInputs.each(function(){
			$(this).val('');
		});
		$('.advSearch_hiddenDetails').removeClass('active');
	}
}


function validateOnKeyup()
{
	let validateInputs = $('[data-advSearch-validation]');
	
	validateInputs.each(function(){
		$(this).on('keyup',function(){
			if($(this).val() == ''){
				$(this).css('box-shadow','0 0 5px 1px red');
			} else {
				$(this).css('box-shadow','none');
			}
			
		});
	});
}

validateOnKeyup();

function removeAndChangeColor()
{
	let validateInputs = $('[data-advSearch-validation]');
	
	validateInputs.each(function(){
		$(this).val('');
		$(this).css('box-shadow','none');
		$('.advSearch_hiddenDetails').removeClass('active');
		
	});
}


