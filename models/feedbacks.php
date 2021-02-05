<?php
function getFeedbacksById($idProd) {
    return getDBRequest("SELECT * FROM feedbacks WHERE id_products = {$idProd} ORDER BY id DESC");
}

function getFeed($id) {
    return getDBRequest("SELECT * FROM feedbacks WHERE id = {$id}");
}

function addFeedback($request) {
    return getDBRequest("INSERT INTO feedbacks (id_products, name, feedback) VALUES (\"{$request['idProd']}\", \"{$request['name']}\", \"{$request['feedback']}\")");
}

function editFeedback($request) {
    return getDBRequest("UPDATE feedbacks SET name = \"{$request['name']}\", feedback = \"{$request['feedback']}\" WHERE id = {$request['id']}");
}

function delFeed($id) {
    return getDBRequest("DELETE FROM feedbacks WHERE id = {$id}");
}
