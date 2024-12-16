<?

namespace App\Helpers;

class LdapHelper{
    public static function getLdap($username, $password){
        // $adServer = env('LDAP_ADSERVER');
        // $ldap = ldap_connect($adServer);
        // $username = $username;
        // $password = $password;

        // $ldaprdn = 'gys' . "\\" . $username;
        // ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        // ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

        // $binConnected = ldap_bind($ldap, $ldaprdn, $password);
        // return $binConnected;        
    }


    public static function loginWithLdap(){

    }

    public static function loginWithoutLdap(){

    }
}