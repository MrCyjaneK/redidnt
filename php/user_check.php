<?php
if (isset($_SESSION['username'])) {
    define('AUTH_OK', true);
} else {
    define('AUTH_OK', false);
}