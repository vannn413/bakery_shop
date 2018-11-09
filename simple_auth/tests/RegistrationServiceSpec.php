<?php
include('simple_auth/RegistrationService.php');

$fname = 'testadmin';
$e = 'admin3@example.com';
$p = 'asdf1234';
$pc = 'asdf1234';

$reg = new RegistrationService($fname, $e, $p, $pc);

// passwords should match
$test = $reg->passwords_match();
assert($test);

// user should not already exist
$test = $reg->duplicate_user();
assert(!$test);

// user registration should have an errors array
$test = $reg->get_errors();
assert(is_array($test));
assert(empty($test));

// assuming last 2 tests true, reg should be successful
$test = $reg->successful();
assert($test);

// user email should get validated as correct format
$test = $reg->valid_email();
assert($test);

// write new user to file
// $reg->register_user();

// error checking
$fname = 'testadmin';
$e = 'admin3example.com';
$p = 'asdf';
$pc = 'asdfasdf';

$reg = new RegistrationService($fname, $e, $p, $pc);

// invalid user should have email format error
$test = $reg->get_errors();
assert(array_key_exists('email_format', $test));


// invalid user should have password length error
assert(array_key_exists('pass_length', $test));
