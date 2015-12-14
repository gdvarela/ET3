<?php
Class Noticia
{
	public $titulo;
	
	public $fuente = "UN Tipo que l ovio";
	public $fuenteenlace = "http://www.k20a.org/forum/archive/index.php/t-24092.html";
	
	public $fecha = "Hoy";
	
	function __construct($i)
	{
		$this->titulo = "Puto PABLO K LO ENCONTRARON T'O DROGAO".$i;
	}
}
?>