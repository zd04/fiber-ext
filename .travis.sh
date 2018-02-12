#!/bin/bash

make test | tee test_result

FAILED_COUNT=`grep "Tests failed" test_result|awk '{print $4}'`

exit $FAILED_COUNT
