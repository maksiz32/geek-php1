<?php
function getFeedbacksById($idProd) {
    return getDBRequest("SELECT * FROM feedbacks WHERE id_products = {$idProd} ORDER BY id DESC");
}

function getFeed($id) {
    return getDBRequest("SELECT * FROM feedbacks WHERE id = {$id}")[0];
}

function addFeedback($request) {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $request['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $request['feedback'])));
    $idProd = (int) $request['idProd'];
    return getDBRequest("INSERT INTO feedbacks (id_products, name, feedback) VALUES (\"{$idProd}\", \"{$name}\", \"{$feedback}\")");
}

function editFeedback($request) {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $request['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $request['feedback'])));
    $id = (int) $request['id'];
    return getDBRequest("UPDATE feedbacks SET name = \"{$name}\", feedback = \"{$feedback}\" WHERE id = {$id}");
}

function delFeed($id) {
    return getDBRequest("DELETE FROM feedbacks WHERE id = {$id}");
}
