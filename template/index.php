<html>
<head>
    <title>
        <?php echo $title; ?>
    </title>
</head>
<body>
<h1>Session data</h1>
<ul>
    <?php
    foreach ($arraySession as $result):
        ?>
        <li>
            <strong><?php echo $result['action']; ?></strong>
            <p><?php echo $result['result']; ?></p>
        </li>
    <?php
    endforeach;
    ?>
</ul>
<hr>
<h1>Cookie</h1>
<ul>
    <?php
    foreach ($arrayCookie as $result):
        ?>
        <li>
            <strong><?php echo $result['action']; ?></strong>
            <p><?php echo $result['result']; ?></p>
        </li>
    <?php
    endforeach;
    ?>
</ul>
<hr>
<h1>Data Base - testDB1(user6)</h1>
<ul>
    <?php
    foreach ($arrayMysql as $result):
        ?>
        <li>
            <strong><?php echo $result['action']; ?></strong>
            <p><?php echo $result['result']; ?></p>
        </li>
    <?php
    endforeach;
    ?>
</ul>
</body>
</html>
