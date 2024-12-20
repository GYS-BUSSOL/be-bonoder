<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Helpers\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login(Request $request)
    {
        try {
            $data = [
                'username' => ['required', 'string'],
                'password' => ['required', 'string']
            ];

            $validated = Validator::make($request->all(), $data);
            if($validated->fails()){
                return Response::error('Validation Error', $validated->errors());
            }
         
            $username = $validated['username'];
            $password = $validated['password'];

            $adServers = ["ldap://gysdc01.gyssteel.com", "ldap://gysdc02.gyssteel.com"];

            $ldapConnected = false;
            foreach ($adServers as $server) {
                $ldap = @ldap_connect($server);
                if ($ldap) {
                    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
                    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

                    $ldaprdn = "gys\\" . $username;
                    $bind = @ldap_bind($ldap, $ldaprdn, $password);

                    if ($bind) {
                        $ldapConnected = true;
                        break;
                    }
                }
            }

            if ($ldapConnected) {
                $filter = "(sAMAccountName=$username)";
                $result = @ldap_search($ldap, "dc=gyssteel,dc=com", $filter);

                if ($result) {
                    $entries = ldap_get_entries($ldap, $result);
                    if ($entries['count'] > 0) {
                        $userInfo = $entries[0];

                        Session::put('GROUP', $userInfo['memberof'][2] ?? '');
                        Session::put('ext', $userInfo['telephonenumber'][0] ?? '');
                        Session::put('email', $userInfo['mail'][0] ?? '');
                        Session::put('start', time());
                        Session::put('expire', time() + 300);

                        $user = $this->user->firstWhere('usr_name', $validated['username']);
                        $token = $user->createToken('access_token')->plainTextToken;

                        if ($user) {
                            Session::put('role', $user['usr_access']);
                            Session::put('nama', $user['usr_display_name']);
                            Session::put('usr_name', $user['usr_name']);
                            Session::put('usr_id', $user['usr_id']);
                            Session::put('bu_id', $user['bu_id']);
                            Session::put('app_id', $user['usr_approver2']);
                        }

                        return response()->json([
                            'status' => 201,
                            'message' => 'Login successfully',
                            'data' => $user,
                            'token' => $token
                        ], 201);
                    }
                }
            } else {
                return response()->json([
                    'status' => 400,
                    'errors' => 'Unauthorized',
                    'message' => 'Login failed, username or password is incorrect'
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'errors' => 'Server Error',
                'message' => 'Failed to login',
            ], 500);
        }
    }

    public function getUser() {}

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Logout successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => 'Server Error',
                'message' => 'An error occurred while logging out. Please try again later',
            ], 500);
        }
    }
}
