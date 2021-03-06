<?php
function getConnect() {
    static $db = null;
    if (is_null($db)) {
        $db = @mysqli_connect(DB_HOST . ':' . DB_PORT, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Ошибка " . mysqli_connect_error());
    }
    return $db;
}

function getDBRequest($request) {
    // var_dump($request);
    // die();
    $res = @mysqli_query(getConnect(), $request) or die(mysqli_error(getConnect()));
    //В случае неудачи вернет FALSE
    //Для SELECT, SHOW, DESCRIBE или EXPLAIN вернет объект со значениями
    //Для остальных вернет TRUE
    if ($res === true) {
        $row = true;//bool
    } else if (isset($res->num_rows)) {
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);//array
    } else {
        $row = false;//bool
    }
    return $row;
}

function countChanges() {
    return mysqli_affected_rows(getConnect());
}

function lastId() {
    return mysqli_insert_id(getConnect());
}

function closeConnect() {
    mysqli_close(getConnect());
}