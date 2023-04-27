<?php
session_start();
include('dbconfig.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

if(isset($_POST['export_excel_btn']))
{   
    $file_ext_name = $_POST['export_file_type'];
    $fileName = "student-sheet";

    // Database Name (Change here)
    $db = $_POST['db'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = $db;


    $student = "SELECT * FROM asset";
    $con = new mysqli($servername, $username, $password, $dbname);
    $query_run = mysqli_query($con, $student);

    if(mysqli_num_rows($query_run) > 0)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'asset_id');
        $sheet->setCellValue('B1', 'asset_type');
        $sheet->setCellValue('C1', 'asset_number');
        $sheet->setCellValue('D1', 'asset_status');
        $sheet->setCellValue('E1', 'asset_condition');

        $rowCount = 2;

        foreach($query_run as $data)
        {
            $sheet->setCellValue('A'.$rowCount, $data['asset_id']);
            $sheet->setCellValue('B'.$rowCount, $data['asset_type']);
            $sheet->setCellValue('C'.$rowCount, $data['asset_number']);
            $sheet->setCellValue('D'.$rowCount, $data['asset_status']);
            $sheet->setCellValue('E'.$rowCount, $data['asset_condition']);
            $rowCount++;
        }

        if($file_ext_name == 'xlsx')
        {
            $writer = new Xlsx($spreadsheet);
            $final_filename = $fileName.'.xlsx';
        }
        elseif($file_ext_name == 'xls')
        {
            $writer = new Xls($spreadsheet);
            $final_filename = $fileName.'.xls';
        }
        elseif($file_ext_name == 'csv')
        {
            $writer = new Csv($spreadsheet);
            $final_filename = $fileName.'.csv';
        }

        // $writer->save($final_filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="'.urlencode($final_filename).'"');
        $writer->save('php://output');

    }
    else
    {
        $_SESSION['message'] = "No Record Found";
            header('Location: file.php');
            exit(0);
        }
    }

if(isset($_POST['save_excel_data']))
{

    $db = $_POST['db'];
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = $db;

    $fileName = $_FILES['import_file']['name'];
    $con = new mysqli($servername, $username, $password, $dbname);
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $asset_type = $row['0'];
                $asset_number = $row['1'];
                $asset_status = $row['2'];
                $asset_condition = $row['3'];
                $studentQuery = "INSERT INTO asset (asset_type,asset_number,asset_status,asset_condition) VALUES ('$asset_type','$asset_number','$asset_status','$asset_condition')";
                $result = mysqli_query($con, $studentQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: file.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: file.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: file.php');
        exit(0);
    }
}

?>
