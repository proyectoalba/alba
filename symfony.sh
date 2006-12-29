#!/bin/sh
#
# Shell wrapper for symfony (based on Phing shell wrapper)
# $Id: symfony.sh 500 2006-01-23 09:15:57Z fabien $
#
# This script will do the following:
# - check for PHP_COMMAND env, if found, use it.
#   - if not found assume php is on the path
# - check for SYMFONY_HOME env, if found use it
#   - if not look for it
# - check for PHP_CLASSPATH, if found use it
#   - if not found set it using SYMFONY_HOME/lib

if [ -z "$SYMFONY_HOME" ] ; then
  SYMFONY_HOME="bin"
fi

if (test -z "$PHP_COMMAND") ; then
  # echo "WARNING: PHP_COMMAND environment not set. (Assuming php on PATH)"
  export PHP_COMMAND=php
fi

if (test -z "$PHP_CLASSPATH") ; then
  PHP_CLASSPATH=$SYMFONY_HOME/lib
  export PHP_CLASSPATH
fi

$PHP_COMMAND -d html_errors=off -qC $SYMFONY_HOME/symfony.php $*
