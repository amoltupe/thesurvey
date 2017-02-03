<?php
define("GOOGLE_API_KEY", "AIzaSyAtb2FmGWQaowqSAcmVUCBBF1TU82PWW_0");    // Server Key
//define("GOOGLE_API_KEY", "AIzaSyB3-LhbEUKN_CGskkFHYkdheivp1RebX8s");    // API Key
define("GOOGLE_GCM_URL", "https://android.googleapis.com/gcm/send");

/**
 * print well formatted arary
 */
function pr($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

/**
 * print well formatted arary and stop execution
 */
function pre($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    exit();
}

function get_breadcrumb($title, $link = '#') {
    return '<div>
	    <ul class="breadcrumb">
	        <li>
	            <a href="' . BASE_URL . '">Home</a>
	        </li>
	        <li>
	            <a href="' . $link . '">' . $title . '</a>
	        </li>
	    </ul>
	</div>';
}

function get_user_lang() {
    if (!$lang = get_instance()->session->userdata('user_language'))
        return 'en';
    else
        return $lang;
}

function get_profile_image_for_DB($col_name = 'profile_pic', $alias_name = 'profile_pic'){
    return "CONCAT('".BASE_PATH.FOLDER_USER."' ,$col_name) as $alias_name";
}
function get_post_image_for_DB($col_name = 'post_image', $alias_name = 'post_image'){
    return "CONCAT('".BASE_PATH.FOLDER_IMAGES."' , $col_name) as $alias_name";
}
function get_banner_image_for_DB($col_name = 'banner_image', $alias_name = 'banner_image'){
    return "CONCAT('".BASE_PATH.FOLDER_BANNER."' , $col_name) as $alias_name";
}
/**
 * 
 * @param $devices = common->get_device_ids();
 * @param unknown $message  */
function send_mobile_notification($devices, $extra_fields = array()) {
    if (isset($devices['android_device_ids']) && !empty($devices['android_device_ids'])) {
        send_gcm_notify($devices['android_device_ids'], $extra_fields);
    }

    if (isset($devices['ios_device_ids']) && !empty($devices['ios_device_ids'])) {
        send_IOS_notify($devices['ios_device_ids'], $extra_fields);
    }
}

function sendPushNotificationToGCM($registatoin_ids, $message) {
		//Google cloud messaging GCM-API url
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);	
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);				
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
    
function sendPushNotification($registatoin_ids, $message) {
    $msg = array
    (
        'message' => $message,
        'title' => 'Android Push Notification using Google Cloud Messaging',
        'subtitle' => 'www.aabbccdd.net',
        'tickerText' => 'Ticker text here...Ticker text here...Ticker text here',
        'vibrate' => 1,
        'sound' => 1,
        'largeIcon' => 'large_icon',
        'smallIcon' => 'small_icon'
    );
    
    // Set POST variables
    $url = 'https://android.googleapis.com/gcm/send';
    $fields = array(
        'registration_ids' => $registatoin_ids,
        'data' => $msg,
    );
    $headers[] = 'Content-Type:application/json';
    $headers[] = 'Authorization:key=AIzaSyAtb2FmGWQaowqSAcmVUCBBF1TU82PWW_0';
    // Open connection
    $ch = curl_init();
    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    // Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    
//    curl_setopt($ch, CURLOPT_PROXY, "http://desaipharma.in"); //your proxy url
//    curl_setopt($ch, CURLOPT_PROXYPORT, "443"); // your proxy port number
//
    // Execute post
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    // Close connection
    curl_close($ch);
    echo $result;
}

