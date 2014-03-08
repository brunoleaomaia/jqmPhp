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
use jqmPhp\Title;

/**
 * This class represents the 'div' tag (data-role="header").
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
class Header extends Tag
{
    private $_title;
    protected $_role;
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
    public function __construct(
        $id = '',
        $attributes = array(),
        $items = array(),
        $theme = '',
        $title = '',
        $position = 'inline',
        $uiBar = false
    ) {
        parent::__construct('div', $id, $attributes, $items, $theme);
        $this->_role = $this->attribute('data-role', 'header', true);
        $this->_position = $this->attribute('data-position', $position, true);
        $this->_uiBar = $this->attribute('class', ($uiBar) ? 'ui-bar' : '', true);
        $this->_title = $this->add(new Title($title), true);
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        $string = '';
        if ($this->title() != '' || $this->items()->size() > 1) {
            $string = parent::__toString();
        }
        return $string;
    }

    /**
     * Gets and sets the title property.
     * @param string $value
     * @return string|header
     */
    public function title()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_title->text();
        }
        $this->_title->text($args[0]);
        return $this;
    }

    /**
     *
     * @param string $value
     * @return string|header
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
     * Gets and sets the position property (data-position="inline").
     * @param string $value
     * @return string|header
     */
    public function position()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_position->value();
        }
        $this->_position->value($args[0]);
        return $this;
    }

    /**
     * Gets and sets the uiBar property (class="ui-bar").
     * @param string $value
     * @return string|header
     */
    public function uiBar()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return ($this->_uiBar->value() == 'ui-bar') ? true : false;
        }
        $this->_uiBar->value(($args[0]) ? 'ui-bar' : '');
        return $this;
    }

    /**
     * Adds a button (button).
     * @param string $text
     * @param string $href
     * @param string $theme
     * @param string $icon
     * @param boolean $returnAdded
     * @return Header|Button
     */
    public function addButton(
        $text,
        $href = '',
        $theme = '',
        $icon = '',
        $active = false,
        $inline = false,
        $returnAdded = false
    ) {
        $bt = $this->add(new Button(), true);
        $bt->text($text)->href($href)->theme($theme)->icon($icon)->active($active)->inline($inline);
        if ($returnAdded) {
            return $bt;
        }
        return $this;
    }
}