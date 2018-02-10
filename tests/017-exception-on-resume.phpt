--TEST--
tests Fiber for exception
--SKIPIF--
<?php
if (!extension_loaded('fiber')) {
    echo 'skip';
}
?>
--FILE--
<?php
function foo()
{
    Fiber::yield();
    throw new Exception();
}

function bar()
{
    Fiber::yield();
    foo();
}

$f = new Fiber('bar');

$f->resume();
$f->resume();

try {
    $f->resume();
} catch (\Exception $e) {
    echo $e->getTraceAsString();
}
?>
--EXPECTF--
#0 %s/tests/017.php(11): foo()
#1 (0): bar()
#2 {main}
