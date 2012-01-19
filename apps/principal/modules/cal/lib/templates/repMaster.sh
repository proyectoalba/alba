#!/bin/bash 

for a 
do 
	echo $a
	./repPath.sh $a > $a.tmp
	mv $a.tmp $a
done
