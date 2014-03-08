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

use jqmPhp\Attribute;
use jqmPhp\Tag;
use jqmPhp\Text;


/**
 * This class represents the 'textarea' tag.
 *
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
class Textarea extends Tag
{
    private $_name;
    private $_text;
    private $_cols;
    private $_rows;
    private $_label;
    private $_fieldContain;

    /**
     *
     * @param string $id
     * @param string $name
     * @param string $text
     * @param string $cols
     * @param string $rows
     * @param string $label
     * @param string $theme
     * @param boolean $fieldContain
     */
    public function __construct(
        $id,
        $name = '',
        $text = 'text',
        $cols = '',
        $rows = '',
        $label = '',
        $theme = '',
        $fieldContain = false
    ) {
        if ($name == '') {
            $name = $id;
        }
        parent::__construct('textarea', $id, array(), array(), $theme);
        $this->_name = $this->addAttribute(new Attribute('name', $name, true), true);
        $this->_cols = $this->addAttribute(new Attribute('cols', $cols, true), true);
        $this->_rows = $this->addAttribute(new Attribute('rows', $rows, true), true);
        $this->_text = $this->add(new Text($text), true);
        $this->_label = new label('', $label, $name);
        $this->_fieldContain = $fieldContain;
    }

    /**
     * Gets and sets the text property.
     * @param string $value
     * @return string|textarea
     */
    public function text()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_text->text();
        }
        $this->_text->text($args[0]);
        return $this;
    }

    /**
     * Gets and sets the name attribute.
     * @param string $value
     * @return string|textarea
     */
    public function name()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_name->value();
        }
        $this->_name->value($args[0]);
        $this->_label->forField($this->_name->value());
        if ($this->type() == 'radio') {
            $this->_label->forField($this->id());
        }
        return $this;
    }

    /**
     * Gets and sets the cols attribute.
     * @param string $value
     * @return string|self
     */
    public function cols()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_cols->value();
        }
        $this->_cols->value($args[0]);
        return $this;
    }

    /**
     * Gets and sets the rows attribute.
     * @param string $value
     * @return string|textarea
     */
    public function rows()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_rows->value();
        }
        $this->_rows->value($args[0]);
        return $this;
    }

    /**
     * Gets and sets the label property.
     * @param string $value
     * @return string|textarea
     */
    public function label()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_label->text();
        }
        $this->_label->text($args[0]);
        return $this;
    }

    /**
     * Gets and sets the fieldContain property.
     * If the fieldContain is true an automatic div data-role="fieldcontain" is generated.
     * @param boolean $value
     * @return bool|textarea
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
        if ($this->_label->text() != '') {
            $string .= $this->_label;
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
