<?php
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Read System</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $section = file_get_contents('sample.txt');
    ?>
    <div class="wrapper">
        <div>
            <h1>1)Text file contents</h1>
            <p><?= $section; ?></p>
        </div>
        <!--csv file-->
        <div>
            <h1>2)csv file contents</h1>
            <?php
            echo "<table>";
            $f = fopen("sample.csv", "r");
            while (($line = fgetcsv($f)) !== false) {
                echo "<tr>";
                foreach ($line as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "<tr>";
            }
            fclose($f);
            echo "</table>";
            ?>
        </div>
        <!--doc file -->
        <div>
            <h1>3)Doc file contents</h1>
            <?php
            function readWord($filename)
            {
                if (file_exists($filename)) {
                    if (($fh = fopen($filename, 'r')) !== false) {
                        $headers = fread($fh, 0xA00);
                        $n1 = (ord($headers[0x21C]) - 1);
                        $n2 = ((ord($headers[0x21D]) - 8) * 256);
                        $n3 = ((ord($headers[0x21E]) * 256) * 256);
                        $n4 = (((ord($headers[0x21F]) * 256) * 256) * 256);
                        $textLength = ($n1 + $n2 + $n3 + $n4);
                        $extracted_plaintext = fread($fh, $textLength);
                        return $extracted_plaintext;
                    }
                }
            }
            $filename = "sample.doc";
            echo readWord($filename);
            ?>
        </div>
        <!--excel file-->
        <div>
            <h1>4)Excel file contents</h1>
            <?php
            //require 'vendor/autoload.php';

            use Spreadsheet;

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load("sample.xlsx");
            $d = $spreadsheet->getSheet(0)->toArray();
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            unset($sheetData[0]);
            echo "<table>";
            foreach ($sheetData as $t) {
                echo "<tr>";
                echo "<td>" . $t[0] . "</td>";
                echo "<td>" . $t[1] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </div>
</body>

</html>