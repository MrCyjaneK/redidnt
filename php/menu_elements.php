<?php
$menu_elements = [
    [
        "name" => "Home",
        "place" => "home"
    ],
    [
        "name" => "New",
        "place" => "posts_new"
    ],
    [
        "name" => "Top",
        "place" => "posts_top"
    ],
];
if (AUTH_OK) {
    $menu_elements[] = [
        "name" => "Account", // TODO: Put user account name here
        "place" => "account"
    ];
} else {
    $menu_elements[] = [
        "name" => "Login",
        "place" => "login"
    ];
    $menu_elements[] = [
        "name" => "Register",
        "place" => "register"
    ];
}
?>