function sendPushNotification_old1($registrationIds, $message)
{
    $msg = array
    (
        'message' => $message,
        'title' => 'Android Push Notification using Google Cloud Messaging',
        'subtitle' => 'www.simplifiedcoding.net',
        'tickerText' => 'Ticker text here...Ticker text here...Ticker text here',
        'vibrate' => 1,
        'sound' => 1,
        'largeIcon' => 'large_icon',
        'smallIcon' => 'small_icon'
    );

    $fields = array
    (
        'registration_ids' => $registrationIds,
        'data' => $msg
    );

    $headers = array
    (
        'Authorization: key=' . GOOGLE_API_KEY,
        'Content-Type: application/json'
    );
pr($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    $code = curl_getinfo($ch);
    echo 'info';
    pr($code);
    echo 'result';
    pre($result);
    curl_close($ch);

    return $res = json_decode($result);

    $flag = $res->success;
    if($flag >= 1){
        header('Location: index.php?success');
    }else{
        header('Location: index.php?failure');
    }
}

function sendPushNotification_old($registration_ids, $message) {

    $url = 'https://android.googleapis.com/gcm/send';
    $fields = array(
        'registration_ids' => $registration_ids,
        'data' => $message,
    );


    $headers = array(
        'Authorization:key=' . GOOGLE_API_KEY,
        'Content-Type: application/json'
    );
    echo json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    $result = curl_exec($ch);
    if($result === false)
        die('Curl failed ' . curl_error($ch));

    curl_close($ch);
    return $result;

}
function send_gcm_notify($registatoin_ids, $extra_fields = array()) {

    // Set POST variables
    $url = GOOGLE_GCM_URL;

    $data = array(
        'registration_ids' => $registatoin_ids,
        'data' => array($extra_fields),
    );

    $fields = array_merge($data, $extra_fields);

    $headers = array(
        'Authorization: key=' . GOOGLE_API_KEY,
        'Content-Type: application/json'
    );
    // Open connection
    $ch = curl_init();

    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    // Execute post
    $result = curl_exec($ch);
pr($result);
    // Close connection
    curl_close($ch);
    return $decode = json_decode($result);
    $cnt = $decode->success;
    if ($cnt <= 0) {
        //die('Curl failed: ' . curl_error($ch));
        return false;
    } else
        return $decode;
}

/* $extra_fields['message'] = 'Test Message';
  $extra_fields['type'] = 'test_type';
  send_IOS_notify('1923689849c58568779d73d38012a1654945a3ef3b39567050212fc28426c20f', $extra_fields); */

function send_IOS_notify($deviceToken, $extra_fields = array()) {

    /* $extra_fields['badge'] = 10;
      pr($extra_fields);
      $deviceToken = '1923689849c58568779d73d38012a1654945a3ef3b39567050212fc28426c20f'; */

    $result = FALSE;
    $passphrase = '';
    $ctx = stream_context_create();
    stream_context_set_option($ctx, 'ssl', 'local_cert', 'vivipietrasanta_APNS_dev.pem');

    $fp = stream_socket_client(
            'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 120, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

    if (!$fp)
        exit("Failed to connect: $err $errstr" . PHP_EOL);

    //echo 'Connected to APNS' . PHP_EOL;
    $data = array(
        'alert' => $extra_fields['message'],
        'sound' => 'default',
            //'count' => '25',
            //'badge' => 25
    );

    $body['aps'] = array_merge($data, $extra_fields);

    //echo '<pre>'; print_r($body);
    $payload = json_encode($body);

    /*  Used for sending messages on multiple devices at a time	 */
    if (is_string($deviceToken)) {
        $deviceToken = array($deviceToken);
    }

    if (count($deviceToken) > 0) {
        foreach ($deviceToken as $token) {
            $msg = chr((0)) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;

            $result = fwrite($fp, $msg, strlen($msg));
        }
    }
    fclose($fp);

    if (!$result)
        return "0";
    else
        return "1";
}

function is_json($string) {
    if (is_object(json_decode($string)))
        return TRUE;
}

/**
 * Used in pagination
 * Just use this function where need to use pagination
 * @param pagination count  $pagination_count  */
function get_limit($pagination_count = PAGINATION_COUNT) {
    $page = '';
    if (isset($_GET['page']) && $_GET['page'] != '')
        $page = $_GET['page'];
    elseif (isset($_POST['page']) && $_POST['page'] != '')
        $page = $_POST['page'];

    if ($page !== '') {
        $page = $page - 1;
        get_instance()->db->limit($pagination_count, $page * $pagination_count);
    } else
        get_instance()->db->limit($pagination_count, 0);
}

function instance($class) {
    return get_instance()->{$class};
}

/* Store post params with IP address */

function save_log() {
    //$fileName = BASE_DIR . 'log/' ."log.txt"; /* date ( 'Ymd' ) . */ 
    $fileName = BASE_DIR . 'log';
//        if(!file_exists($fileName)){
//            mkdir ($fileName, 0777, TRUE);
//        }
//      
    createFolder($fileName);
    $ip = instance('input')->ip_address();
    $fileName .= '/' . date('Ymd') . ".txt";
//        chmod($fileName, 0777);
    $dataStore = date('Y-m-d H:i:s') . ' ->' . $ip . '->' . basename($_SERVER ['REQUEST_URI'], '/') . PHP_EOL . json_encode($_POST) . json_encode($_FILES) . PHP_EOL . PHP_EOL;
    file_put_contents($fileName, $dataStore, FILE_APPEND); // Store log
}


/**
 * Check is valid and not empty $index value from $data
 * @ Array of value (OR it can be normal variable)
 * @ Index of array
 * If $mandatory is true and not valid value Then exit execution with compulsory field prompt
 *
 * @Returns value of index from array if exist else returns FALSE
 */
function is_valid_val($data, $index, $mandatory = false, $feild_name = '') {
    if (is_array($data) && isset($data [$index]) && $data [$index] !== '')
        return $data [$index];
    else {
        if (!is_array($data) && $data !== '') // If normal valid variable, return its value
            return $data;

        if ($mandatory) { // If mandatory, print mandatory message and stop execution
            if ($feild_name == '') {
                $feild_name = ucwords(str_replace('_', ' ', $index));
            }
            echo get_json(sprintf(lang('field_is_mandatory'), $feild_name), 'Error', false);
            exit();
        } else
            return;
    }
}

/**
 * @$data can contain array of data or text
 * @Default index of output is 'Success',
 * @By default $data value(If $data is not array and $lang==true) will take from lang variable
 *
 * @Returns data in json format
 * 	{"Error":{"data":"No result found","alert":"Test alert"}} 
 * 	{"Success":{"data":["a","b","c"],"alert":"Test alert"}}
 */
function get_json($data, $type = RES_SUCCESS, $lang = true, $alert = '') {
    $res = array();
    if (!empty($data)) {
        if (!is_array($data) && $lang) {
            if (strpos($data, 'error') !== FALSE) { // if $data contain any variable like ...._error, Then make $type = "Error"
                $type = RES_ERROR;
                $res[$type] = get_instance()->lang->line($data); // If $data is not array and $lang==true then take $data value from language variable
            } else {
                $res [$type] = get_instance()->lang->line($data); // If $data is not array and $lang==true then take $data value from language variable
            }
        } else
            $res [$type] = $data;

        if ($alert != '')
            $res [$type][RES_ALERT] = $alert;
    } else {
        $res [RES_ERROR] = lang('no_result_found');
        if ($alert != '')
            $res [RES_ERROR][RES_ALERT] = $alert;
    }

    /* 	Temp, for shows well formated array only in website output	 */
    if (isset($_POST ['website_output']) && $_POST ['website_output'] == 1) {
        echo '<div style="border:1px dotted #000; padding: 50px 10px; ">' . json_encode($res) . PHP_EOL . PHP_EOL . '</div>';
        pr($res);
        echo PHP_EOL . PHP_EOL . 'Web Service output for app--<br><br>' . PHP_EOL . PHP_EOL;
        return json_encode($res);
    } else/*  */ {
        if (isset($_POST['webservice']) && $_POST['webservice'] == 1) {  // Declared in webservice controller
            unset($_POST['webservice']);
            if (!empty($_POST))
                header('Content-type: application/json'); /*  This if condition is temp	 */
        }
        /* Remove above if condition on live sever */
        return json_encode($res);
    }
}

/**
 * @Create folder with path provide if folder not exist
 * @Folder permission code
 */
function createFolder($path, $permission = '0777') {
    if (!is_dir($path))
        mkdir($path, $permission, true);
}

/**
 *
 * @return current date or given date as per format specified
 */
function get_db_date($date = '', $format = DATE_YMD_HIS) {
    if ($date == '')
        $date = date($format);
    return date($format, strtotime($date));
}

/* Get date in user readable format */

function get_user_date($date = '', $format = DATE_YMD_HIS) {
    if ($date == '')
        $date = date($format);
    return date($format, strtotime($date));
}

/**
 *
 * @return current time or given time as per format specified
 */
function get_db_time($time = '', $format = TIME_HIS) {
    if ($time == '')
        $time = date($time);
    return date($format, strtotime($time));
}

/* Get time in user readable format */

function get_user_time($time = '', $format = TIME_HIS) {
    if ($time == '')
        $time = date($time);
    return date($format, strtotime($time));
}

/**
 * Send email message of given type (activate, forgot_password, etc.)
 *
 * @param
 *        	string
 * @param
 *        	string
 * @param
 *        	array
 *        	Here use $type for heading, file name and data
 *        	like heading -> ..._heading
 *        	data -> ..._data
 *        	filename-> ...-html.php
 * @return void
 */
function send_mail($type, $email, $data) {
    /*
     * $this->load->library('email'); $this->email->from('your@example.com', 'Your Name'); $this->email->to('amol@iarianatech.com'); $this->email->subject('Email Test'); $this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE)); return $this->email->send();
     */

    $from_mail = 'no_reply <' . EMAIL_ID_ADMIN . '>';

    $header = "From: " . $from_mail . "\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //$header .= 'Cc: '.EMAIL_ID_TESTER . "\r\n";

    $data ['heading'] = $data ['file_name'] = $type;
    $mailData ['data'] = $data;

    if (isset($_POST ['website_output']) && $_POST ['website_output'] == 1) {
        get_instance()->load->view('email/send_mail.php', $mailData);
        //exit ( );
    }
    pr($email);
    //if($_SERVER['HTTP_HOST'] != 'localhost')
    echo mail($email, lang('email_subject_' . $type), get_instance()->load->view('email/send_mail.php', $mailData, TRUE), $header, "-f $from_mail");
    return TRUE;
}

/* Get date in human readable format upto a day */

function get_human_time($time) {
    $time = strtotime($time);
    $time = time() - $time; // to get the time since that moment

    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second');

    foreach ($tokens as $unit => $text) {
        if ($time + 1 < $unit)
            continue;
        //if ( $unit > 86400 ){
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . ( ( $numberOfUnits > 1 ) ? 's ' : ' ' );
        //}else return 'Today';
    }
}

function get_random_key($md5 = FALSE) {
    $key = rand('111111', '999999');
    if ($md5)
        $key = md5($key);
    return $key;
}

function uploadBase64Image($base64Data, $path, $imageName = '', $resize = FALSE) {
    $img = str_replace('data:image/png;base64,', '', $base64Data);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);

    if ($imageName == '')
        $imageName = time() . rand(10, 100) . '.png';

    $file_path = BASE_DIR . $path ;
    $file = $file_path . $imageName;

    file_put_contents($file, $data);
    chmod($file, 0777);
    if ($resize){
        resize_image($file, $file_path.IMAGE_THUMB, IMAGE_THUMB_WIDTH, IMAGE_THUMB_HEIGHT );
    }
//    pr($file);
//    pr($file_path);
//    pr($imageName);
//    exit;
    return $imageName;
}

function uploadImage($file, $field_name, $path, $imgName = '', $extension = FALSE, $resize = FALSE, $width = 500, $height = 400) {
    if (isset($file[$field_name]) && !empty($file[$field_name])) {
        $file = $file[$field_name];
        if ($imgName == '')
            $imgName = time() . rand(100, 1000) . '.' . pathinfo($file ['name'], PATHINFO_EXTENSION);

        $destination_base = BASE_DIR . $path;
        //createFolder($destination_base);
        $destination = $destination_base . $imgName;
        if (move_uploaded_file($file ['tmp_name'], $destination)) {
            if ($resize)
                resize_image($destination, $destination_base.IMAGE_THUMB.$imgName, $width, $height);
            /*  If 'image' is as key name of $_FILES, then create 2 more copies of image	 */
//            if ($field_name == 'image') {
//                resize_image($destination, $destination_base . SMALL_FOLDER . $imgName, IMAGE_WIDTH_SMALL, IMAGE_HEIGHT_SMALL);
//                resize_image($destination, $destination_base . MEDIUM_FOLDER . $imgName, IMAGE_WIDTH_MEDIUM, IMAGE_HEIGHT_MEDIUM);
//                resize_image($destination, $destination_base . LARGE_FOLDER . $imgName, IMAGE_WIDTH_LARGE, IMAGE_HEIGHT_LARGE);
//            } elseif ($field_name == 'cover_img') {
//                resize_image($destination, $destination_base . WEB_FOLDER . $imgName, COVER_PHOTO_WIDTH, COVER_PHOTO_HEIGHT);
//                resize_image($destination, $destination_base . IOS_FOLDER . $imgName, IMAGE_WIDTH_IOS, IMAGE_HEIGHT_IOS);
//                resize_image($destination, $destination_base . ANDROID_FOLDER . $imgName, IMAGE_WIDTH_ANDROID, IMAGE_HEIGHT_ANDROID);
//            }
            return $imgName;
        }
    }
}

function resize_image($base_file, $new_file, $w, $h, $crop = FALSE) {
    list ( $width, $height ) = getimagesize($base_file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width - ($width * abs($r - $w / $h)));
        } else {
            $height = ceil($height - ($height * abs($r - $w / $h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w / $h > $r) {
            $newwidth = $h * $r;
            $newheight = $h;
        } else {
            $newheight = $w / $r;
            $newwidth = $w;
        }
    }

    list($w, $h, $imageType) = getimagesize($base_file);
    $imageType = image_type_to_mime_type($imageType);
    switch ($imageType) {
        case "image/gif": {
                $src = imagecreatefromgif($base_file);
                $dst = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagegif($dst, $new_file);
            }
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg": {
                $src = imagecreatefromjpeg($base_file);
                $dst = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagejpeg($dst, $new_file, IMAGE_QUALITY);
            }
            break;
        case "image/png":
        case "image/x-png": {
                $src = imagecreatefrompng($base_file);
                $dst = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagepng($dst, $new_file, floor(IMAGE_QUALITY / 10));
            }
            break;
    }
}

/* 	check user type */

function check_user_type() {
    return get_instance()->session->userdata('user_type');
}

function is_logged_in($redirect = TRUE) {
    if (get_instance()->session->userdata('user_id')) {
        return get_instance()->session->userdata('user_id');
    } elseif ($redirect)
        redirect(BASE_URL . (C_ADMIN . 'login'));
}

function set_after_login_redirect_url() {
    if (isset($_SERVER['ORIG_PATH_INFO']))
        $redirect_url = $_SERVER['ORIG_PATH_INFO'];
    else
        $redirect_url = $_SERVER['PATH_INFO'];
    get_instance()->session->set_userdata('login_redirect_url', $redirect_url);
}

function redirect_using_javascript($url) {
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit;
    }
}

?>