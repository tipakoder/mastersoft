<?php

$level_access = 2;
$currentUser = null;

if(isset($_COOKIE["authsession"])){
    if( $query = dbQueryOne("SELECT accounts.* FROM accounts, account_sessions WHERE account_sessions.sessionkey = '{$_COOKIE['authsession']}' AND accounts.id = account_sessions.aid") ){
        $level_access = ($query["type"] === "moderator") ? 1 : 0;
        $currentUser = $query;
    } else {
        setcookie("authsession", null, time()-3600, "/");
    }
}

