<html>
<head>
    <title>
        <?php echo $title; ?>
    </title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px;
        }
    </style>
</head>
<body>
<hr>
Исходный файл(построчный): <br><br>
<?php echo $curFile; ?>
<hr>
Исходный файл(посимвольный): <br><br>
<?php echo $readBySymb; ?>
<hr>
<table>
    <tr>
        <th>№ строки</th>
        <th><?php echo $data['stringFromFile'];?></th>
    </tr>
</table>
Искомая строка: <br><br>
<?php echo $string; ?>
<hr>
<table>
    <tr>
        <th>№ строки с символом</th>
        <th><?php echo $data['symbolByStringFromFile1'];?></th>
    </tr>
    <tr>
        <th>№ символа в строке</th>
        <th><?php echo $data['symbolByStringFromFile2'];?></th>
    </tr>
</table>
Искомый символ строки: <br><br>
<?php echo $symbol; ?>
<hr>
<table>
    <tr>
        <th>№ строки для замены</th>
        <th><?php echo $data['replaceString1'];?></th>
    </tr>
    <tr>
        <th>Текст для замены</th>
        <th><?php echo $data['replaceString2'];?></th>
    </tr>
</table>
Файл с новой строкой: <br><br>
<?php echo $newStrFile;?>
<hr>
<table>
    <tr>
        <th>№ строки для замены символа</th>
        <th><?php echo $data['replaceSymbol1'];?></th>
    </tr>
    <tr>
        <th>№ символа для замены</th>
        <th><?php echo $data['replaceSymbol2'];?></th>
    </tr>
    <tr>
        <th>Значение для замены символа</th>
        <th><?php echo $data['replaceSymbol3'];?></th>
    </tr>
</table>
Файл с новым символом в заданой строке: <br><br>
<?php echo $newSymFile;?>
</body>
</html>