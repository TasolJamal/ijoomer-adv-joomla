<?php
/**
 * @package     IJoomer.Backend
 * @subpackage  com_ijoomeradv.models
 *
 * @copyright   Copyright (C) 2010 - 2014 Tailored Solutions PVT. Ltd. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

JFormHelper::loadFieldClass('list');

/**
 * Form Field class for the Joomla Framework.
 *
 * @package     IJoomer.Backdend
 * @subpackage  com_ijoomeradv.models
 * @since       1.0
 */
class JFormFieldMenutype extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var        string
	 * @since    1.6
	 */
	protected $type = 'menutype';

	/**
	 * Method to get the field input markup.
	 *
	 * @return    string    The field input markup.
	 *
	 * @since    1.6
	 */
	protected function getInput()
	{
		// Initialise variables.
		$html = array();
		$recordId = (int) $this->form->getValue('id');
		$size = ($v = $this->element['size']) ? ' size="' . $v . '"' : '';
		$class = ($v = $this->element['class']) ? ' class="' . $v . '"' : 'class="text_area"';

		// Load the javascript and css
		JHtml::_('behavior.framework');
		JHtml::_('behavior.modal');

		$html[] = '<input type="text" readonly="readonly" disabled="disabled" value="' . $this->value . '"' . $size . $class . ' />';
		$html[] = '<input type="button" value="' . JText::_('JSELECT') . '" onclick="SqueezeBox.fromElement(this, {handler:\'iframe\', size: {x: 600, y: 450}, url:\'' . JRoute::_('index.php?option=com_ijoomeradv&view=menutypes&tmpl=component&recordId=' . $recordId) . '\'})" />';
		$html[] = '<input type="hidden" name="' . $this->name . '" value="' . htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '" />';

		return implode("\n", $html);
	}
}
