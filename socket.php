<?php

function socket_print(){

$service_port = 2000;
$address = gethostbyname('127.0.0.1');

/* Create a TCP/IP socket. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "<br />";
} else {
//	echo "Attempting to connect to '$address' on port '$service_port'...";
	$result = socket_connect($socket, $address, $service_port);
	if ($result === false) {
	    echo "socket_connect() failed.<br />Reason: ($result) " . socket_strerror(socket_last_error($socket)) . "<br />";
	} else {
		$in = "|print|";
//		echo "Sending HTTP HEAD request...";
		socket_write($socket, $in, strlen($in));
//		echo "Closing socket...";
		socket_close($socket);
//		echo "OK.<br /><br />";
	}
}

}
?>
