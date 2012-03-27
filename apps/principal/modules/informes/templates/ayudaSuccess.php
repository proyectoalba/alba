<p>Para poder crear y visualizar los informes usted debe tener
  instalado alg&uacute;n editor/procesador de texto que le permita usar el
  formato <a href="http://es.wikipedia.org/wiki/Opendocument">OpenDocument</a>
  para texto ODT.</p>
<p>Aqu&iacute; hay una lista de programas que lo soportan y de un
  plugin para otros editores que no lo soportan.</p>

<br/>
<ul class="sf_admin_actions">
  <li>
    <span style="font-weight: bold;">Abiword: &nbsp;</span>
    <a href="http://www.abisource.com/download/">http://www.abisource.com/download/</a>
  </li>
  <li>
    <span style="font-weight: bold;">Odf-converter: </span>
    <a href="http://odf-converter.sourceforge.net/download.html">http://odf-converter.sourceforge.net/download.html</a>
  </li>
  <li>
    <span style="font-weight: bold;">OpenOffice:</span>
    <a href="http://es.openoffice.org/programa/index.html">http://es.openoffice.org/programa/index.html</a>
  </li>
</ul>
<p>Estas son las variables permitidas para mostrar datos en los informes:</p>
<ul class="sf_admin_actions">
  <li>[alumno.Nombre]</li>
  <li>[alumno.Apellido]</li>
  <li>[alumno.FechaNacimiento]</li>
  <li>[alumno.Direccion]</li>
  <li>[alumno.Ciudad]</li>
  <li>[alumno.CodigoPostal]</li>
  <li>[alumno.Provincia]</li>
  <li>[alumno.Telefono]</li>
  <li>[alumno.LugarNacimiento]</li>
  <li>[alumno.TipoDocumento]</li>
  <li>[alumno.NroDocumento]</li>
  <li>[alumno.Sexo]</li>
  <li>[alumno.Email]</li>
  <li>[alumno.DistanciaEscuela]</li>
  <li>[alumno.HermanosEscuela]</li>
  <li>[alumno.HijoMaestroEscuela]</li>
  <li>[alumno.Establecimiento]</li>
  <li>[alumno.Cuenta]</li>
  <li>[alumno.CertificadoMedico]</li>
  <li>[alumno.Pais]</li>
</ul>
<ul class="sf_admin_actions">
  <li>[division.A&ntilde;o]</li>
  <li>[division.Descripcion]</li>
  <li>[division.Turno]</li>
  <li>[division.Orientacion]</li>
  <li>[division.Orden]</li>
</ul>
<ul class="sf_admin_actions">
  <li>[establecimiento.Nombre]</li>
  <li>[establecimiento.Descripcion]</li>
  <li>[establecimiento.DistritoEscolar]</li>
  <li>[establecimiento.Organizacion]</li>
  <li>[establecimiento.NivelTipo]</li>
</ul>
<ul class="sf_admin_actions">
  <li>[ciclolectivo.FechaInicio]</li>
  <li>[ciclolectivo.FechaFin]</li>
  <li>[ciclolectivo.Descripcion]</li>
</ul>

<p>Otros:</p>
<ul class="sf_admin_actions">
  <li>[var..now;frm='dd/mm/yyyy']</li>
  <li>[variable.Personalizada]</li>
</ul>

<p>Bloques para Listados:</p>
<ul class="sf_admin_actions">
  <li>[alumno.Apellido;block=table:table-row]</li>
</ul>
