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
	mkdir -p ../../web/manual/
	docbook2html -u xml/manual.xml -o ../../web/manual/
	cp -r img/ ../../web/manual/img
	mv ../../web/manual/manual.html ../../web/manual/index.html   
clean:
	rm -rf out
	rm -rf ../../web/manual    