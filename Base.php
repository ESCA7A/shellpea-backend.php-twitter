<?php

require 'bootstrap.php';

#Base.php

session_start();

/**
 * Example setUrl('My/Path/Must/Be/Here/')
 * @dir '/Controller/Someindex.php' - absolute path
 * @param $url
 * @return string
 */
function setUrl($url, $time = 0) {
    $SERVER_NAME = $_SERVER['SERVER_NAME'];
    return "<head><meta http-equiv='refresh' content='$time;URL=http://$SERVER_NAME/$url' /></head>";
}

function rmCookie(){
    setcookie('customer_id', '', time()-999999);
    setcookie('customer_name', '', time()-999999);
    setcookie('customer_nickname', '', time()-999999);
    session_unset();
}



################################################
### HTML #######################################
################################################

/**
 * CSS STYLE CONST
 */
const STYLE = "<html><link rel='stylesheet' href='/View/Styles/Stylesheets.css'></html>";

/**
 * Set header
 * @param $header
 * @return string
 */
function setHeader($header, $align = 'center') :string{
    return "<h1 align='$align'> $header </h1>";
}


/**
 * @param $notice
 * @return string
 */
function setWarning($notice, $align = 'center'):string{
    return "<h1 align='$align'>$notice</h1>";
}

/**
 * @param $action
 * @return void
 */
function getAuthForm($action = '/Controller/'){
    echo "<head>
                <link rel=\'stylesheet\' href=\'/View/Styles/Stylesheets.css\'>
                <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
                <meta name='viewport' content='width=device-width, initial-scale=1' />
                <title>Sign in</title>
            </head>
            <body>
                <div class='main'>
                    <p class='sign' align='center'>Sign in Twitter</p>
                    <form class='form1' action='$action' METHOD='post'>
                      <input class='un ' type='text' align='center' placeholder='Username' name='auth_customer_name'>
                      <input class='un ' type='text' align='center' placeholder='Nickname' name='auth_customer_nickname'>
                      <input class='pass' type='text' align='center' placeholder='Password' name='auth_customer_password'>
                      <button class='submit' type='submit' align='center'>Sign in</button>
                    </form>
                    <form class='form1' action='$action' METHOD='get'>
                        <button type='submit'>registration</button>
                    </form>
                </div>
            </body>";
}

/**
 * get registration form
 * @return string
 */
function getRegistryForm():string{
    return "
<html>
<title>Facebook Style Homepage Design using HTML and CSS</title>
<head>
<link type='text/css' rel='stylesheet' href='/View/Styles/Registration.css' />
</head>
<body>
     <div class='fb-header-base'></div>
     <div class='fb-header'></div>
     <form action='/Controller/Registration/' method='post'>
         <div class='fb-body'>
            <div id='intro2' class='fb-body'>Create an account</div>
            <div id='intro3' class='fb-body'>It's free and always will be.</div>
            <div id='form3' class='fb-body'>
                <input placeholder='username' type='text' id='namebox' name='reg_customer_name' />
                <input placeholder='nickname' type='text' id='namebox' name='reg_customer_nickname' /> <br>
                <input placeholder='Password' type='password' id='mailbox' name='reg_customer_password' /><br>
                <input type='radio' id='r-b' name='sex' value='male' />Male
                <input type='radio' id='r-b' name='sex' value='female' />Female<br><br>
                <p id='intro4'>By clicking Create an account, you agree to our Terms and that you have read our Data Policy, including our Cookie Use.</p>
                <input type='submit' class='button2' value='Create an account' />
                <br><hr>
                <p id='intro5>Create a Page for a celebrity, band or business.</p>
            </div>
         </div>
     </form>
    <div class='fb-body-footer'>
        <div id='fb-body-footer-base class='fb-body-footer'>English (UK)<br><hr>
            Log In	&copy; www.coderglass.com &nbsp;&nbsp; 
        </br>Design by Varun Singh</div>
    </div>
</body>
</html>";
}

function endSessionBtn($path = 'Controller/ExitButton/', $submitText = 'end session'){
    echo " 
        <form class='form1' action='$path' METHOD='post'>
            <button type='submit'>$submitText</button>
        </form>";
}

function getTweetHTML($username, $user_nickname, $userText, $stylesPath = 'View/Styles/Tweet.css'){
    $name = $_COOKIE['username'];
    $username = $_COOKIE['nickname'];
    echo "
<link href='https://fonts.googleapis.com/css?family=Asap' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<link href='$stylesPath' rel='stylesheet'>
<div class='tweet-wrap'>
  <div class='tweet-header'>
    <img src='https://pbs.twimg.com/profile_images/1012717264108318722/9lP-d2yM_400x400.jpg' alt='' class='avator'>
    <div class='tweet-header-info'>
     $name  <span>@$username</span><span>. Jun 27
</span>
      <p>$userText</p>
    </div>
    
  </div>
  <div class='tweet-img-wrap'>
    <img src='https://pbs.twimg.com/media/Dgti2h0WkAEUPmT.png' alt='' class='tweet-img'>
  </div>
  <div class='tweet-info-counts'>
    
    <div class='comments'>
      
      <svg class='feather feather-message-circle sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z'></path></svg>
      <div class='comment-count'>33</div>
    </div>
    
    <div class='retweets'>
      <svg class='feather feather-repeat sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><polyline points='17 1 21 5 17 9'></polyline><path d='M3 11V9a4 4 0 0 1 4-4h14'></path><polyline points='7 23 3 19 7 15'></polyline><path d='M21 13v2a4 4 0 0 1-4 4H3'></path></svg>
      <div class='retweet-count'>397</div>
    </div>
    
    <div class='likes'>
      <svg class='feather feather-heart sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg>
      <div class='likes-count'>
    2.6k
    </div>
    </div>
    
    <div class='message'>
      <svg class='feather feather-send sc-dnqmqq jxshSx' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' aria-hidden='true'><line x1='22' y1='2' x2='11' y2='13'></line><polygon points='22 2 15 22 11 13 2 9 22 2'></polygon></svg>
    </div>
  </div>
</div>";
}

/**
 * @param $action
 * @return void
 */
function getTweetFieldHTML($action = 'Home/'){
    echo "<form  name='tweet' action='Home/' method='post'>
  <input type='hidden' name='url' value='foobartheroobar'>
   <textarea id='textar' name='text' maxlength='140'></textarea>
  <input type='submit' value='Tweet This' id='button'/>
</form>";
}

