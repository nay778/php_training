<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chessboard</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table>
        <?php
        $n = 8;
        for ($row = 1; $row <= $n; $row++) {
            echo "<tr>";
            for ($col = 1; $col <= $n; $col++) {
                if (($row + $col) % 2 == 0) {
                    echo "<td> </td>";
                } else {
                    echo "<td class='black'> </td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>