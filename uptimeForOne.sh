#!/bin/bash
export SSHPASS='admin'
uptimeMiner=$1
/usr/bin/sshpass -e ssh root@$uptimeMiner echo $(uptime) | sed 's/^.\+up\ \+\([^,]*\).*/\1/g'
###
##sshpass -p admin ssh root@10.2.0.1 echo $(uptime) | sed 's/^.\+up\ \+\([^,]*\).*/\1/g'
###
#nother good one with awk: 
# uptime | awk -F, '{sub(".*up ",x,$1);print $1}'
