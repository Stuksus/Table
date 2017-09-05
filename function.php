<?php

function createTable($nameTable){
    $bd = mysqli_connect('localhost','rooting2','123123','firstDataBase');
    $creatTableQuery = "CREATE TABLE `$nameTable`(
  `id` int(11) NOT NULL  AUTO_INCREMENT,
  `name` text(250) NOT NULL,
  `description` text(250) NOT NULL,
  PRIMARY KEY (`id`)
)engine=InnoDB DEFAULT charset=utf8;";
    mysqli_query($bd,$creatTableQuery);

}
function selectTable(){
    $bd = mysqli_connect('localhost','rooting2','123123','firstDataBase');
    $selectAllTAble = "SHOW TABLES FROM firstDataBase";
    $res = mysqli_query($bd,$selectAllTAble);
    while($data = mysqli_fetch_array($res)) {
        $array[] = $data[0];
    }
    return $array;
}
function describeTable($nameTable){
    $bd = mysqli_connect('localhost','rooting2','123123','firstDataBase');
    $describeQuery = "DESCRIBE $nameTable";
    $res = mysqli_query($bd,$describeQuery);
    return $res;

}
function deleteBox($tableName,$nameColumn){
    $bd = mysqli_connect('localhost','rooting2','123123','firstDataBase');
    $deleteQuery = "ALTER TABLE $tableName Drop COLUMN $nameColumn";
    $resultDel = mysqli_query($bd,$deleteQuery);
    return $resultDel;
}
function modifyBox($tableName,$nameColumn){
    $bd = mysqli_connect('localhost','rooting2','123123','firstDataBase');
    $modifyQuery = "ALTER TABLE $tableName MODIFY $nameColumn";
    $resultMod = mysqli_query($bd,$modifyQuery);
    return $resultMod;
}
function rename($tableName,$nameColumn,$val,$type){
    $bd = mysqli_connect('localhost','rooting2','123123','firstDataBase');
    $renameQuery = "ALTER TABLE $tableName CHANGE  $nameColumn $val $type";
    $resultRen = mysqli_query($bd,$renameQuery);
    return $resultRen;
}

if (isset($_POST['OK'])){
    createTable($_POST['name']);

}
if (isset($_POST['OK3'])){
    $result = describeTable($_POST['name3']);
    echo '<pre>';
    print_r($result);
}
if (isset($_POST['OK2'])){
    $res = selectTable();
    echo '<pre>';
    print_r($res);

}

?>
<!doctype html>

<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="submit" name="OK" value="OK">
    <input  name="name" >
    <input  name="name3" >
    <input type="submit" name="OK2" value="OK2">
    <input type="submit" name="OK3" value="OK3">
</form>

</body>
</html>
