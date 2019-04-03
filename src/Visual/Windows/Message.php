<?php
namespace Webos\Visual\Windows;

use Webos\Visual\Window;

class Message extends Window {

	public function initialize(array $params = []) {		
		$this->enableEvent('confirm');
		$this->title       = $params['title'  ] ?? 'Mensaje:';
		$this->text        = $params['message'] ?? 'Mensaje:';
		$this->width       = $params['width'  ] ?? 450;
		$this->height      = $params['height' ] ?? 150;
		$this->messageType = $params['type'   ] ?? null;
		
		$this->createWindowButton('OK')->closeWindow();

	}

	public function  getInitialAttributes(): array {
		return array(
			'height' => 100,
			'width'  => 200
		);
	}
}