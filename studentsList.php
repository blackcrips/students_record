<?php
    include_once('header.php');
?>

<link rel="stylesheet" href="./css/studentsList.css">

<div class="container_stdList">
    <div class="stdList__head">
        <div class="head__options">
            <select name="options__section" id="options__section">
                
            </select>
        </div>
        <div class="head__search">
            <div class="search__container">
                <input type="text" placeholder=' search'>
            </div>
            <label class='search__advance'>Advance Search</label>
        </div>
    </div>
    <div class="stdList__content">
        <table class="content__info">
            <thead>
                <th class='std__no'>Count</th>
                <th>Student ID</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>School</th>
                <th>Grade Level</th>
                <th>Section</th>
                <th>School Year</th>
            </thead>
            <tbody class='stdList_table'>
                <tr>
                    <td><?php $controller->loadSelectData(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
    include_once('footer.php');
?>

