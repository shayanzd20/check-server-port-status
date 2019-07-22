<?php
// Agrigator Connection Specification
define("SERVER_IP","91.56.30.1868.8.8.");
define("SERVER_PORT","999");
//define("CP_NAME","RAHPOUYAN KHERAD IRANIAN");


//
define("PROCESS_THREAD_MAX_LIFE",30);
define("PROCESS_THREAD_IDLE_TIME",2);
define("PROCESS_THREAD_OVERLOAD",TRUE);
define("SERVICE_REPOSITORY_DB_NAME", "gateway_subscription");

// Server 1 Database Details
define("SERVER1_DB_USERNAME", "gateway");
define("SERVER1_DB_PASSWORD", "123456");
define("SERVER1_DB_HOST", "localhost");

// Server 2 Database Details
define("SERVER2_DB_USERNAME", "gateway");
define("SERVER2_DB_PASSWORD", "123456");
define("SERVER2_DB_HOST", "localhost");
define("LOCAL_TIME_ZONE", "Asia/Tehran");

// Database Connection Details
define("ARRIVAL_BUFFER_USERNAME", "gateway");
define("ARRIVAL_BUFFER_PASSWORD", "123456");
define("ARRIVAL_BUFFER_HOST", "localhost");
define("ARRIVAL_BUFFER_DBNAME", "gateway_buffers");

define("DEPARTURE_BUFFER_USERNAME", "gateway");
define("DEPARTURE_BUFFER_PASSWORD", "123456");
define("DEPARTURE_BUFFER_HOST", "localhost");
define("DEPARTURE_BUFFER_DBNAME", "gateway_buffers");

define("TRANSACTION_BUFFER_USERNAME", "gateway");
define("TRANSACTION_BUFFER_PASSWORD", "123456");
define("TRANSACTION_BUFFER_HOST", "localhost");
define("TRANSACTION_BUFFER_DBNAME", "gateway_buffers");

define("TRANSACTION_LOG_USERNAME", "gateway");
define("TRANSACTION_LOG_PASSWORD", "123456");
define("TRANSACTION_LOG_HOST", "localhost");
define("TRANSACTION_LOG_DBNAME", "gateway_transactions");

define("OTP_LOG_USERNAME", "gateway");
define("OTP_LOG_PASSWORD", "123456");
define("OTP_LOG_HOST", "localhost");
define("OTP_LOG_DBNAME", "gateway_otp");

define("REPORT_USERNAME", "gateway");
define("REPORT_PASSWORD", "123456");
define("REPORT_HOST", "localhost");
define("REPORT_DBNAME", "gateway_reports");

define("SCHEDULE_USERNAME", "gateway");
define("SCHEDULE_PASSWORD", "123456");
define("SCHEDULE_HOST", "localhost");
define("SCHEDULE_DBNAME", "gateway_schedule");

define("DAEMON_USERNAME", "gateway");
define("DAEMON_PASSWORD", "123456");
define("DAEMON_HOST", "localhost");
define("DAEMON_DBNAME", "gateway_daemon");

define("PAYMENT_USERNAME", "gateway");
define("PAYMENT_PASSWORD", "123456");
define("PAYMENT_HOST", "localhost");
define("PAYMENT_DBNAME", "gateway_payment");

define("CONTROL_USERNAME", "gateway");
define("CONTROL_PASSWORD", "123456");
define("CONTROL_HOST", "localhost");
define("CONTROL_DBNAME", "gateway_control");

define("SUBSCRIPTION_USERNAME", "gateway");
define("SUBSCRIPTION_PASSWORD", "123456");
define("SUBSCRIPTION_HOST", "localhost");
define("SUBSCRIPTION_DBNAME", "gateway_subscription");

date_default_timezone_set(LOCAL_TIME_ZONE);




define("HLR_USERNAME", "gateway");
define("HLR_PASSWORD", "123456");
define("HLR_HOST", "localhost");
define("HLR_DBNAME", "hlr");

define("EIR_USERNAME", "gateway");
define("EIR_PASSWORD", "123456");
define("EIR_HOST", "localhost");
define("EIR_DBNAME", "eir");

