<?php
	header("Content-Type:text/html;charset=gb2312");
	class HtmlArtWrapper{
		private $panel = null;
		private $style = "default";
		function __construct(){
			//temp
		}

		function wrap($title,$author,$date,$contents){
			$header = $this->getHeader($title, $author, $date);
			$body = $this->getBody($contents);
			$panel = $this->drawPanel($header,$body);
			return $panel;
		}

		function getHeader($title, $author, $date){
			$html = '<div class="panel panel-header">';
			$html .='<h3 class="text-center">'.$title.'</h3>';
			$html .='<h5 class="pull-right"><i class="glyphicon glyphicon-user"></i>'.$author.'  --'.$date.'</h5>';
			$html .='</div>'; 
			return $html;
		}

		function getBody($body){
			$html  = '<div class="panel panel-body">';
			$html .= $body;
			$html .= '</div>';
			return $html;
		}

		function drawPanel($header, $body){
			$html ='<!doctype html>';
			$html .='<html>';
			$html .='<meta http-equiv="Content-Type" type="text/html;charset=utf-8">';
			$html .='<head>';
			$html .='<title>'.$title.'</title>';
			$html .='</head><body>';
			$html .= '<div class="panel panel-'.$this->getStyle().'">';
			$html .= $header;
			$html .= $body;
			$html .= '</div>';
			$html .= '</body></html>';
			$this->panel = $html;
		}

		function getPanel(){
			return $this->panel;
		}

		function getStyle(){
			return $this->style;
		}

		function showPanel(){
			echo $this->panel;
		}
	}

?>