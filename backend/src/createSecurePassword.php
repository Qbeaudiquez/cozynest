<?php

function createSecurePassword($password){
    return password_hash($password, PASSWORD_BCRYPT);
}