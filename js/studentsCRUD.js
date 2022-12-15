class StudentsCRUD {

    constructor(firstParam,secondParam,thirdParam,fourthParm,fifthParam,sixthParam) {
        this.firstParam = firstParam;
        this.secondParam = secondParam;
        this.thirdParam = thirdParam;
        this.fourthParm = fourthParm;
        this.fifthParam = fifthParam;
        this.sixthParam = sixthParam;
    }


     // JSX output




     // end of JSX output

    getSingleStudentRecord()
    {
        $.ajax(
        {
            url: './includes/getSingleStudentRecord.inc.php',
            method: 'POST',
            data: { 'student-id': this.firstParam },
            success: function(data){
                if(!JSON.parse(data)){
                    alert('No data found');
                    return;
                } else {
                    let parseData = JSON.parse(data);
                    studentId = parseData.student_id;
                    $('#singleEdit__firstname').val(parseData.firstname);
                    $('#singleEdit__middlename').val(parseData.middlename);
                    $('#singleEdit__lastname').val(parseData.lastname);
                    $('#singleEdit__contactNumber').val(parseData.contact_no);
                    $('#singleEdit__email').val(parseData.email);
                    $('#singleEdit__birthday').val(parseData.birthday);
                    $('#singleEdit__gender').val(parseData.gender);
                    $('#singleEdit__address').val(parseData.address);
                    $('#singleEdit__guardianName').val(parseData.guardian_name);
                    $('#singleEdit__guardianNo').val(parseData.guardian_no);
                    $('#singleEdit__emergencyCont').val(parseData.emergency_contact);
                    $('#singleEdit__emergencyContNo').val(parseData.emergency_cont_no);
                }
            }
        });
    }

    deleteSingleStudentRecord()
    {
        $.ajax(
            {
                url: './includes/deleteSingleStudentRecord.inc.php',
                method: 'POST',
                data: { 'student-id': this.firstParam },
                success: function(data){
                    if(!JSON.parse(data)){
                        alert('Error deleting record. Please try again later.');
                        return;
                        
                    } else {
                        alert('Record successfully deleted.');
                        emptySingleUpdateData();
                        studentId = '';
                    }
                }
            });
    }

} // end of class