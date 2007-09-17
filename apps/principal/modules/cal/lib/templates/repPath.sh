#!/bin/sed -f


s/\(<img src="\)\(.*\)\(".*\)/\1\{BASE\}\/\2\3/
