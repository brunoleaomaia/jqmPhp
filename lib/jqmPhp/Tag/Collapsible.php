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
 * This class represents the 'div' tag (data-role="collapsible").
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
class Collapsible extends Tag
{
    private $_role;
    private $_title;
    private $_collapsed;

    /**
     *
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param string $theme
     * @param string $title
     * @param boolean $collapsed
     */
    public function __construct(
        $id = '',
        array $attributes = array(),
        array $items = array(),
        $theme = '',
        $title = '',
        $collapsed = true
    ) {
        parent::__construct('div', $id, $attributes, array(), $theme);
        $this->_role = $this->attribute('data-role', 'collapsible', true);
        $this->_collapsed = $this->attribute('data-collapsed', (($collapsed) ? 'true' : 'false'), true);
        $this->_title = $this->add(new Title($title), true);
        $this->items()->addFromArray($items);
    }

    /**
     * Gets and sets the title property.
     * @param string $value
     * @return string|collapsible
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
     * Gets and sets the collapsed property (data-colapsed="true").
     * @param boolean $value
     * @return bool|collapsible
     */
    public function collapsed()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return ($this->_collapsed->value() == 'true') ? true : false;
        }
        $this->_collapsed->value(($args[0]) ? 'true' : 'false');
        return $this;
    }

    /**
     *
     * @param string $value
     * @return string|collapsible
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
}