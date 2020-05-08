<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Array som skall innehålla alla fel som upptäcks */
$errors = [];

/* Lista på obligatoriska fält vi kan kontrollera */
$fields = ['username', 'email', 'password'];

function addError($key, $message)
{
    global $errors;
    $errors[$key][] = $message;
}
function showErrors($key)
{
    global $errors;
    if (array_key_exists($key, $errors)) {
        foreach ($errors[$key] as $error) {
            echo "$error<br>";
        }
    }
}
function validateUsername($data)
{
    /* Först rensa bort onödiga mellanslag */
    $username = trim($data);

    /* Rensa från farliga tecken */
    $username = filter_var($username, FILTER_SANITIZE_STRING);

    /* Kolla om tomt och uppfyller mönster */
    if (empty($username)) {
        addError('username', 'username cannot be empty');
    } else {
        if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $username)) {
            addError('username', 'username must be 6-12 chars & alphanumeric');
        }
    }
}
function validateEmail($data)
{
    /* Först rensa bort onödiga mellanslag */
    $email = trim($data);

    /* Rensa från farliga tecken */
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    /* Kolla om tomt och uppfyller mönster */
    if (empty($email)) {
        addError('email', 'email cannot be empty');
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            addError('email', 'email must be a valid email');
        }
    }
}
function validatePassword($data)
{
    /* Först rensa bort onödiga mellanslag */
    $password = trim($data);

    /* Rensa från farliga tecken */
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    /* Kolla om uppfyller mönster */
    if (empty($password)) {
        addError('password', 'password cannot be empty');
    } else {
        if (!preg_match("/[a-zåäö]/", $password) > 0) {
            addError('password', 'password must contain a least one lowercase character');
        }
        if (!preg_match("/[A-ZÅÄÖ]/", $password) > 0) {
            addError('password', 'password must contain a least one uppercase character');
        }
        if (!preg_match("/[0-9]/", $password) > 0) {
            addError('password', 'password must contain a least one alphanumeric');
        }
        if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $password) > 0) {
            addError('password', 'password must contain a least one special character');
        }
        if (!preg_match("/^.{8,40}$/", $password) > 0) {
            addError('password', 'password must at least 8 character long');
        }
    }
}

if (isset($_POST['submit'])) {

    /* Ta emot data */
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    /* Kontrollera att POST-variablerna finns */
    if ($username && $password && $email) {

        validateUsername($username);
        validatePassword($password);
        validateEmail($email);
    }
}
?>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form validator</title>
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <h2>Create a new user</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <div class="errors">
                <?php showErrors("username") ?>
            </div>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <div class="errors">
                <?php showErrors("password") ?>
            </div>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <div class="errors">
                <?php showErrors("email") ?>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>