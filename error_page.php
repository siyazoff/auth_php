<?php
session_start();
if (isset($_SESSION['errorMessage'])) {
    echo "<p>" . $_SESSION['errorMessage'] . "</p>";
    unset($_SESSION['errorMessage']);
}
