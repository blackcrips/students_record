<?php
    include_once('header.php');
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="./css/studentsList.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">


<div class="container_stdList">
    <div class="stdList__head">
        <div class="head__options">
            <select name="options__section" id="options__section">
                <option>--Select--</option>
                <option value="All">All</option>
            </select>
        </div>
        <div class="head__search">
            <div class='search__advance'>
				<div class='advSearch__key'>
					Advance Search
				</div>
				
				<div class='advSearch_hiddenDetails'>
					<div class='advSearch_content fr'>
						<button id='advSearch__close'>
							<span class="material-symbols-outlined">
								close
							</span>
						</button>
					</div>
					<div class='advSearch_content'>
						<label for='advSearch__firstname'> Firstname: </label>
						<input type='text' id='advSearch__firstname' data-advSearch-validation>
					</div>
					<div class='advSearch_content'>
						<label for='advSearch__sy'> School year: </label>
						<input type='text' id='advSearch__sy' data-advSearch-validation>
					</div>
					<div class='advSearch_content'>
						<label for='advSearch__middlename'> Middlename: </label>
						<input type='text' id='advSearch__middlename' data-advSearch-validation>
					</div>
					<div class='advSearch_content'>
						<label for='advSearch__school'> School: </label>
						<input type='text' id='advSearch__school' data-advSearch-validation>
					</div>
					<div class='advSearch_content'>
						<label for='advSearch__lastname'> Lastname: </label>
						<input type='text' id='advSearch__lastname' data-advSearch-validation>
					</div>
					<div class='advSearch_content'>
						<label for='advSearch__yearlvl'> Year level: </label>
						<input type='text' id='advSearch__yearlvl' data-advSearch-validation>
					</div>
					<div class='advSearch_content'>
						<label for='advSearch__section'> Section: </label>
						<input type='text' id='advSearch__section' data-advSearch-validation>
					</div>
					<div class='advSearch__message'></div>
					<div class='advSearch_content fr'>
						<button id='advSearch__submit'>Search</button>
					</div>
				</div>
			</div>
        </div>
    </div>
    <div class="stdList__content">
        <table class="content__info display" id="example">
            <thead id='std__infoThead'>
                <tr>
                    <th class='std__no' hidden>Count</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Student ID</th>
                    <th>Gender</th>
                    <th>School</th>
                    <th>Grade Level</th>
                    <th>Section</th>
                    <th>School Year</th>
                </tr>
            </thead>
            <tbody id='std__table'>
                
            </tbody>
        </table>
    </div>
	
	<div class="stdIndividual_infoContainer"></div>
	<div class='std__overlay'></div>
</div>





    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></script>
    <script src="./js/students.js" defer></script>
    <script src="./js/studentsList.js" defer></script>

<?php
    include_once('footer.php');
?>

