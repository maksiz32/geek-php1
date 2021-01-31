<?php
function getConnect() {
    static $db = null;
    if (is_null($db)) {
        $db = @mysqli_connect(DB_HOST . ':' . DB_PORT, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Ошибка " . mysqli_connect_error());
    }
    return $db;
}

function getDBRequest($request) {
    $db = getConnect();
    $res = @mysqli_query($db, $request) or die(mysqli_error($db));
    //В случае неудачи вернет FALSE
    //Для SELECT, SHOW, DESCRIBE или EXPLAIN вернет объект со значениями
    //Для остальных вернет TRUE
    if ($res === true) {
        $row = 'Ваш запрос обработан успешно. Изменено ' . countChanges($db) . ' строк.';
    } else if (isset($res->num_rows)) {
        $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    } else {
        $row = 'Ошибка при выполнении запроса';
    }
    // mysqli_close($db);
    return $row;
}

function countChanges($reqDB) {
    return mysqli_affected_rows($reqDB);
}

function delete($id) {
    return getDBRequest("DELETE FROM gallery WHERE id={$id}");
}