<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head></head>
    <body>Para poder crear y visualizar los informes usted debe tener
instalado alg&uacute;n editor/procesador de texto que le permita usar el
formato <a href="http://es.wikipedia.org/wiki/Opendocument">OpenDocument</a>
para texto ODT. Aqu&iacute; hay una lista de programas que lo soportan y de un
plugin para otros editores que no lo soportan.<br><br><span style="font-weight: bold;">Abiword: &nbsp;</span><a href="http://www.abisource.com/download/">http://www.abisource.com/download/</a><br><span style="font-weight: bold;">Odf-converter: </span><a href="http://odf-converter.sourceforge.net/download.html">http://odf-converter.sourceforge.net/download.html
</a><br><span style="font-weight: bold;">Open
Office:</span> <a href="http://es.openoffice.org/programa/index.html">http://es.openoffice.org/programa/index.html</a><br><br><br>Estas
son las variables permitidas para mostrar datos en los informes:<br><br>[alumno.Nombre]<br>[alumno.Apellido]<br>[alumno.FechaNacimiento]<br>[alumno.Direccion]<br>[alumno.Ciudad]<br>[alumno.CodigoPostal]<br>[alumno.Provincia]<br>[alumno.Telefono]<br>[alumno.LugarNacimiento]<br>[alumno.TipoDocumento]<br>[alumno.NroDocumento]<br>[alumno.Sexo]<br>[alumno.Email]<br>[alumno.DistanciaEscuela]<br>[alumno.HermanosEscuela]<br>[alumno.HijoMaestroEscuela]<br>[alumno.Establecimiento]<br>[alumno.Cuenta]<br>[alumno.CertificadoMedico]<br>[alumno.Pais]<br><br>[division.A&ntilde;o]<br>[division.Descripcion]<br>[division.Turno]<br>[division.Orientacion]<br>[division.Orden]<br><br>[establecimiento.Nombre]<br>[establecimiento.Descripcion]<br>[establecimiento.DistritoEscolar]<br>[establecimiento.Organizacion]<br>[establecimiento.NivelTipo]<br><br>[ciclolectivo.FechaInicio]<br>[ciclolectivo.FechaFin]<br>[ciclolectivo.Descripcion]<br><br><br>otros:<br>
[var..now;frm='dd/mm/yyyy']<br>[variable.X]
<br><br>Ejemeplo para Listados:
&nbsp;<br>[alumno.Apellido;block=table:table-row]
<br> </body></html>