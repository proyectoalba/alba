all: pdf htmls

pdf:
	mkdir -p out/pdf
	docbook2pdf xml/manual.xml
	mv manual.pdf out/pdf/
ps:
	mkdir -p out/ps
	docbook2ps xml/manual.xml
	mv manual.ps out/ps/

txt:
	mkdir -p out/txt
	docbook2txt -V charset=utf-8 xml/manual.xml
	mv manual.txt out/txt/
htmls:
	docbook2html xml/manual.xml
	mv *.html ../../web/manual/
	svn --force export img/ ../../web/manual/img
    
clean:
	rm -rf out
