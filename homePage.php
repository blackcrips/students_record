<?php include('header.php'); ?>

            <div class="records">
                <div class="records__stdntCount">
                    <div class="records__label">
                        <span id="label1">Students count</span>
                        <span id="label2">Overall student count</span>
                    </div>
                    <div class="records__count">
                        <span id="stdntCounts"><?php echo $view->getStudentCount()['studentCount'] ?></span>
                    </div>
                </div>
                <div class="records__stdntRglrCount">
                    <div class="records__label">
                        <span id="label1">Student count</span>
                        <span id="label2">Current year</span>
                    </div>
                    <div class="records__count">
                        <span id="stdntCounts">12465</span>
                    </div>
                </div>
                <div class="records__stdntIrrglrCount">
                    <div class="records__label">
                        <span id="label1">Student count</span>
                        <span id="label2">Overall student count</span>
                    </div>
                    <div class="records__count">
                        <span id="stdntCounts">12465</span>
                    </div>
                </div>
                <div class="records__taskCount">
                    <div class="records__label">
                        <span id="label1">Student count</span>
                        <span id="label2">Overall student count</span>
                    </div>
                    <div class="records__count">
                        <span id="stdntCounts">12465</span>
                    </div>
                </div>
            </div>

            <div class="content__tasks">
                <div class="tasks__contCreate">
                    <a href="addNewTask.php">
                        <i class="bi bi-file-earmark-plus-fill"> New tasks</i> 
                    </a>
                </div>
                <div class="tasks__show" id="tasks-show">



                </div>
            </div>

    
    <script src="./js/tasks.js"></script>
    <script src="./js/homePage.js"></script>
    
        

        <?php include('footer.php'); ?>