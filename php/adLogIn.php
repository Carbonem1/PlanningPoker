<?php

$ldap = ldap.connect("corp.emc.com");

if (! $link)
{

}

ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);

if ($bind = ldap_bind($ldap, $_POST['username']."@corp.emc.com", $_POST['password']))
{
  echo "logged_in";
}
else
{
  echo "Could'nt log in";
}

?>
