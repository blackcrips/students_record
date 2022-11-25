class Students {

    constructor(firstParam,secondParam,thirdParam,fourthParm,fifthParam,sixthParam) {
        this.firstParam = firstParam;
        this.secondParam = secondParam;
        this.thirdParam = thirdParam;
        this.fourthParm = fourthParm;
        this.fifthParam = fifthParam;
        this.sixthParam = sixthParam;
    }

    // JSX output

    individualRecordView()
    {
        let stdInformation = `<div class="stdIndividual_info">
            <div class="stdIndividual_top">
                <div class="stdIndivual__topLeft">
                <div class='topLeft__container'>
                    <label>Student Number:  <span>${this.firstParam.student_id}</span></label>
                <div class='topLeft__container'>
                    <label>Full name:  <span>${this.firstParam.firstname + " " + this.firstParam.middlename + " " + this.firstParam.lastname}</span></label>
                </div>
            <div class='topLeft__container'>
                    <label>Contact no:  <span>09276469661</span></label>
                </div>
                <div class='topLeft__container'>
                    <label>Birthday:  <span>February 29, 1992</span></label>
                </div>
            <div class='topLeft__container'>
                    <label>Email:  <span>jimmyconsulta@yahoo.com</span></label>
                </div>
                <div class='topLeft__container'>
                    <label>Address:  <span>110 4th St. GHQ Brgy. Katuparan Taguig</span></label>
                </div>
                </div>
                </div>
                <div class="stdIndivual__topRight">
                    <img src="data:image/jpeg;base64,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" alt="Profile">
                </div>
            </div>
            <div class="stdIndividual_bottom">
                <div class='personalDetails-container'>
                    <table>
                        <tr>
                            <td>Guardian name: </td>
                            <td>Maria Leonora</td>
                        </tr>
                        <tr>
                            <td>Contact No.: </td>
                            <td>987654321</td>
                        </tr>
                        <tr>
                            <td>Emergency contact: </td>
                            <td>Teresa</td>
                        </tr>
                        <tr>
                            <td>Contact No.: </td>
                            <td>987654321</td>
                        </tr>
                    </table>
                </div>
                <div class='stdIndividual__schoolRecord'>
                    <table id='scRecord__table'>
                    </table>
                </div>
            </div>
        </div>
            <div class='stdIndividual_nextPage'>
                <div class='std_previous'>
                    <div class='previous__animation'></div>
                    <button id='stdIndividual__previous'>Previous</button>
                </div>
                <div class='std_next'>
                    <div class='next__animation'></div>
                    <button id='stdIndividual__next'>Next</button>
                </div>
            </div>
        </div>`;

        $('.stdIndividual_infoContainer').append(stdInformation);
    }


    // END OF JSX output

    loadData()
    {
        $.ajax({
            url: './includes/studentsList.inc.php',
            method: 'POST',
            data: {
                request_status: 'all'
            },
            success: function(data){
                let studentList = JSON.parse(data);

                $(document).ready(function(){
                    for(let i = 0; i < studentList.length; i++){
                        let trTemplate = `<tr class='std__ListData'><td>${i + 1}</td><td class='std-id'>${studentList[i].student_id}</td><td>${studentList[i].firstname}</td><td>${studentList[i].middlename}</td><td>${studentList[i].lastname}</td><td>${studentList[i].gender}</td><td>${studentList[i].school}</td><td>${studentList[i].grade_level}</td><td>${studentList[i].section}</td><td>${studentList[i].school_year}</td></tr>`;
                        
                        $('#std__table').append(trTemplate);
                    };

                    $("#example").DataTable({
                        'iDisplayLength': 100,
                        'fnDrawCallback': function()
                        {
                            $('.std__ListData').dblclick(function(){
                                alert('You are tapping too fast!');
                                
                                $('.std__overlay').removeClass('active');
                                $('.stdIndividual_infoContainer').removeClass('active');
                                $('#body').css('overflow','scroll');
                                $('.stdIndividual_infoContainer').children().remove();
                            });
                            
                            
                            $('.std__ListData').click(function(){
                                $('.std__overlay').addClass('active');
                                $('.stdIndividual_infoContainer').addClass('active');
                                $('#body').css('overflow','hidden');
                                
                                let stdId = $(this).children('.std-id').html();
                                let students = new Students(stdId,studentList);
                                students.getStudentData();
                                students.onClickOverlay();
                                
                            });
                        }
                    });
                });
            }
        });
    }

    getStudentData()
    {
        for(let i = 0; i < this.secondParam.length; i++){
            if(this.secondParam[i].student_id == this.firstParam){
                let students = new Students(this.secondParam[i],i,this.secondParam);
                students.stdInfo();
                return;
            }
        }
    }

    stdInfo()
    {   

        let students = new Students(this.firstParam,this.secondParam,this.thirdParam);
        students.individualRecordView();
        students.stdIndividualNext();
        students.stdIndividualPrevious();
    }

    stdIndividualNext()
    {
        let wholeArray = this.thirdParam;
        let indexIncrement = this.secondParam + 1;
        
        $('#stdIndividual__next').click(function(){
            
            $('.stdIndividual_infoContainer').children().remove();
                
                if(indexIncrement >= wholeArray.length){
                    let students = new Students(wholeArray[0],0,wholeArray);
                    students.stdInfo();
                    $('#scRecord__table').children().remove();
                } else {
                    let students = new Students(wholeArray[indexIncrement],indexIncrement,wholeArray);
                    students.stdInfo();
                    $('#scRecord__table').children().remove();
                }
        });
    }

    stdIndividualPrevious()
    {

        let wholeArray = this.thirdParam;
        let indexDecrement = this.secondParam + 1;
        
        $('#stdIndividual__previous').click(function(){
            
            $('.stdIndividual_infoContainer').children().remove();
            
            if(indexDecrement < 0){
                let students = new Students(wholeArray[0],0,wholeArray);
                students.stdInfo();
                $('#scRecord__table').children().remove();
            } else {
                let students = new Students(wholeArray[indexDecrement],indexDecrement,wholeArray);
                students.stdInfo();
                $('#scRecord__table').children().remove();
            }
        });
    }

    onClickOverlay()
    {
        $('.std__overlay').on('click',function(){
            $(this).removeClass('active');
            $('.stdIndividual_infoContainer').removeClass('active');
            $('#body').css('overflow','scroll');
            
            setTimeout(function() {
                $('.stdIndividual_infoContainer').children().remove();
            }, 500);
            
            
        });
    }

    dynamicSchoolRecord()
    {
        for(let i = 1; i <= arrayCount; i++){
            let scRecord = `<tr>
                                <td>Grade Level:</td>
                                <td>IV</td>
                            </tr>
                            <tr>
                                <td>Section:</td>
                                <td>Meryn</td>
                            </tr>
                            <tr>
                                <td>School Year:</td>
                                <td>2004-2009</td>
                            </tr>`;
                            
                $('#scRecord__table').append(scRecord);
        }
    }


}