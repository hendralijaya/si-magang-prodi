<?php 

if(!function_exists('checkRole')){
function checkRole($role)
{
    if ($role == '1') {
        return 'admin';
    } else if($role == '2') {
        return 'dosen';
    } else if($role == '3') {
        return 'mahasiswa';
    }
}
}