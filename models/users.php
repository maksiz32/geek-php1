<?
function secUser($user) {
    return strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $user)));
}
function secPassword($pass) {
    return password_hash($pass, PASSWORD_DEFAULT);
}
function registration($request) {
    $username = secUser($request['username']);
    $password = secPassword($request['password']);
    $res1 = getDBRequest("INSERT INTO users (username, password) VALUES ('{$username}','{$password}')");
    return [$res1, $username];
}
function hasUser($req) {
    $user = getDBRequest("SELECT * FROM users WHERE username='{$req}'");
    if ($req === $user[0]['username']) {
        $user[0]['role'] = secPassword($user[0]['role']);
        return $user[0];
    } else {
        return false;
    }
}
function validateUser($user, $password) {
    $user = secUser($user);
    $getUser = hasUser($user);
    return (password_verify($password, $getUser['password']));
}
function is_admin($session) {
    $session = secUser($session);
    $role = getDBRequest("SELECT role FROM users WHERE username='{$session}'")[0];
    return  (password_verify('admin', $role['role']));
}
