<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    // register field validation and sending of otp
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ], [
                // for custom error message
                'name.required' => 'Name field cannot be empty',
             'email.required' => 'Email field cannot be empty',
            'email.unique' => 'You email must be unique'
            ]);


        // string method of validation
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|lowercase|max:255|unique:users'
        // 'password' => 'required|comfirmed|max: 10, Rules\password::defaults()'
        // ]);


            DB::beginTransaction();

            // generate otp and token
            $otp = rand(100000, 999999);
            $verificationToken = Str::random(40);
             $expiresAt = Carbon::now()->addMinutes(2);

            

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'user';
            



            $user->email_verification_token = $verificationToken;
             $user->email_verification_otp = $otp;
             $user->otp_expires_at = $expiresAt;
            $user->save();

            // dd($user);
          
            Mail::to($user->email)->send(new VerificationMail($otp));
            // or
            // Mail::mailer('smtp')->to($user->email)->send(new VerificationMail($otp));

            DB::commit();
            // dd('Email Sent');
          return redirect()->route('verify.otp', ['token' => $verificationToken])->with([
            'success' => 'We have sent an OTP for your email verification',
             'otpExpiresAt' => optional($user->otp_expires_at)->toIso8601string(),
        ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('User Registration Failed: ' . $e->getMessage());
            // dd('Failed', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }



        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(route('dashboard', absolute: false));
    }


    // showVerificationForm and token
    public function showVerificationForm($token)
    {
        // dd('We are in verification view');
        $user = User::where('email_verification_token', $token)->first();
        if (!$user) {
            abort(404, 'Invalid verification token');
        }
        return view('auth.verify-email', [
            'token' => $token,
            'email' => $user->email,
             // always send the expiry from DB in ISO format
        'otpExpiresAt' => $user->otp_expires_at 
            ? $user->otp_expires_at->toIso8601String() 
            : null,
        ]);
    }
// email masking 
// private function maskEmail($email): string
//     {
//         $emailParts = explode("@", $email);
//         $name = $emailParts[0];
//         $domain = $emailParts[1];

//         $maskedName = substr($name, 0, 2) . str_repeat('*', max(0, strlen($name) - 2));

//         return $maskedName . '@' . $domain;
    // }
    

// verifying of opt
    public function verifyOtp(Request $request, $token) 
    {
        try{
            $request->validate([
                'token' => 'required',
                'otp' => 'required|numeric|digits:6'
            ], [
                'otp.required' => 'please enter the verification code',
            ]);


            // first()-> this function take or request  the first user which has thesame verification token
            $user = User::where('email_verification_token', $token)->first();

            if(!$user){
                return redirect()->back()->with('error', 'Invalid verification token');
            }

            if ($user->email_verification_otp !== $request->otp) {
              return redirect()->back()->with('error', 'Invailed otp');
            }
            if(carbon::now()->greaterThan($user->otp_expires_at)) {
                return redirect()->back()->withErrors(['otp' => ' Expired Otp']);
            }

            // now() -> this method tells the current time and date a user is being verified
            $user->email_verified_at = now();
            $user->email_verification_token = null;
            $user->email_verification_otp = null;

            $user->save();
            //    dd('User is logged in');
               return redirect()->route('login')->with('success', 'Email verification completed, please login');

            Auth::login($user);
         
            // return redirect()->route('user.dashboard')->with('success', 'your email has verified and you have successfully logged in');
        } catch (Exception $e){
            // dd($e->getMessage());
            Log::error('User Registration Failed: ' . $e->getMessage());

        }

    }

    // resending of otp
public function resendOtp(Request $request, $token)
{
    try {
     
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return response()->json([
                'error' => 'User not found.'
            ], 404);
        }

        // Generate new OTP
        $otp = rand(100000, 999999);
        

        $user->email_verification_otp = $otp;
        $user->otp_expires_at = now()->addMinutes(2);
        $user->save();

        // Send OTP mail
        Mail::to($user->email)->send(new VerificationMail($otp));


        return response()->json([
            'success' => 'A new OTP has been sent to your email.',
            'otpExpiresAt' => $user->otp_expires_at->toIso8601String() 


        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'line'  => $e->getLine(),
            'file'  => $e->getFile(),
        ], 500);
    }
}
}