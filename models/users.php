<?
function secUser($user = null) {
    (is_null($user)) ? $user = $_POST['username'] : true;
    return strip_tags(htmlspecialchars(mysqli_real_escape_string(getConnect(), $user)));
}
function secPassword($pass) {
    return password_hash($pass, PASSWORD_DEFAULT);
}
function registration() {
    $username = secUser($_POST['username']);
    $password = secPassword($_POST['password']);
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
function validateUser() {
    $user = secUser($_POST['username']);
    $getUser = hasUser($user);
    return (password_verify($_POST['password'], $getUser['password']));
}
function is_admin($user) {
    $user = secUser($user);
    $role = getDBRequest("SELECT role FROM users WHERE username='{$user}'")[0];
    return password_verify('admin', $role['role']);
}
