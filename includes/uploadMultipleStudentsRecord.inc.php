<?php

require '../vendor/autoload.php';

include_once('autoLoadClasses.inc.php');

$controller = new Controller();


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(!isset($_FILES['upload-students'])){
    header("Location: ../status403.php");
    exit(0);
} else {
    $filename = $_FILES['upload-students']['name'];
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if(in_array($file_ext, $allowed_ext)){

        $inputFileNameName = $_FILES['upload-students']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNameName);
        $data = $spreadsheet->getActiveSheet()->toArray();

        echo '<pre>';
        $controller->uploadStudents($data);


    }
}
?>