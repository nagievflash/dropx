<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Redirect;
use Socialite;
use View;
use Auth;

class AuthController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return Response
     */
    public function login()
    {
        return Socialite::driver('telegram')->redirect();
    }


    /**
     * Callback with User's data
     * @param  string $provider Returns either twitter or github
     * @return array User's data
     */
    public function getUser()
    {
        $user = Socialite::driver('telegram')->user();

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('home');
    }


    /**
     * Find User and return or Create User and return
     * @param  Object $user
     * @return array User's data
     */
    private function findOrCreateUser($user)
    {
        if ($authUser = User::where('uid', $user->id)->first()) {
            $authUser->update([
                'avatar'    => $user->avatar,
                'name'      => $user->name,
                'username'  => $user->nickname
            ]);

            return $authUser;
        }



        $user = User::create([
            'uid'       => $user->id,
            'avatar'    => $user->avatar,
            'name'      => $user->name,
            'username'  => $user->nickname
        ]);

        $user->createWallet(
            [
                'name' => 'Рублевый кошелек',
                'slug' => 'RUB',
            ]
        );
        $user->createWallet(
            [
                'name' => 'Валютный кошелек',
                'slug' => 'USD',
            ]
        );
        $user->createWallet(
            [
                'name' => 'Bitcoin кошелек',
                'slug' => 'BTC',
            ]
        );
        $user->createWallet(
            [
                'name' => 'Ethereum кошелек',
                'slug' => 'ETH',
            ]
        );

        $user->createWallet(
            [
                'name' => 'DaHub кошелек',
                'slug' => 'DHB',
            ]
        );

        return $user;

    }
}
