<?php
include('read_script.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record System</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="table-data">
        <div class="list-title">
            <h2>medicine list</h2>
            <h2><a href="create_form.php"><i class="far fa-plus-square"></i></a></h2>
        </div>

        <table border="1">

            <tr>

                <th>S.N</th>
                <th>Logo</th>
                <th>Name</th>
                <th>Company</th>
                <th>Producted Date</th>
                <th>Expired Date</th>
                <th>Edit</th>
                <th>Delete</th>


            </tr>

            <?php

            if (count($fetchData) > 0) {
                $sn = 1;
                foreach ($fetchData as $data) {

            ?>  
                <tr>
                    <td><?php echo $sn; ?></td>
                    <td><?php echo "<img src= ./images/" . $data['logo'] . " alt='logo' class='lit-img'>"; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['company']; ?></td>
                    <td><?php echo $data['producted']; ?></td>
                    <td><?php echo $data['expired']; ?></td>
                    <td class="text-center"><a href="update_form.php?edit=<?php echo $data['id']; ?>"><i class="far fa-edit"></i></a></td>
                    <td class="text-center"><a href="delete_script.php?delete=<?php echo $data['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr> <?php

                            $sn++;
                        }
                    } else {

                            ?>

                <tr>
                    <td colspan="7">No Data Found</td>
                </tr>

            <?php

                    }
            ?>

        </table>
    </div>

</body>

</html>