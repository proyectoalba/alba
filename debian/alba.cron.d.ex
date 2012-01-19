#
# Regular cron jobs for the alba package
#
0 4	* * *	root	[ -x /usr/bin/alba_maintenance ] && /usr/bin/alba_maintenance
