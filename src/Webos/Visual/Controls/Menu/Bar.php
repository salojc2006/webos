<?php
namespace Webos\Visual\Controls\Menu;
/**
 * Barra de menús. Contenedora de MenuButtons.
 */
class Bar extends \Webos\Visual\Control {

	protected $_selectedButton = null;

	public function __get_text() {
		if (empty($this->_data['text'])) {
			$count = $this->getParent()->getObjectsByClassName(Bar::class)->count();
			return 'MenuBar' . $count;
		}
	}
	
	public function getSelectedButton() {
		return $this->_selectedButton;
	}

	// No se hace tipado del tipo de valor que acepta el método.
	public function setSelectedButton($menuButton) {
		$this->_selectedButton = $menuButton;
	}
	
	public function createButton(string $text): ListItems {
		$menuButton = $this->createObject(Button::class, array(
			'text' => $text,
		));
		return $menuButton->createObject(ListItems::class);
	}
	
	public function render(): string {
		$html  = '<div class="MenuBar">';
		$html .= $this->getChildObjects()->render();
		$html .= '</div>';
		return $html;
	}
}