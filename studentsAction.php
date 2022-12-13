<?php include('header.php'); ?>

<link rel="stylesheet" href="./css/studentsAction.css" class="rel">

    <div class="container__studentsAction">
        <div class="single_actionOverlay">SINGLE STUDENTS ACTION</div>
        <div class="studentsAction__single">
            <div class="studentsAction__leftContent">
                <div class="stdAction__hideLeft"><< View Multiple</div>
                <div class="stdContent__details">CONTENTS HERE</div>
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
                        <!-- <input type="file" name="multiple-upload" id="multiple-upload" hidden /> -->
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
    <script src="./js/students.js" defer></script>
    <script src="./js/studentsAction.js" defer></script>
<?php include('footer.php'); ?>