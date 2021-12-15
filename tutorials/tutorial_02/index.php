<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <?php
        $n = 6;
            for ($row = 1; $row <= $n; $row++) {

                for ($col = 1; $col <= (2*$n - 1); $col++) {

                   if ($col >= $n-($row-1) && $col <= $n+($row-1)){
                        echo "&nbsp;";
                        echo "*";

                   } else {
                       
                    echo "&nbsp;&nbsp;&nbsp;";

                   } 
                }

                echo "<br>";
            }

            for ($row = $n-1; $row >= 1; $row--) {
    
                for ($col = 1; $col <= (2*$n - 1); $col++) {
    
                   if ($col >= $n-($row-1) && $col <= $n+($row-1)){
                        echo "&nbsp;";
                        echo "*";
    
                   } else {
                           
                    echo "&nbsp;&nbsp;&nbsp;";
    
                   } 
                }
    
                echo "<br>";
            }

        ?>
</body>
</html>