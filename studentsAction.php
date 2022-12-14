<?php include('header.php'); ?>

<link rel="stylesheet" href="./css/studentsAction.css" class="rel">

    <div class="container__studentsAction">
        <div class="single_actionOverlay">SINGLE STUDENTS ACTION</div>
        
        <div class="studentsAction__single">
            <div class="stdAction__hideLeft"><< View Multiple</div>
            <div class='container__singleEdit'>
                <div class='singleEdit__searchCont'>
                    <div class='searchCont'>
                        <input type='text' placeholder='Enter student number' id='singleEdit__search' />
                        <button type='button' id='singleEdit__searchSubmit' class='btn btn-secondary'> Search </button>
                    </div>
                    <div class='search-message'>
                        <span>* Enter student number if you want to edit/delete record.</span>
                        <span>* Leave as blank if you want to add single record.</span>
                    </div>
                </div>
                
                <table id='singleEdit__table'>
                    <tr>
                        <td><label>Full name: </label></td>
                        <td>
                            <div class='detailsCont__row1st'>
                                <div class='singleEdit__content'>
                                    <input type='text' value='' id='singleEdit__firstname' data-single-input />
                                    <label for='singleEdit__firstname'>Firstname </label>
                                </div>
                                <div class='singleEdit__content'>
                                    <input type='text' value='' id='singleEdit__middlename' data-single-input />
                                    <label for='singleEdit__middlename'>Middlename </label>
                                </div>
                                <div class='singleEdit__content'>
                                    <input type='text' value='' id='singleEdit__lastname' data-single-input />
                                    <label for='singleEdit__lastname'>Lastname </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact no.</td>
                        <td><input type='text' value='' id='singleEdit__contactNumber' data-single-input /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type='text' value='' id='singleEdit__email' data-single-input /></td>
                    </tr>
                    <tr>
                        <td>Birthday</td>
                        <td><input type='date' value='' id='singleEdit__birthday' data-single-input /></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <select data-single-input id='singleEdit__gender'>
                                <option disabled selected>--Select--</option>
                                <option value='Male'>Male</option>
                                <option value='Female'>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type='text' value='' id='singleEdit__address' data-single-input /></td>
                    </tr>
                    <tr>
                        <td>Guardian name</td>
                        <td><input type='text' value='' id='singleEdit__guardianName' data-single-input /></td>
                    </tr>
                    <tr>
                        <td>Guardian no.</td>
                        <td><input type='text' value='' id='singleEdit__guardianNo' data-single-input /></td>
                    </tr>
                    <tr>
                        <td>Emergency contact</td>
                        <td><input type='text' value='' id='singleEdit__emergencyCont' data-single-input /></td>
                    </tr>
                    <tr>
                        <td>Emergency contact no</td>
                        <td><input type='text' value='' id='singleEdit__emergencyContNo' data-single-input /></td>
                    </tr>
                </table>
                
                <div class='singleEdit__actionButton'>
                    <button type='button' id='actionButton__delete' class='btn btn-danger'> Delete </button>
                    <button type='button' id='actionButton__add' class='btn btn-primary'>Add New</button>
                    <button type='button' id='actionButton__edit' class='btn btn-primary'>Save Changes</button>
                </div>
            </div>
        </div>

        <div class="multiple_actionOverlay">MULTIPLE STUDENTS ACTION</div>
        <div class="studentsAction__multiple">
            <div class="studentsAction__rightContent">
                <div class="stdAction__hideRight">View Single >> </div>
                <div class="stdContent__details">
                    <h1>UPLOAD MULTIPLE DATA</h1>
                    <span id="multipleUpload-span">Choose File</span>
                    <form action="./includes/uploadMultipleStudentsRecord.inc.php" method="POST" enctype="multipart/form-data" id="multipleUplaod-form">
                    </form>
                    <div>
                        Please make sure to follow the correct template header. You can download the template 
                        <a href="./uploadMultipleTemplate.xlsx" download="Multiple-upload-template">here</a>.
                    </div>
                    <div class="multiple_action">
                        <button class="btn btn-primary" id="multipleUpload-submit" disabled>Upload</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></script>
    <script src="./js/studentsCRUD.js" defer></script>
    <script src="./js/studentsAction.js" defer></script>
<?php include('footer.php'); ?>