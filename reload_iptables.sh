#!/bin/sh
iptables-restore < /opt/www/iptables/iptables_rules.txt
echo Tables updated.
/usr/sbin/iptables -I INPUT 1 -p tcp --dport 80 -j logaccept
/sbin/ifconfig vlan2 down
/sbin/ifconfig vlan2 up

