<?php

function set_message($msg)
{
    if(!empty($msg))
    {
        $_SESSION['message'] = $msg;
    }
    else
    {
        $msg ="";
    }

}
function display_message()
{
    if(isset($_SESSION['message']))
    {
       echo $_SESSION['message'];
       unset($_SESSION['message']);
    }
}

function set_error_message($error)
{
    if(!empty($error))
    {
        $_SESSION['error_message'] = $error;
    }
    else
    {
        $error ="";
    }
}
function error_message()
{
    if(isset($_SESSION['error_message'])){
       echo $_SESSION['error_message'];
       unset($_SESSION['error_message']);
    }
}


function redirect($location)
{
  return header("Location: $location");
}