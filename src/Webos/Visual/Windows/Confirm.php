<?php
namespace Webos\Visual\Windows;
use \Webos\Visual\Window;
use \Webos\Visual\Controls\Label;
class Confirm extends Window {

	public function  getInitialAttributes() {
		$attrs = parent::getInitialAttributes();

		return array_merge($attrs, array(
			'title' => 'Confirmar',
		));
	}

	public function initialize() {
		$this->title = 'Confirmar';
		$this->height = '130px';
		$this->createObject(Label::class, array(
			'text' => $this->message,
			'top'  => 50,
			'left' => 25,
		));
	}

	public function getAllowedActions() {
		return array(
			'confirm',
			'close',
			'move',
		);
	}

	public function  getAvailableEvents() {
		return array(
			'confirm',
			'close',
			'move',
		);
	}

	public function confirm() {
		$this->triggerEvent('confirm');
		$this->close();
	}

	public function close() {
		$this->triggerEvent('close');
		$this->getParentApp()->closeWindow($this);
	}
	
	public function render() {
		$template = $this->_getRenderTemplate();

		$content = new \Webos\StringChar(
			'<div style="text-align:center;">' .
				'<div>MESSAGE</div>' .
				'<div style="margin-top:20px;">' .
					'<input type="button" value="Sí" onclick="CLICK_YES" />'.
					'<input type="button" value="no" onclick="CLICK_NO" />'.
				'</div>' .
			'</div>'
		);

		$content->replace('MESSAGE',   $this->message);
		$content->replace('CLICK_YES', "__doAction('send',{actionName:'confirm', objectId:'OBJECTID'});");
		$content->replace('CLICK_NO',  "__doAction('send',{actionName:'close', objectId:'OBJECTID'});");
		$content->replace('OBJECTID',  $this->getObjectID());
		
		$template->replace('__CONTENT__', $content);

		return $template;
	}
}