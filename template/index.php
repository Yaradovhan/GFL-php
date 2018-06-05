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
        <form enctype="multipart/form-data" action="function.php" method="POST">
            <div class="form-group">
                <label for="uploadfile">FILE to UPLOAD</label>
                <input type="file" name="uploaded_file" class="text-center center-block well well-sm" id="uploadfile" required></input>
                <input type="submit" name="submit" class="text-center center-block well well-sm" value="Upload"></input>
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
                    <td><?php echo $file['size']; ?> kb</td>
                    <td><?php echo '<a class="btn btn-danger" href="index.php?delFile=' . $file['name'] . '">Delete</a>' ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php if(isset($delError)){
    ?><div class="alert alert-danger">
    <strong><?php echo $delError; ?></strong>
    </div>
<?php } elseif(isset($error)) {
    ?><div class="alert alert-danger">
    <strong><?php echo $error; ?></strong>
    </div>
<?php } ?>
</body>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</html>
