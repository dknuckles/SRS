<?php
session_start();
$user_check=$_SESSION['login_user'];
$pass_check=$_SESSION['login_pass'];
    $adServer = "ldap://petsvr1100.petcad1100";
	
    $ldap = ldap_connect($adServer);
    $username = $user_check;
    $password = $pass_check;

    $ldaprdn = 'petcad1100' . "\\" . $username;

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    $bind = @ldap_bind($ldap, $ldaprdn, $password);
    if ($bind) {
        $filter="(sAMAccountName=$user_check)";
        $result = ldap_search($ldap,"dc=petcad1100",$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++){
			$fullname	= $info[$i]["cn"][0];
            $firstname = $info[$i]["givenname"][0];
            $middlename = $info[$i]["initials"][0];
            $lastname = $info[$i]["sn"][0];
            $ldap_displayname = $info[$i]["displayname"][0];
            $ldap_derpartment = $info[$i]["department"][0];
			$sam = $info[$i]["samaccountname"][0];
			
            $department = $info[$i]["department"][0];
			//@ldap_close($ldap);
			//
		}		
    }
$login_session=$username;
if($ldap_derpartment != "MIS"){
    /*
    echo"<script>alert('MIS member only')</script>";
    header("Location: login.php");
    */
    echo"<script>
		alert('MIS member only');
		window.location.href = 'login.php';
	</script>";
}elseif(!isset($login_session)){
    header("Location: login.php");
}
/*
$fullname = $info[$i]["cn"][0];
$firstname = $info[$i]["givenname"][0];
$lastname = $info[$i]["sn"][0];
//$description = $info[$i]["title"][0];
$sam = $info[$i]["samaccountname"][0];

$cn	= $info[$i]["cn"][0];
$firstname = $info[$i]["givenname"][0];
$middlename = $info[$i]["initials"][0];
$lastname = $info[$i]["sn"][0];
$ldap_displayname = $info[$i]["displayname"][0];
$ldap_derpartment = $info[$i]["department"][0];
*/

?>