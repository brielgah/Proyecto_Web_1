<?php
class LatexTemplate {
	public static function download($data, $template_file, $outp_file) {
		// Checa si existe el archivo template
		if(!file_exists($template_file)) {
			throw new Exception("No se puede abrir template");
		}
		if(($f = tempnam(sys_get_temp_dir(), 'tex-')) === false) {
			throw new Exception("No se pudo crear el archivo temporal");
		}
	
		$tex_f = $f . ".tex";
		$aux_f = $f . ".aux";
		$log_f = $f . ".log";
		$pdf_f = $f . ".pdf";
		// Toda las salidas se quedan en el buffer, no se envía nada
		ob_start();
		include($template_file);
		// Pasamos al archivo Tex el contenido del template
		file_put_contents($tex_f, ob_get_clean());
		// Compila el archivo con xelatex

		$cmd = sprintf("xelatex -interaction nonstopmode -halt-on-error %s",
				escapeshellarg($tex_f));
		$ipn="ipn.png";
		$escom="escom.png";
		copy($ipn, sys_get_temp_dir() . "/ipn.png");
		copy($escom, sys_get_temp_dir() . "/escom.png");
		// Se cambia a la dirección temporal del servidor
		chdir(sys_get_temp_dir());
		
		// Ejecuta la acción
		exec($cmd, $foo, $ret);
		// Borra los archivos que no son necesarios
		@unlink($tex_f);
		@unlink($aux_f);
		@unlink($log_f);
		@unlink($ipn);
		@unlink($escom);
	
		// Si no se pudo crear el PDF
		if(!file_exists($pdf_f)) {
			@unlink($f);
			throw new Exception("El archivo no fue generado LaTex devolvió: $ret.");
		}
	
		// Devuelve el archivo
		$fp = fopen($pdf_f, 'rb');
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachment; filename="' . $outp_file . '"' );
		header('Content-Length: ' . filesize($pdf_f));
		fpassthru($fp);
		@unlink($f);
	}
	// Función para reemplazar todos los caracteres que son reservados en LaTex por su comando
	public static function escape($text) {
		$text = str_replace("\n", "\\\\", $text); 
		$text = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $text); 
		$text = str_replace("\\\\", "\n", $text); 
		$text = str_replace("\\", "\\\\", $text); 
	
		// Símbolos que son usados en LaTex
		$text = str_replace("{", "\\{", $text);
		$text = str_replace("}", "\\}", $text);
		$text = str_replace("$", "\\$", $text);
		$text = str_replace("&", "\\&", $text);
		$text = str_replace("#", "\\#", $text);
		$text = str_replace("^", "\\textasciicircum{}", $text);
		$text = str_replace("_", "\\_", $text);
		$text = str_replace("~", "\\textasciitilde{}", $text);
		$text = str_replace("%", "\\%", $text);
	
		$text = str_replace("<", "\\textless{}", $text);
		$text = str_replace(">", "\\textgreater{}", $text);
		$text = str_replace("|", "\\textbar{}", $text);
	
		$text = str_replace("\"", "\\textquotedbl{}", $text);
		$text = str_replace("'", "\\textquotesingle{}", $text);
		$text = str_replace("`", "\\textasciigrave{}", $text);
	
		$text = str_replace("\\\\", "\\textbackslash{}", $text); 
		$text = str_replace("\n", "\\\\", trim($text)); 
		return $text;
	}
}
?>
