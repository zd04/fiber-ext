--TEST--
tests yield from catch block within fiber
--SKIPIF--
<?php
if (!extension_loaded('fiber')) {
    echo 'skip';
}
?>
--FILE--
<?php
$f = new Fiber(function () {
    try {
        $a = Fiber::yield();
    } catch (Exception $e) {
        return Fiber::yield($e->getMessage());
    }
});
$f->resume();
echo $f->throw(new Exception("foo"));
echo $f->resume("bar");
?>
--EXPECTF--
foobar
