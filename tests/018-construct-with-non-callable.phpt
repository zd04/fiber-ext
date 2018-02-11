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
Fatal error: Uncaught Error: Attempt to start non callable Fiber, no array or string given in %s/tests/018-construct-with-non-callable.php:3
Stack trace:
#0 %s/tests/018-construct-with-non-callable.php(3): Fiber->resume()
#1 {main}
  thrown in %s/tests/018-construct-with-non-callable.php on line 3
