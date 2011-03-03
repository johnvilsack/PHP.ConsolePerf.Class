<?php
/**
 * ConsoleWriter
 * Author: John Vilsack
 * Date: 3/2/11
 * Time: 9:12 AM
 *
 * Simple PHP Class to generate javascript blocks, console groupings, and direct output to javascript developer tools.
 *
 */

class ConsoleWriter {
	public function __construct() {}

	/**
	* Open/Close Javascript Block
	*
	* @param string $type ('open'|'close') Determine type of output
	* @access public
	* @static
	*/
	public static function consoleBlock($type) {
		if ($type === 'open') {
			echo PHP_EOL . '<script type="text/javascript">' . PHP_EOL;
			return;
		} elseif ($type === 'close') {
			echo '</script>' . PHP_EOL;
			return;
		} else {
			echo 'ERROR IN CONSOLE START';
			exit;
		}
	}

	/**
	* Manipulate Console Groupings
	*
	* @param string $name Name of the Group
	* @param string $type ('open'|'end'|'collapsed') Determine type of output
	* @access public
	* @static
	*/
	public function consoleGroup($type='open', $name='') {
		if ($type === 'open') {
			echo 'console.group("'. $name .'");' . PHP_EOL;
			return;
		} elseif ($type === 'collapsed') {
			echo 'console.groupCollapsed("'. $name .'");' . PHP_EOL;
		} elseif ($type === 'end') {
			echo 'console.groupEnd();' . PHP_EOL;
		}
	}

	/**
	* Output to Console when contained within Javascript block
	*
	* @param string $value Value to be written to the console
	* @param string $type ('log'|'info'|'warn'|'error') Determine type of output (default = 'log')
	* @param string $key Value of "key" of item being written
	* @access public
	* @static
	*/
	public static function consoleLine($value='', $type='log', $key='') {
		if ($key !== '') {
			echo 'console.' . $type . '("' . $key . '\t\t'. $value . '");' . PHP_EOL;
			return;
		} else {
			echo 'console.' . $type . '("' . $value . '");' . PHP_EOL;
			return;
		}
	}

	/**
	* Quickly build out a single output line.  Great for breakpoints.
	*
	* @param string $value Value to be written to the console
	* @param string $type ('log'|'info'|'warn'|'error') Determine type of output (default = 'log')
	* @param string $key Value of "key" of item being written
	* @access public
	* @static
	*/
	public static function consoleQuickLine($value='', $type='log', $key='') {
			ConsoleWriter::consoleBlock('open');
			ConsoleWriter::consoleLine($value, $type, $key);
			ConsoleWriter::consoleBlock('close');
		}

}


