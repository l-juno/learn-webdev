<?
$G_USER_ID = 'justin';
$G_USER_PW = '1111';

$user_id = $_REQUEST['username'];
$user_pw = $_REQUEST['password'];

$results = [];
if ($user_id === $G_USER_ID && $user_pw === $G_USER_PW) {
    $results['result'] = 'SUCCESS';
    $results['message'] = 'Valid account';
    setcookie("username", $user_id, time()+ 60, "/");
} else {
    $results['result'] = 'FAIL';
    $results['message'] = 'Invalid account';
}

echo json_encode($results);

?>