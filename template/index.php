<html>
<head>
    <title>
        <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>
<body>

<?php if(isset($message) && !empty($message)){
    ?><div class="alert alert-success">
    <strong><?php echo $message; ?></strong>
</div>
<?php } ?>
    <div class="container">
        <form enctype="multipart/form-data" action="" method="POST">
            <div class="form-group">
                <label for="uploadfile">FILE to UPLOAD</label>
                <input type="file" name="uploaded_file" class="text-center center-block well well-sm" id="uploadfile" required>
                <input type="submit" name="submit" class="text-center center-block well well-sm" value="Upload">
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Num</th>
                <th>File Name</th>
                <th>Size</th>
                <th>Command</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allFiles as $file) { ?>
                <tr>
                    <td><?php echo $file['N']; ?></td>
                    <td><?php echo $file['name']; ?></td>
                    <td><?php echo $file['size']; ?></td>
                    <td>
                        <form method="post">
                            <input type="submit" name="delete" value="delete">
                            <label>
                                <input hidden name ='delete' value="<?php echo $file['name']?>">
                            </label>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php if(isset($error)){
    ?><div class="alert alert-danger">
    <strong><?php echo $error; ?></strong>
    </div>
<?php } elseif(isset($del)) {
    ?><div class="alert alert-danger">
    <strong><?php echo $del; ?></strong>
    </div>
<?php } ?>
</body>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</html>
