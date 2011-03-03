<?php

class MemTools
{
	public function __construct() {
	}

	public function MemoryCalculator($initMemory,$type = '') {
		switch ($type) {
			case 'peak':
				$mem = memory_get_peak_usage() - $initMemory;
				break;
			case 'used':
				$mem = memory_get_usage() - $initMemory;
				break;
			default:
				$mem = $initMemory;
				break;
		}
		return $mem;
	}

	public function MemoryParser($mem) {
		if ($mem < 1024) {
			$mem = $mem . 'B ';
		} elseif ($mem < 1048576) {
			$mem = round($mem/1024,2) . 'kB ';
		} else {
			$mem = round($mem/1048576,2) . 'MB ';
		}
		return $mem;
	}
}