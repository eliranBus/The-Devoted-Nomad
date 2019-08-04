<?php

require_once 'db_config.php';

if (!function_exists('old')) {

  /**
   *
   * Restore the value from a field input.
   *
   * @param    string  $fn The input name
   * @return   string
   *
   */
  function old($fn)
  {
    return $_REQUEST[$fn] ?? '';
  }
}

if (!function_exists('csrf_token')) {

  /**
   *
   * Generate random string.
   *
   * @return   string
   *
   */
  function csrf_token()
  {

    $token = sha1('$$' . rand(1, 1000) . 'tdn');
    $_SESSION['token'] = $token;
    return $token;
  }
}

if (!function_exists('auth_user')) {

  /**
   *
   * Check if user is the same.
   *
   * @return   boolean
   *
   */
  function auth_user()
  {

    $auth = false;

    if (isset($_SESSION['user_id'])) {

      if (isset($_SESSION['user_ip']) &&  $_SESSION['user_ip'] == $_SERVER['REMOTE_ADDR']) {

        if (isset($_SESSION['user_agent']) && $_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT']) {

          $auth = true;
        }
      }
    }

    return $auth;
  }
}

if (!function_exists('email_exist')) {

  /**
   * 
   * @param  string
   * 
   * @return  boolean
   *  
   */

  function email_exist($email, $link)
  {

    $exist = false;
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

      $exist = true;
    }

    return $exist;
  }
}
