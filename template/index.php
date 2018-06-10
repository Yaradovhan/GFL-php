<!doctype html>
<html lang="en">
<head>
    <title>Calculator</title>
</head>
<body>
<div>
    <h1</h1>
    <ul>
        <?php
        foreach ($resultArray as $result):
            ?>
            <li>
                <strong><?php echo $result['operations']; ?></strong>
                <span>=</span>
                <span><?php echo $result['result']; ?></span>
            </li>
        <?php
        endforeach;
        ?>
    </ul>
</div>

</body>
</html>
