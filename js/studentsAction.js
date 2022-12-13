$('.single_actionOverlay').click(function(){
    $('.multiple_actionOverlay').hide();
    $(this).hide();
    $('.studentsAction__single').addClass('active');
});

$('.stdAction__hideLeft').click(function(){
    $('.studentsAction__single').removeClass('active')
    $('.studentsAction__multiple').addClass('active');
});

$('.stdAction__hideRight').click(function(){
    $('.studentsAction__multiple').removeClass('active')
    $('.studentsAction__single').addClass('active');
});


$('.multiple_actionOverlay').click(function(){
    $('.single_actionOverlay').hide();
    $(this).hide();
    $('.studentsAction__multiple').addClass('active');
});

let spanUpload = $('#multipleUpload-span');
let formMultipleUpload = $('#multipleUplaod-form');

function createUpload(){
    let lock = false
    return new Promise((resolve, reject) => {
        // create input file
        const el = document.createElement('input')
        el.id = 'multiple-upload';
        el.name = 'multiple-upload'
        el.style.display = 'none';
        el.setAttribute('type', 'file')
        formMultipleUpload.append(el)

        el.addEventListener('change', () => {
            lock = true
            const file = el.files[0]
            
            resolve(file)
            spanUpload.html('File Uploaded');
            spanUpload.css('color','red');
            $('#multipleUpload-submit').prop('disabled', false);
            console.log(el.value);
        }, { once: true })
        
        // file blur
        window.addEventListener('focus', () => {
            setTimeout(() => {
                if (!lock) {
                    reject(new Error('onblur'))
                    // remove dom
                    $('#multiple-upload').remove();
                    spanUpload.html('Choose File');
                    spanUpload.css('color','black');
                    $('#multipleUpload-submit').prop('disabled', true);
                }
            }, 300)
        }, { once: true })

        // open file select box
        el.click()
    })
}



spanUpload.click(function(){
    if($('#multiple-upload').length > 0){
        $('#multiple-upload').remove();
        createUpload();
    } else {
        createUpload();
    }
});


$('#multipleUpload-submit').click(function(){
    if($('#multiple-upload').length == 0){
        alert('Please upload a file');
    } else {
        alert('success');
    }
});

// function initializeUpload()
// {
//     document.body.onfocus = checkUpload;
//     console.log('checking');
// }

// function checkUpload()
// {
//     let fileUpload = document.getElementById('multiple-upload');
//     if(fileUpload.value.length){
//         alert('Files Loaded');
//         console.log(fileUpload.value);
//     } else {
//         alert('Cancel clicked');
//         console.log(fileUpload.value);
//     }

//     document.body.onfocus = null;
//     console.log('checked');
      
// }