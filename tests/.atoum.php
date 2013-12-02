<?php

/*
 * CLI report.
 */
$stdOutWriter = new \mageekguy\atoum\writers\std\out();
$cli = new \mageekguy\atoum\reports\realtime\cli();
$cli->addWriter($stdOutWriter);

/*
 * Xunit report
 */
$xunitWriter = new \mageekguy\atoum\writers\file(__DIR__.'/atoum.xml');
$xunit = new \mageekguy\atoum\reports\asynchronous\xunit();
$xunit->addWriter($xunitWriter);

/*
 * Clover xml coverage
 */
$cloverWriter = new \mageekguy\atoum\writers\file(__DIR__.'/coverage.xml');
$clover = new \mageekguy\atoum\reports\asynchronous\clover();
$clover->addWriter($cloverWriter);

$runner->addReport($clover);
$runner->addReport($xunit);
$runner->addReport($cli);