<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\Event;
use App\Models\EventUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        return view('site.index');
    }
    public function login(Request $request)
    {
        return view('site.login');
    }

    public function loginAuthentication(Request $request)
    {
        $data = $request->all();
        if (!empty($data) && $data['email'] && $data['password']) {
            $attemptData = array("email" => $data['email'], "password" => $data['password']);
            if (Auth::attempt($attemptData)) {
                $request->session()->regenerate();
                return redirect('/');
            } else {
                return back()->withErrors([
                    'errors' => 'user authentication failed.',
                ]);
            }
        } else if (!empty($data) && $data['email']) {
            return back()->withErrors([
                'email' => 'plz enter valid email and password.',
            ])->onlyInput('email');
        }
    }
    public function register(Request $request)
    {
        return view('site.register');
    }

    public function createUser(Request $request)
    {
        $data = $request->all();
        if (!empty($data) && $data['email']) {

            $credentials = $request->validate([
                'first_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'number' => ['required', 'string'],
                'email' => ['required', 'email']
            ]);

            if ($credentials) {
                $user = User::where("email", $data['email'])->first();
                if (empty($user))
                    $pass_plain = SiteController::getName(8);
                $password = bcrypt($pass_plain);
                $user = User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'number' => $data['number'],
                    'email' => $data['email'],
                    'email_verified_at' => now(),
                    'password' => $password
                ]);
                if ($user) {
                    $user_name = $user->first_name . " " . $user->last_name;
                    $site_name = env("SITE_NAME", "UNIV SPORTA");
                    $subject = "Welcome to $site_name";
                    $email_sender_name = env("EMAIL_SENDER_NAME", "UNIV SPORTA");
                    $email = $data['email'];
                    $message = "
                    <p>Dear $user_name,</p><br>
                    <p>Thank you for registering with us! We are thrilled to welcome you to our community and appreciate your interest
                    in our Univ.<br>Your registration has been successfully processed, and you are now a valued member of our platform.
                    <br>We are committed to providing you with the best possible user experience, and we will work diligently to ensure 
                    that you have access to all the resources you need.<br>Once again, thank you for registering with us.<br>We look forward 
                    to serving you and providing you with a seamless user experience.</p>
                    <p>Your Login Credentials are:<br>
                    email: $email<br>
                    password: $pass_plain<br>
                    </p>
                    <br>Best regards,
                    <br>$email_sender_name <br>
                    $site_name
                    ";
                    $mailData = array("email" => $user->email, "first_name" => $user->first_name, "last_name" => $user->last_name, "subject" => $subject, "message" => $message);

                    $sent = Email::sendEmail($mailData);
                    if ($sent) {
                        return redirect()->back()->with('success', 'You have been successfully registered and your password is sent on your registered email id. Please login with the password in the email id.In case you have not recieved email in the inbox, please check your spam or junk folder ');
                    }
                } else
                    return back()->withErrors([
                        'email' => 'user already exists.',
                    ])->onlyInput('email');
                if ($user)
                    return redirect("login");
            }
        } else {
            echo "not post";
        }
    }
    public static function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function forgot(Request $request)
    {

        return view('site.forgot');
    }
    public function forgotPasswordUser(Request $request)
    {
        $data = $request->all();
        $email = $data['email'];
        if (!empty($email)) {
            $user = User::where("email", $email)->first();
            if ($user) {
                $user_name = $user->first_name . " " . $user->last_name;
                $payload = "email=" . $email;
                $payload = Crypt::encryptString($payload);
                $link = env("APP_URL", "") . "/reset?t=" . $payload;
                $subject = "Reset Your Password";
                $site_phone = env("PHONE", "9599362404");
                $site_name = env("SITE_NAME", "UNIV SPORTA");
                $email_sender_name = env("EMAIL_SENDER_NAME", "UNIV SPORTA");
                $message = "
                <p>Dear $user_name,</p><br>
 
                <p>We have received a request to reset your password for your account on $site_name.
                <br>To reset your password,please follow the instructions below:
                <br>Click on $link.
                <br>Enter new password
                 
                <br>If you did not make this request or believe someone else may have accessed your account, please contact us 
                immediately at $site_phone. 
                <br>We take the security of our users' accounts very seriously and will work with you to ensure your account remains 
                secure.
                                 
                <br>Thank you for your attention to this matter, and please do not hesitate to contact us if you have any questions or 
                concerns.</p>
                 
                <br>Best regards,
                 
                <br>$email_sender_name <br>
                $site_name
            ";
                $mailData = array("email" => $email, "first_name" => $user->first_name, "last_name" => $user->last_name, "subject" => $subject, "message" => $message);
                $sent = Email::sendEmail($mailData);
                if ($sent) {
                    return redirect()->back()->with('success', 'Email sent to your registered email id. please check your email and follow the instructions.');
                }
            } else {
                echo "user not found";
            }
        } else {
        }
    }
    public function resetPassword(Request $request)
    {
        $data = $request->all();
        $t = $data['t'];
        $payload = Crypt::decryptString($t);
        $email = "";
        if (!empty(explode("=", $payload)[1]) && filter_var(explode("=", $payload)[1], FILTER_VALIDATE_EMAIL)) {
            $email = $t;
        }
        return view('site.resetPassword', ["email" => $email]);
    }
    public function resetPasswordUser(Request $request)
    {
        $data = $request->all();
        $email = "";
        if (!empty($data['email']) && !empty($data['password1']) && !empty($data['password2'])) {
            $email = Crypt::decryptString($data['email']);
            $email = explode("=", $email)[1];
            $password1 = $data['password1'];
            $password2 = $data['password2'];
            if (strcmp($password1, $password2) == 0) {
                $user = User::where(["email" => $email])->first();
                if ($user) {
                    $user->password = Hash::make($data['password1']);
                    if ($user->save()) {
                        return redirect()->back()->with('success', 'Your Password has been updated succcessfully. Please continue to login.');
                    } else {
                        return redirect()->back()->with('error', 'Something went wrong');
                    }
                } else {
                    return redirect()->back()->with('error', 'No user found with the given email ' . $email);
                }
            } else {
                return redirect()->back()->with('error', 'Passwords donot match');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter both passwords');
        }
    }
    public function subscribe(Request $request)
    {
        $data = $request->all();
        $email = $data['email'];
        if (empty($email)) {
            return redirect()->back()->with('error', 'plz enter email');
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $subject = "Subscribe for Updates";
            $site_name = env("SITE_NAME", "UNIV SPORTA");
            $email_sender_name = env("EMAIL_SENDER_NAME", "UNIV SPORTA");
            $message = "
                <p>Dear Subscriber,</p><br>
 
                <p>I am writing this email to express my gratitude for subscribing to our updates email. We appreciate your interest in our UNIV SPORTA TECH, and we are committed to keeping you informed about our latest developments.</p>
                <p>As a subscriber, you will receive regular updates on our events. We value your privacy, and we will never share your information with third parties.</p>
                <p>We understand that your time is valuable, and we will make sure that the emails you receive from us are informative and useful. We welcome your feedback and suggestions and are always looking for ways to improve our communication with our subscribers.</p>
                <p>If you ever want to unsubscribe or update your email preferences, you can do so by clicking on the \"unsubscribe\" link at the bottom of any of our emails.</p>
                <p>Once again, thank you for subscribing to our updates email. We look forward to sharing our news and offerings with you.</p>

                <br>Best regards,
                 
                <br>$email_sender_name <br>
                $site_name
            ";
            $mailData = array("email" => $email, "first_name" => "subscriber", "last_name" => "", "subject" => $subject, "message" => $message);
            $sent = Email::sendEmail($mailData);
            if ($sent) {
                return redirect()->back()->with('success', 'You have successfully subscribed to our updates email. Please check your email regularly and stay updated.');
            } else {
                return redirect()->back()->with('error', 'There is some issue with email. plz check your email id and try again.');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter valid email');
        }
    }

    public function about(Request $request)
    {
        return view('site.about');
    }

    public function event(Request $request)
    {
        return view('site.event', ['events' => Event::all()]);
    }

    public function eventDetails(Request $request, $id)
    {
        return view('site.eventDetails', ['event' => Event::where('id', Crypt::decryptString($id))->first(), 'events' => Event::limit(3)->all()]);
    }

    public function gallery(Request $request)
    {
        return view('site.gallery');
    }

    public function contactus(Request $request)
    {
        return view('site.contactus');
    }

    public function registerNow(Request $request)
    {
        $post = $request->all();
        if (!empty($post)) {
            $user = User::where('email', $post['email'])->first();
            if ($user) {
                $event_user = EventUsers::create(['event_id' => $post['event_id'], 'user_id' => $user['id']]);
                if ($event_user) {
                    return redirect()->back()->with('success', 'You have successfully registered for this event.');
                } else {
                    return redirect()->back()->with('error', 'Plz try again later.');
                }
            } else {
                $credentials = $request->validate([
                    'first_name' => ['required', 'string'],
                    'last_name' => ['required', 'string'],
                    'number' => ['required', 'string'],
                    'email' => ['required', 'email']
                ]);

                if ($credentials) {
                    $user = User::where("email", $post['email'])->first();
                    if (empty($user)) {
                        $pass_plain = SiteController::getName(8);
                        $password = bcrypt($pass_plain);
                        $user = User::create([
                            'first_name' => $post['first_name'],
                            'last_name' => $post['last_name'],
                            'number' => $post['number'],
                            'email' => $post['email'],
                            'email_verified_at' => now(),
                            'password' => $password
                        ]);
                    }
                    $registeredUser = EventUsers::where(['event_id' => $post['event_id'], 'user_id' => $user['id']])->first();
                    if (empty($registeredUser)) {
                        $event_user = EventUsers::create(['event_id' => $post['event_id'], 'user_id' => $user['id']]);
                        if ($event_user) {
                            $user_name = $user->first_name . " " . $user->last_name;
                            $site_name = env("SITE_NAME", "UNIV SPORTA");
                            $subject = "Welcome to $site_name";
                            $email_sender_name = env("EMAIL_SENDER_NAME", "UNIV SPORTA");
                            $email = $post['email'];
                            $message = "
                            <p>Dear $user_name,</p><br>
                            <p>Thank you for registering with us! We are thrilled to welcome you to our community and appreciate your interest
                            in our Univ.<br>Your registration has been successfully processed, and you are now a valued member of our platform.
                            <br>We are committed to providing you with the best possible user experience, and we will work diligently to ensure 
                            that you have access to all the resources you need.<br>Once again, thank you for registering with us.<br>We look forward 
                            to serving you and providing you with a seamless user experience.</p>
                            <p>Your Login Credentials are:<br>
                            email: $email<br>
                            password: $pass_plain<br>
                            </p>
                            <br>Best regards,
                            <br>$email_sender_name <br>
                            $site_name
                            ";
                            $mailData = array("email" => $user->email, "first_name" => $user->first_name, "last_name" => $user->last_name, "subject" => $subject, "message" => $message);

                            $sent = Email::sendEmail($mailData);
                            if ($sent) {
                                return redirect()->back()->with('success', 'You have successfully registered for this event. Kindly check your email for details.');
                            } else {
                                return redirect()->back()->with('error', 'There is some issue with email. plz check your email id and try again.');
                            }
                        }else{
                            return redirect()->back()->with('error', 'There is some issue registration process. plz try again later.');
                        }
                    }
                }
            }
        }
    }
}
