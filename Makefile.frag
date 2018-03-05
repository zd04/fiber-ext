fiber-test-coverage:
	CCACHE_DISABLE=1 EXTRA_CFLAGS="-fprofile-arcs -ftest-coverage" $(MAKE) clean test

fiber-test-coverage-lcov: fiber-test-coverage
	lcov -c --directory $(top_srcdir)/.libs --output-file $(top_srcdir)/coverage.info

fiber-test-coverage-html: fiber-test-coverage-lcov
	genhtml $(top_srcdir)/coverage.info --output-directory=$(top_srcdir)/html
