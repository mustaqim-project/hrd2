<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Define path to PHPSpreadsheet
define('PHPSPREADSHEET_PATH', APPPATH . 'third_party/phpspreadsheet/');

require_once PHPSPREADSHEET_PATH . 'src/Bootstrap.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PhpSpreadsheet_lib
{
    public function __construct()
    {
        // No additional setup needed as long as PHPSpreadsheet files are included correctly
    }

    public function load($filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        return $spreadsheet;
    }
}
