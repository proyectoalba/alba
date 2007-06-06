all: pdf ps

pdf:
	mkdir -p out/pdf
	db2pdf xml/manual.xml
	mv manual.pdf out/pdf/
ps:
	mkdir -p out/ps
	db2ps xml/manual.xml
	mv manual.ps out/ps/

clean:
	rm -rf out
