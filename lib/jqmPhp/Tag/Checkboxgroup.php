<?php
/*
 *  jqmPhp - HTML code generator for jQuery Mobile Framework
 *  Copyright (C) 2011  Bruno Maia
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace jqmPhp\Tag;
use jqmPhp\Tag;

/**
 * This class represents the 'fieldset' tag (data-role="controlgroup").
 * @author Bruno Maia <brunoleaomaia@gmail.com>
 * @copyright Copyright (c) 2011, Bruno Maia
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License
 * @package jqmPhp
 * @version 0.03
 * @since 0.01
 * @link http://www.jqmphp.com/ jqmPhp Website
 * @link http://code.google.com/p/jqmphp/ jqmPhp Project Website
 * @link http://www.jquerymobile.com jQuery Mobile Website
 */
class Checkboxgroup extends Tag
{
    private $_legend;
    private $_role;
    private $_dataType;
    private $_fieldContain;

    /**
     *
     * @param string $id
     * @param string $legend
     * @param array $items
     * @param string $theme
     * @param string $dataType
     * @param boolean $fieldContain
     */
    public function __construct(
        $id = '',
        $legend = '',
        array $items = array(),
        $theme = '',
        $dataType = 'vertical',
        $fieldContain = false
    ) {
        parent::__construct('fieldset', $id, '', '', $theme);
        $this->_legend = $this->add(new Tag('legend', '', '', $legend), true);
        if (is_array($items)) {
            $this->items()->addFromArray($items);
        }
        $this->_role = $this->attribute('data-role', 'controlgroup', true);
        $this->_dataType = $this->attribute('data-type', $dataType, true);
        $this->_fieldContain = $fieldContain;
    }

    /**
     * Adds a checkbox element.
     * @param string $label
     * @param string $value
     * @param string $theme
     * @param boolean $selected
     * @param boolean $returnAdded
     * @return checkboxgroup|input
     */
    public function addCheckbox(
        $id,
        $name = '',
        $label = '',
        $value = '',
        $theme = '',
        $selected = false,
        $returnAdded = false
    ) {
        if ($name == '') {
            $name = $id;
        }
        $chk = $this->add(new Input($id, $name, 'checkbox', $value, $label, $theme), true);
        if ($selected) {
            $chk->attribute('checked', 'checked');
        }
        if ($returnAdded) {
            return $chk;
        }
        return $this;
    }

    /**
     * Gets and sets the legend property.
     * @param string $value
     * @return string|checkboxgroup
     */
    public function legend()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_legend->items()->get(0);
        }
        $this->_legend->items()->set(0, $args[0]);
        return $this;
    }

    /**
     *
     * @param string $value
     * @return string|checkboxgroup
     */
    public function role()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_role->value();
        }
        $this->_role->value($args[0]);
        return $this;
    }

    /**
     * Gets and sets the dataType property (data-type="vertical").
     * @param string $value
     * @return string|checkboxgroup
     */
    public function dataType()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_dataType->value();
        }
        $this->_dataType->value($args[0]);
        return $this;
    }

    /**
     * Gets and sets the fieldContain property.
     * If the fieldContain is true an automatic div data-role="fieldcontain" is generated.
     * @param boolean $value
     * @return bool|checkboxgroup
     */
    public function fieldContain()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_fieldContain;
        }
        $this->_fieldContain = $args[0];
        return $this;
    }

    /**
     *
     * @return string
     */
    public function openTag()
    {
        $string = '';
        if ($this->_fieldContain) {
            $string .= '<div data-role="fieldcontain">';
        }
        $string .= parent::openTag();
        return $string;
    }

    /**
     *
     * @return string
     */
    public function closeTag()
    {
        $string = '';
        $string .= parent::closeTag();
        if ($this->_fieldContain) {
            $string .= '</div>';
        }
        return $string;
    }
}