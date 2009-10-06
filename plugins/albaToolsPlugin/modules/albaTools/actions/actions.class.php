<?php
class albaToolsActions extends sfActions
{

    /**
    * Convierte un texto a imagen
    * @param string $texto
    */
    public function executeText2img(sfWebRequest $request)
    {
    	//fuente por defecto
    	$this->font = 2;
    	//obtengo el texto
    	$texto = utf8_decode($request->getParameter('texto', 'null'));
		//seteo el header
        header("Content-type: image/png");

		// calculo el alto
		$alto = strlen($texto) * imagefontwidth($this->font) + imagefontwidth($this->font);

		$img_handle = imagecreatetruecolor (imagefontheight($this->font), $alto) or die ("Cannot Create image");

		// ImageColorAllocate (image, red, green, blue)
		$back_color = ImageColorAllocate ($img_handle, 255, 255,255 );
		$txt_color = ImageColorAllocate ($img_handle, 0, 0, 0);
		ImageFill($img_handle,0,0, $back_color);
		ImageStringUp ($img_handle, $this->font, 0,$alto  - (imagefontwidth($this->font)/2),$texto, $txt_color);
		ImagePng ($img_handle);
		ImageDestroy($img_handle);
		return sfView::NONE;
    }

    /* demostracion delas utilidades */
    public function executeIndex()
    {

    }

}
?>
