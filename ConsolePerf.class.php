<?php

class ConsolePerf
{
	public function __construct() {
	}

	public function getTime() {
			$a = explode (' ',microtime());
			return(double) $a[0] + $a[1];
	 }

	public function consoleArray($array) {
		foreach ($array as $key=>$value) {
			ConsoleWriter::consoleLine($value,'log', $key);
		}
	}

	public function consoleArrayNeedle($array, $needle) {
		foreach ($array as $key=>$value) {
			if (strpos($key,$needle) !== false) {
				ConsoleWriter::consoleLine($value,'log', $key);
			}
		}
	}

}

class ConsoleIncludes extends ConsolePerf
{
	public function __construct() {
		ConsoleWriter::consoleGroup('collapsed', 'INCLUDED FILES');
		$this->consoleArray(get_included_files());
		ConsoleWriter::consoleGroup('end');
	}
}

class ConsoleParameters extends ConsolePerf
{
	public function __construct() {
		$verPHP = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION;
		ConsoleWriter::consoleGroup('collapsed', 'PHP PARAMETERS');
		ConsoleWriter::consoleLine($verPHP, 'log', 'PHP_VERSION');
		ConsoleWriter::consoleLine(get_current_user(), 'log', 'PHP_USER');
		ConsoleWriter::consoleLine(date("g:i a F j, Y"), 'log', 'SERVER_TIME');
		ConsoleWriter::consoleLine(date("F d Y H:i:s", getlastmod()), 'log', 'LAST_MODIFIED');
		$this->consoleArrayNeedle($_SERVER, 'DOCUMENT_ROOT');
		$this->consoleArrayNeedle($_SERVER, 'SCRIPT_FILENAME');
		$this->consoleArrayNeedle($_SERVER, 'SCRIPT_NAME');
		$this->consoleArrayNeedle($_SERVER, 'PHP_SELF');
		$this->consoleArrayNeedle($_SERVER, 'REQUEST_URI');
		ConsoleWriter::consoleLine(PHP_OS, 'log', 'OPERATING_SYSTEM');
		ConsoleWriter::consoleLine(PHP_SAPI, 'log', 'PHP_SAPI');
		$this->consoleArrayNeedle($_SERVER, 'REQUEST_METHOD');
		$this->consoleArrayNeedle($_SERVER, 'QUERY_STRING');
		ConsoleWriter::consoleGroup('end');
	}
}

class ConsoleInterface extends ConsolePerf
{
	public function __construct() {
		ConsoleWriter::consoleGroup('collapsed', 'INTERFACE');
		$this->consoleArrayNeedle($_SERVER, 'SERVERNAME');
		$this->consoleArrayNeedle($_SERVER, 'SERVER_ADDR');
		$this->consoleArrayNeedle($_SERVER, 'SERVER_PORT');
		$this->consoleArrayNeedle($_SERVER, 'SERVER_SOFTWARE');
		$this->consoleArrayNeedle($_SERVER, 'REMOTE_ADDR');
		$this->consoleArrayNeedle($_SERVER, 'REMOTE_PORT');
		$this->consoleArrayNeedle($_SERVER, 'GATEWAY_INTERFACE');
		$this->consoleArrayNeedle($_SERVER, 'SERVER_PROTOCOL');
		$this->consoleArrayNeedle($_SERVER, 'REQUEST_TIME');
		$this->consoleArrayNeedle($_SERVER, 'PATH');
		ConsoleWriter::consoleGroup('end');
	}
}

class ConsoleCookies extends ConsolePerf
{
	public function __construct() {
		if (count($_COOKIE) != 0) {
			ConsoleWriter::consoleGroup('collapsed', '$_COOKIE');
			$this->consoleArray($_COOKIE);
			ConsoleWriter::consoleGroup('end');
		}
	}
}

class ConsoleSession extends ConsolePerf
{
	public function __construct() {
		if (isset($_SESSION)) {
			ConsoleWriter::consoleGroup('collapsed', '$_SESSION');
			$this->consoleArray($_SESSION);
			ConsoleWriter::consoleGroup('end');
		}
	}
}

class ConsolePost extends ConsolePerf
{
	public function __construct() {
		if (count($_POST) != 0) {
			ConsoleWriter::consoleGroup('collapsed', '$_POST');
			$this->consoleArray($_POST);
			ConsoleWriter::consoleGroup('end');
		}
	}
}

class ConsoleGet extends ConsolePerf
{
	public function __construct() {
		if (count($_GET) != 0) {
			ConsoleWriter::consoleGroup('collapsed', '$_GET');
			$this->consoleArray($_GET);
			ConsoleWriter::consoleGroup('end');
		}
	}
}