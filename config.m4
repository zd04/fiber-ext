PHP_ARG_ENABLE(fiber, whether to enable fiber support,
[  --enable-fiber          Enable fiber support], no)

if test "$PHP_FIBER" != "no"; then
  AC_DEFINE(HAVE_FIBER, 1, [ Have fiber support ])
  PHP_NEW_EXTENSION(fiber, php_fiber.c, $ext_shared)
  PHP_ADD_MAKEFILE_FRAGMENT
fi
