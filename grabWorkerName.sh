#!/bin/sh
checks=$1
apistats=`echo -n "pools" | nc $checks 4028 2>/dev/null`
worker=`echo $apistats | sed -e 's/,/\n/g' | grep "User" | cut -d "=" -f2`
echo "$worker"
