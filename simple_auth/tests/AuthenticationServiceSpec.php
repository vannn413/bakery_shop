<?php
include('simple_auth/AuthenticationService.php');

// correct creds should return a valid auth
$email = 'admin@example.com';
$password = 'asdf1234';
$fpassword = 'bad pw';
$femail = 'invalid@email.com';

$auth =  new AuthenticationService($email, $password);
// assert($auth->is_authenticated());


// valid creds should login valid user
// assert($auth->login($email, $password));


// invalid creds should not login user
// assert($auth->login($femail, $fpassword) == false);

// should be able to get a user's key from username
assert($auth->get_user_key() == 0);

// should return true if user exists
assert($auth->user_exists());

// password provided should match password at user key
$user_key = $auth->get_user_key();
assert($auth->validate_password($user_key));

// on login, should be able to get a users name
$test = $auth->get_user_name();
assert($test == 'admin');