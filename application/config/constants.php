<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
    API key -
    AIzaSyB3-LhbEUKN_CGskkFHYkdheivp1RebX8s

    client ID - 
    879881520951-nf9ji5cl6c6mdimiqa99o6q38u3qhej9.apps.googleusercontent.com

    client secret - 
    sfKaC-uo_Or3cWdUW1klAGz_
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

//define("GOOGLE_API_KEY", "AIzaSyAtb2FmGWQaowqSAcmVUCBBF1TU82PWW_0");
//define("GOOGLE_GCM_URL", "https://android.googleapis.com/gcm/send");

date_default_timezone_set ( "Asia/Kolkata" );

define ( 'EMAIL_ID_ADMIN', 'adminm@test.com' );
define ( 'PAGE_TITLE', 'Survey' );

define ( 'WEBSERVICES_PATH',	'webservices/' );
define ( 'WEBSERVICES_USER',	'webuser/' );
define ( 'WEBSERVICES_POST',	'webpost/' );
define ( 'WEBSERVICES_LIKES',	'weblikes/' );
define ( 'WEBSERVICES_ADS',	'webads/' );
define ( 'C_INDEX', 'index/' );

define ( 'C_ADMIN', 'Sadmin/' );
/*
 * |--------------------------------------------------- | Success/Error dependant keys	|-------------------------------------------------------------------------- |
 */
define ( 'RES_SUCCESS',	'Success' );
define ( 'RES_ERROR', 	'Error' );

define ( 'RES_MSG',	'msg' );

define ( 'RES_ALERT', 	'alert' );
define ( 'RES_DATA', 	'data' );

define ( 'FLASH_SUCCESS', 	'success_msg' );
define ( 'FLASH_ERROR', 	'error_msg' );

/*
 * |--------------------------------------------------- | Set base PATH and URL |-------------------------------------------------------------------------- |
 */
$base_url = ((isset ( $_SERVER ['HTTPS'] ) && $_SERVER ['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://" . $_SERVER ['HTTP_HOST'];
$base_url .= str_replace ( basename ( $_SERVER ['SCRIPT_NAME'] ), "", $_SERVER ['SCRIPT_NAME'] );

define ( 'BASE_PATH', $base_url );
define ( 'BASE_URL', $base_url );

define ( 'BASE_DIR', getcwd () . '/' );

define( 'FOLDER_IMAGES',  'images/' );
define( 'FOLDER_USER',  'user/' );
define( 'FOLDER_BANNER',  'banner/' );

define( 'IMAGE_THUMB',  'thumb/' );


define( 'IMAGE_THUMB_HEIGHT',  '300' );
define( 'IMAGE_THUMB_WIDTH',  '300' );
define( 'IMAGE_QUALITY',  '90' );


/*
 * |--------------------------------------------------- | Various Status |-------------------------------------------------------------------------- |
 */
define ( 'STATUS_ACTIVE', 		'1' );
define ( 'STATUS_INACTIVE', 	'0' );

define ( 'STATUS_UNDELETED', 	'1' );
define ( 'STATUS_DELETED', 		'0' );

define ( 'STATUS_VERIFIED', 	'1' );
define ( 'STATUS_UNVERIFIED', 	'0' );

define ( 'STATUS_LOGGED_IN', 	'1' );
define ( 'STATUS_LOGGED_OUT', 	'0' );

define ( 'USER_TYPE_ADMIN', 	'1' );
define ( 'USER_TYPE_USER', 	'2' );



/*
 * |--------------------------------------------------- | Date and time formats |-------------------------------------------------------------------------- |
 */
define ( 'DATE_CANDIDATE_SCHEDULE', 	'd M, Y h:i A' );

define ( 'DATE_YMD', 		'Y-m-d' );
define ( 'DATE_YMD_HIS', 	'Y-m-d H:i:s' );
define ( 'DATE_YMD_HI', 	'Y-m-d H:i' );

define ( 'DATE_DMY', 		'd-m-Y' );
define ( 'DATE_DMY_HIS', 	'd-m-Y H:i:s' );
define ( 'DATE_MDY', 		'M d, Y' ); // Jan 29,2015

define ( 'TIME_HIS', 		'H:i:s' );
define ( 'TIME_HI', 		'H:i' );

/* Pagination Counts */
define ( 'PAGINATION_COUNT', '30' );

/*
 * |--------------------------------------------------- | Email Types |-------------------------------------------------------------------------- |
*/

define( 'EMAIL_INTERVIEW_SCHEDULE', 'interview_schedule');
/*
 * |--------------------------------------------------- | Database Tables |-------------------------------------------------------------------------- |
 */
/* define ( 'TBL_TABLE_NAME', 'table_name' ); */

define ( 'TBL_ADMIN', 'admin' );
define ( 'TBL_COMMENTS', 'comments' );
define ( 'TBL_FRIENDS', 'friends' );
define ( 'TBL_LIKES', 'likes' );
define ( 'TBL_POSTS', 'posts' );
define ( 'TBL_USERS', 'users' );
define ( 'TBL_WARNINGS', 'warnings' );
define ( 'TBL_RETAILERS', 'retailers' );
define ( 'TBL_ADS', 'banner_ads' );
define ( 'TBL_BANNER_ADS', 'banner_ads' );
define ( 'TBL_ARTICLES', 'articles' );
define ( 'TBL_ARTICLES_LIKE', 'like_articles' );
define ( 'TBL_BLOCKED_USERS', 'blocked_users' );


/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
