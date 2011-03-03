<?php

// Stop the Timer!
$stopTime = $consolePerf->getTime();

// Format the time!


// Insantiate Memory Parser, then get the three variables needed to show


// Get Baseline Memory Usage.  This acts as handler

$startingRam 	= $memTools->MemoryCalculator($initRam);
$peakRam		= $memTools->MemoryCalculator($initRam, 'peak');
$usedRam		= $memTools->MemoryCalculator($initRam, 'used');

$ramLine		= 	'RAM \t\t\t' .
					'USED:\t ' . $memTools->MemoryParser($startingRam) .
					'\t\t\t' .
					'PEAK:\t ' . $memTools->MemoryParser($peakRam) .
					'\t\t\t' .
					'TOTAL:\t ' . $memTools->MemoryParser($usedRam);

$execTime = 'TIMER\t\t\t' . 'Time Taken to Execute: ' . number_format(($stopTime - $startTime),5);

ConsoleWriter::consoleBlock('open');
ConsoleWriter::consoleLine(" ");
ConsoleWriter::consoleLine($ramLine);
ConsoleWriter::consoleLine($execTime);
$test = new ConsoleIncludes();
$test2 = new ConsoleParameters();
$test3 = new ConsoleInterface();
$test3 = new ConsoleCookies();
$test3 = new ConsoleSession();
$test3 = new ConsolePost();
$test3 = new ConsoleGet();
ConsoleWriter::consoleBlock('close');




