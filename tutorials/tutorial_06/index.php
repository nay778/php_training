<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplaod Image</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data" class="form">
            <?php if (isset($_GET['error'])) : ?>
                <div class="alert">
                    **Choose your file
                </div>
            <?php endif ?>
            <?php if (isset($_GET['success'])) : ?>
                <div class="success">
                    **Upload Successful**
                </div>
            <?php endif ?>
            <dvi class="file-upload">
                <input type="file" name="file">
                <i class="fas fa-cloud-upload-alt"></i>
            </dvi>
            <h2>Drag and drop your file here</h2>
            <span>File Supported:JPG,PNG</span>
            <label for="folder">New Folder : </label>
            <input type="text" name="folder" class="folder" placeholder="photos"><br>
            <button type="submit" name="submit" class="btn">Upload</button>
        </form>
    </div>
</body>

</html>