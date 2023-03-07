<?php

// get Amount

use App\Models\User;
use Carbon\Carbon;


function getIpInfo()
{
    $ip = null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }


    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);


    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');


    return $data;
}

function osBrowser()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    $data['os_platform'] = $os_platform;
    $data['browser'] = $browser;

    return $data;
}



function getDailyFromDeposit($id)
{
    $user = User::find($id);
    // get the last_paid_deposit using carbon
    $last_paid_deposit = Carbon::parse($user->last_paid_deposit);
    // get the current time using carbon    
    $now = Carbon::now();

    // check if the last_paid_deposit is exist or its null
    if ($user->last_paid_deposit == null) {
        if ($user->total_deposit > 0) {
            // if yes assign 1 percent to the deposit to the user
            $user->balance += ($user->total_deposit * 0.01);

            $user->save();
        }
        // after assigning the 1 percent make sure the user doesn't get it again till after 24 hours    
        $user->last_paid_deposit = Carbon::now();
        $user->save();
    } elseif ($last_paid_deposit->diffInHours($now) >= 24) {
        // check if the total_deposit of this user is > 0 
        if ($user->total_deposit > 0) {
            // if yes assign 1 percent to the deposit to the user
            $user->balance += ($user->total_deposit * 0.01);

            $user->save();
        }
        // after assigning the 1 percent make sure the user doesn't get it again till after 24 hours
        $user->last_paid_deposit = Carbon::now();
        $user->save();
    }
}






function getAmount($amount, $length = 0)
{
    if (0 < $length) {
        return round($amount + 0, $length);
    }
    return $amount + 0;
}
function printEmail($email)
{
    $beforeAt = strstr($email, '@', true);
    $withStar = substr($beforeAt, 0, 2) . str_repeat("**", 5) . substr($beforeAt, -2) . strstr($email, '@');
    return $withStar;
}
function showDateTime($date, $format = 'd M, Y h:i A')
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}

function showDate($date, $format = 'd M, Y')
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}



function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}

function getImage($image, $size = null)
{
    $clean = '';
    $size = $size ? $size : 'undefined';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    } else {
        return route('placeholderImage', $size);
    }
}
// function uploadImage($file, $location, $size = null, $old = null, $thumb = null)
// {
//     $path = makeDirectory($location);
//     if (!$path) throw new Exception('File could not been created.');

//     if (!empty($old)) {
//         removeFile($location . '/' . $old);
//         removeFile($location . '/thumb_' . $old);
//     }
//     $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
//     $image = Image  ::make($file);
//     if (!empty($size)) {
//         $size = explode('x', strtolower($size));
//         $image->resize($size[0], $size[1], function ($constraint) {
//             $constraint->upsize();
//         });
//     }
//     $image->save($location . '/' . $filename);

//     if (!empty($thumb)) {

//         $thumb = explode('x', $thumb);
//         Image::make($file)->resize($thumb[0], $thumb[1], function ($constraint) {
//             $constraint->upsize();
//         })->save($location . '/thumb_' . $filename);
//     }

//     return $filename;
// }

function uploadFile($file, $location, $size = null, $old = null)
{
    $path = makeDirectory($location);
    if (!$path) throw new Exception('File could not been created.');

    if (!empty($old)) {
        removeFile($location . '/' . $old);
    }

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
    $file->move($location, $filename);
    return $filename;
}
function imagePath()
{
    $data['gateway'] = [
        'path' => 'assets/images/gateway',
        'size' => '800x800',
    ];
    $data['verify'] = [
        'withdraw' => [
            'path' => 'assets/images/verify/withdraw'
        ],
        'deposit' => [
            'path' => 'assets/images/verify/deposit',
            'size' => '1920x1080'
        ]
    ];
    $data['image'] = [
        'default' => 'assets/images/default.png',
    ];
    $data['withdraw'] = [
        'method' => [
            'path' => 'assets/images/withdraw/method',
            'size' => '800x800',
        ]
    ];
    $data['ticket'] = [
        'path' => 'assets/images/support',
    ];
    $data['language'] = [
        'path' => 'assets/images/lang',
        'size' => '64x64'
    ];
    $data['logoIcon'] = [
        'path' => 'assets/images/logoIcon',
    ];
    $data['favicon'] = [
        'size' => '128x128',
    ];
    $data['extensions'] = [
        'path' => 'assets/images/extensions',
    ];
    $data['seo'] = [
        'path' => 'assets/images/seo',
        'size' => '600x315'
    ];
    $data['profile'] = [
        'user' => [
            'path' => 'assets/images/user/profile',
            'size' => '350x300'
        ],
        'admin' => [
            'path' => 'assets/admin/images/profile',
            'size' => '400x400'
        ]
    ];
    return $data;
}

