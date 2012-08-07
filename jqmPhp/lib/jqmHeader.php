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
/**
 * This file is part of the jqmPhp package.
 * @package jqmPhp
 * @filesource
 */
/**
 * This class represents the 'div' tag (data-role="header").
 * @class jqmHeader
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
class jqmHeader extends jqmTag {
    private $_title;
    private $_role;
    private $_position;
    private $_uiBar;
    /**
     *
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param string $theme
     * @param string $title
     * @param string $position
     */
    function __construct($id='', $attributes=array(), $items=array(), $theme='', $title='', $position='inline', $uiBar=false){
        parent::__construct('div', $id, $attributes, $items, $theme);
        if (get_class($this) == 'jqmHeader') $role = 'header';
        if (get_class($this) == 'jqmFooter') $role = 'footer';
        $this->_role = $this->attribute('data-role', $role, true);
        $this->_position = $this->attribute('data-position', $position, true);
        $this->_uiBar = $this->attribute('class', ($uiBar) ? 'ui-bar' : '', true);
        $this->_title = $this->add(new jqmTitle($title),true);
    }
    /**
     * @access private
     * @return string
     */
    function __toString() {
        $string = '';
        if ($this->title()!='' || $this->items()->size() > 1) $string = parent::__toString();
        return $string;
    }
    /**
     * Gets and sets the title property.
     * @param string $value
     * @return string|jqmHeader
     */
    function title() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_title->text();
        $this->_title->text($args[0]);
        return $this;
    }
    /**
     * @access private
     * @param string $value
     * @return string|jqmHeader
     */
    function role() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_role->value();
        $this->_role->value($args[0]);
        return $this;
    }
    /**
     * Gets and sets the position property (data-position="inline").
     * @param string $value
     * @return string|jqmHeader
     */
    function position() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_position->value();
        $this->_position->value($args[0]);
        return $this;
    }
    /**
     * Gets and sets the uiBar property (class="ui-bar").
     * @param string $value
     * @return string|jqmHeader
     */
    function uiBar() {
        $args = func_get_args();
        if (count($args) == 0) return ($this->_uiBar->value() == 'ui-bar') ? true : false;
        $this->_uiBar->value(($args[0]) ? 'ui-bar': '');
        return $this;
    }
    /**
     * Adds a button (jqmButton).
     * @param string $text
     * @param string $href
     * @param string $theme
     * @param string $icon
     * @param bool $returnAdded
     * @return jqmHeader|jqmButton
     */
    function addButton($text, $href='', $theme='', $icon='', $active=false, $inline=false, $returnAdded=false) {
        $bt = $this->add(new jqmButton(), true);
        $bt->text($text)->href($href)->theme($theme)->icon($icon)->active($active)->inline($inline);
        if ($returnAdded) return $bt;
        return $this;
    }
}
?>