#!/bin/bash 

for a 
do 
	echo $a
	./links.sh $a > $a.tmp
	mv $a.tmp $a
done