function isUserExists($id)
{
    $user = User::find($id);
    if ($user) {
        // dd($user);
        return true;
    } else {
        return false;
    }
}
function getPaginate($paginate = 20)
{
    return $paginate;
}
function paginateLinks($data, $design = 'admin.partials.paginate')
{
    return $data->appends(request()->all())->links($design);
}

function diffForHumans($date)
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->diffForHumans();
}

function inputTitle($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}


function shortCodeReplacer($shortCode, $replace_with, $template_string)
{
    return str_replace($shortCode, $replace_with, $template_string);
}


// get trx
function getTrx($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
// function sendGeneralEmail($email, $subject, $message, $receiver_name = '')
// {
//     $general = GeneralSetting::first();
//     if ($general->en != 1 || !$general->email_from) {
//         return;
//     }

//     $message = shortCodeReplacer("{{message}}", $message, $general->email_template);
//     $message = shortCodeReplacer("{{name}}", $receiver_name, $message);
//     $config = $general->mail_config;

//     if ($config->name == 'php') {
//         sendPhpMail($email, $receiver_name, $general->email_from, $subject, $message);
//     } else if ($config->name == 'smtp') {
//         // sendSmtpMail($config, $email, $receiver_name, $general->email_from, $general->sitename, $subject, $message);
//         sendSmtpMail($config, $email, $receiver_name, $subject, $message, $general);
//     }
// }

// // notify
// /*SMS EMIL moveable*/



// function sendEmail($user, $type = null, $shortCodes = [])
// {
//     $general = GeneralSetting::first();

//     $email_template = EmailTemplate::where('act', $type)->where('email_status', 1)->first();
//     if ($general->en != 1 || !$email_template) {
//         return;
//     }

//     $message = shortCodeReplacer("{{name}}", $user->username, $general->email_template);
//     $message = shortCodeReplacer("{{message}}", $email_template->email_body, $message);

//     if (empty($message)) {
//         $message = $email_template->email_body;
//     }

//     foreach ($shortCodes as $code => $value) {
//         $message = shortCodeReplacer('{{' . $code . '}}', $value, $message);
//     }
//     $config = $general->mail_config;

//     // dd($config, $user->email, $user->username, $general->email_from, $email_template->subj, $message);

//     if ($config->name == 'php') {
//         sendPhpMail($user->email, $user->username, $email_template->subj, $message);
//     } else if ($config->name == 'smtp') {
//         sendSmtpMail($config, $user->email, $user->username, $email_template->subj, $message, $general);
//     }
// }


// function sendPhpMail($receiver_email, $receiver_name, $subject, $message)
// {
//     $gnl = GeneralSetting::first();
//     $headers = "From: $gnl->sitename <$gnl->email_from> \r\n";
//     $headers .= "Reply-To: $gnl->sitename <$gnl->email_from> \r\n";
//     $headers .= "MIME-Version: 1.0\r\n";
//     $headers .= "Content-Type: text/html; charset=utf-8\r\n";
//     @mail($receiver_email, $subject, $message, $headers);
// }


// function sendSmtpMail($config, $receiver_email, $receiver_name, $subject, $message, $gnl)
// {
//     $mail = new PHPMailer(true);
//     // dd($config, $gnl->email_from, $receiver_email, $receiver_name, $subject, $message);

//     try {
//         //Server settings
//         $mail->isSMTP();
//         $mail->Host = $config->host;
//         $mail->SMTPAuth = true;
//         $mail->Username = $config->username;
//         $mail->Password = $config->password;
//         // if ($config->enc == 'ssl' || $config->enc = "tls") {
//         // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//         // } else {
//         // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         // }
//         // $mail->SMTPDebug = true;
//         $mail->SMTPSecure = $config->enc;
//         $mail->Port = $config->port;
//         $mail->CharSet = 'UTF-8';
//         //Recipients
//         $mail->setFrom("admin@hdmi50.io", $gnl->sitetitle);
//         $mail->addAddress($receiver_email, $receiver_name);
//         $mail->addReplyTo($gnl->email_from, $gnl->sitename);
//         $mail->isHTML(true);
//         $mail->Subject = $subject;
//         $mail->Body = $message;
//         // $mail->send();

//         $mail->send();
//     } catch (Exception $e) {
//         // dd($e);
//         throw new Exception($e);
//     }
// }
