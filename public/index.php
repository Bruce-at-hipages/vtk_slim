<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
// test: using text display for now
header('content-type: text');

/**
 * PHP slim
 * public UI test base
 */
include dirname(__FILE__) . '/../Library/VTKS/Core.php';
\VTKS\Core::registerNamespace('My', dirname(__FILE__) . '/../My');
//new \My\ClassName;
use \My\Foo as foo;
new foo;

// test an internal utility
use \VTKS\Utility\String as UString;
echo UString::template(':var', array('var' => 'hello'));
?>