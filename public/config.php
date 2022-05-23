<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define("SROOT", $_SERVER['SERVER_NAME']."/hotel-management-php/public");
define("IMAGEROOT", SROOT."/media/images/rooms/");

// Database
define("DB_NAME", getenv("env_db_name")); // database name
define("DB_USER", getenv("env_user_name")); // database user
define("DB_PASSWORD", getenv("env_password")); // database password
define("DB_HOST", getenv("env_db_host")); // database host

// FTP
define("FTPSERVER", getenv("env_ftp_server"));
define("FTPUSER", getenv("env_ftp_user"));
define("FTPPASS", getenv("env_ftp_pass"));

require_once(ROOT.DS."core".DS."db.php");
require_once(ROOT.DS."core".DS."utils.php");
require_once(ROOT.DS."core".DS."upload_image.php");

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
