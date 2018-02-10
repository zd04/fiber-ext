--TEST--
tests Fiber for error memory leak
--SKIPIF--
<?php
if (!extension_loaded('fiber')) {
    echo 'skip';
}
?>
--FILE--
<?php
$f = new Fiber;
$f->resume();
?>
--EXPECTF--
Warning: Attempt to start non callable Fiber, no array or string given in %s/tests/018.php on line 3
