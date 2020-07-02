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
    [
        "name" => "subs",
        "place" => "search_subs"
    ]
];
if (AUTH_OK) {
    $menu_elements[] = [
        "name" => $_SESSION['username'], // TODO: Put user account name here
        "place" => "account"
    ];
    $menu_elements[] = [
        "name" => "Write",
        "place" => "write"
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