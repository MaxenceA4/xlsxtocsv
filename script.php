<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'SimpleXLSX.php';
    $files = array(); // Array to store the names of the CSV files
    if ( $xlsx = SimpleXLSX::parse($_FILES["fileToUpload"]["tmp_name"]) ) {
        // Get the total number of sheets
        $sheetCount = $xlsx->sheetsCount();
        for($sheetIndex = 0; $sheetIndex < $sheetCount; $sheetIndex++) {
            $csv = array(); // Create a empty array to store the data
            // Loop through each row of the worksheet
            foreach( $xlsx->rows($sheetIndex) as $r ) {
                    $csv[]=array($r[0],$r[1],$r[2],$r[3],$r[4]);
            }

            // Create a CSV file for each sheet. The filename includes the sheet index.
            $filename = "output-" . date('Y-m-d') . "-sheet" . $sheetIndex . ".csv";
            $out = fopen($filename, 'w');
            foreach( $csv as $row ) {
                fputcsv($out, $row);
            }
            fclose($out);
            $files[] = $filename; // Store the filename
        }

        // Create a ZIP file and add all the CSV files to it
        $zipname = 'output.zip';
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
        foreach ($files as $file) {
            $zip->addFile($file);
        }
        $zip->close();

        // Send the ZIP file to the user
        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename='.$zipname);
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);

        // Delete the CSV and ZIP files
        foreach ($files as $file) {
            unlink($file);
        }
        unlink($zipname);
    }
    else {
        echo "Please upload a valid xlsx file.";
    }
}