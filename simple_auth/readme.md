# Create simple authentication for PHP application
Sometimes you simply want to lock up a page for registered users only. The goal here is to create a module with mininal configuration. Simply include simple_auth.php at the top of the desired page and simple auth will prompt the user for email and password. If the credentials are valid, then the rest of the page will load. If not, then the user will get redirected to the registration page. 

## Goals
- Registration
- Session Authentication

## How to use
first clone the simple_auth folder into the root of your project.

pop this bad boy right at the top of the page you want to lock down.
`<?php include('simple_auth/simple_auth.php') ?>`

- configuration
  edit config.php to update paths for successful redirects
- make sure users.json is writeable
  `$ chmod -R 777 simple_auth/users.json`


## Services
All data handling and validation is handled through either AuthenticationService or RegistrationService

## AuthenticationService
Checks to see if credentials are valid or not
- IF VALID:
  load the rest of the page
- IF INVALID:
  header redirect to registration page
  with error message

## RegistrationService


# TODO
- [x]need to hash password for save into DB.
- [x]Add personalization ability to registration / reg success
  - [x] add firstname to registration
1. On failed auth then registration, submit post is not getting filtered out
  - [x] if form-submit, filter out.
  2. rename all submits to form-submit
- [x] Doesn't sound like registration is actually writing to json
- [x] Email format validation
- [x] change password to password field
- [ ] if user refreshes at registration success page, they should somehow go to login vs back to registration?
- [x] password minimum length of 8 characters
- [x] email stored and checked as all lowercase
- [x] clear for reflected xss getting saved to db
- [ ] Remove all debugging output
- [ ] Add please log in message to top of simple auth