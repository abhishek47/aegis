<?php
namespace App\Http\Controllers\Auth;

use Socialite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\Social;
use App\User;

class SocialController extends Controller
{
    
    public function getSocialRedirect( $provider )
    {
        $providerKey = Config::get('services.' . $provider);
        if (empty($providerKey)) {
            return view('pages.status')
                ->with('error','No such provider');
        }
        return Socialite::driver( $provider )->redirect();
    }
    public function getSocialHandle( $provider )
    {
        if (Input::get('denied') != '') {
            return redirect()->to('login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our social app.');
        }

        if($provider != 'google') {
          $user = Socialite::driver( $provider )->user();
        } else {
          $user = Socialite::driver( $provider )->stateless()->user();
        } 

        $socialUser = null;
        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();
        $email = $user->email;
        
        if (!$user->email) {
            $email = 'missing' . str_random(10);
        }
        
        if (!empty($userCheck)) {
            $socialUser = $userCheck;
        }
        else {

            $sameSocialId = Social::where('social_id', '=', $user->id)
                ->where('provider', '=', $provider )
                ->first();

            if (empty($sameSocialId)) {
                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;

                $name = $user->name;

                $newSocialUser->email = $email;
                
                $newSocialUser->name = $name;
               
                $newSocialUser->password = bcrypt(str_random(16));

              //  $newSocialUser->token = str_random(64);
               // $newSocialUser->activated = true; //!config('settings.activation');
                $newSocialUser->save();
                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $newSocialUser->social()->save($socialData);
               
               // Add role
               // $role = Role::whereName('user')->first();
               // $newSocialUser->assignRole($role);
               // $this->initiateEmailActivation($newSocialUser);
               
                $socialUser = $newSocialUser;
            }
            else {
                //Load this existing social user
                $socialUser = $sameSocialId->user;
            }
        }
        
        auth()->login($socialUser, true);
            

        return redirect('/');
        
           
       
    }
}