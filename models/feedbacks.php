<?php
function doFeedbackAction ($request) {
    if (isset($url_array['feedback_id'])) {
        $action = $request['action'];
        $idFeed = (int) $request['feedback_id'];
        if (!empty($_POST) && empty($_POST['id'])) {
            addFeedback();
        } else if (!empty($_POST)) {
            editFeedback();
        }
        if ($action == 'edit') {
            $params['feed'] = getFeed($idFeed);
        }
        if ($action == 'delete') {
            delFeed($idFeed);
        }
    }
    return $params;
}
function getFeedbacksById($idProd) {
    return getDBRequest("SELECT * FROM feedbacks WHERE id_products = {$idProd} ORDER BY id DESC");
}

function getFeed($id) {
    return getDBRequest("SELECT * FROM feedbacks WHERE id = {$id}")[0];
}

function addFeedback() {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $_POST['feedback'])));
    $idProd = (int) $_POST['idProd'];
    return getDBRequest("INSERT INTO feedbacks (id_products, name, feedback) VALUES (\"{$idProd}\", \"{$name}\", \"{$feedback}\")");
}

function editFeedback() {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $_POST['feedback'])));
    $id = (int) $_POST['id'];
    return getDBRequest("UPDATE feedbacks SET name = \"{$name}\", feedback = \"{$feedback}\" WHERE id = {$id}");
}

function delFeed($id) {
    return getDBRequest("DELETE FROM feedbacks WHERE id = {$id}");
}
