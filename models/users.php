<?
function secUser($user) {
    return strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $user)));
}
function secPassword($pass) {
    $pass = strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $request['password'])));
    return password_hash($pass, PASSWORD_DEFAULT);
}
function registration($request) {
    $username = secUser($request['username']);
    $password = secPassword($request['password']);
    $res1 = getDBRequest("INSERT INTO users (username, password) VALUES ('{$username}','{$password}')");
    return [$res1, $username];
}
function hasUser($req) {
    $user = getDBRequest("SELECT username, password FROM users WHERE username='{$req}'");
    if ($req === $user[0]['username']) {
        return $user[0];
    } else {
        return false;
    }
}
function validateUser($user, $password) {
    $user = secUser($user);
    $pass = secPassword($password);
    $getUser = hasUser($user);
    if ($getUser && hash_equals($getUser['password'], $pass)) {
        return true;
    }
    return false;
}
