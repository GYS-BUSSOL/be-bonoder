<?

namespace App\Helpers;

class LdapHelper
{
    // public static function getLdap($username, $password)
    // {
    //     $adServer = ['ldap://gysdc01.gyssteel.com', 'ldap://gysdc02.gyssteel.com'];
    //     $username = $username;
    //     $password = $password;
    //     $ldapConnected = false;
    //     foreach ($adServer as $server) {
    //         $ldap = @ldap_connect($server);
    //         if ($ldap) {
    //             ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    //             ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    //             $ldaprdn = "gys\\" . $username;
    //             $bind = @ldap_bind($ldap, $ldaprdn, $password);

    //             if ($bind) {
    //                 $ldapConnected = true;
    //                 break;
    //             }
    //         }
    //     }
       

    //     $ldaprdn = 'gys' . "\\" . $username;
    //     ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    //     ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    //     $binConnected = ldap_bind($ldap, $ldaprdn, $password);
    //     return $binConnected;
    // }


    // public static function loginWithLdap() {}

    // public static function loginWithoutLdap() {}
}
