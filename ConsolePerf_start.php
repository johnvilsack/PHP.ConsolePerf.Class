<?php

include ('ConsolePerf.class.php');
include ('ConsoleWriter.class.php');
include ('MemTools.class.php');

$memTools = new MemTools();
$consolePerf = new ConsolePerf();

$initRam = memory_get_usage(); // Set the baseline of RAM prior to any calculations

// Start the Timer!
$startTime = $consolePerf->getTime();