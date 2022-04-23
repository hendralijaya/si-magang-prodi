<?php 

if(!function_exists('checkRole')){
function checkRole($role)
{
    if ($role == '1') {
        return 'homeadmin';
    } else if($role == '2') {
        return 'homemahasiswa';
    } else if($role == '3') {
        return 'homeadmin';
    }
}
}