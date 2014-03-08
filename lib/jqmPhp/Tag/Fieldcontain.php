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

/**
 * This class represents the 'div' tag (data-role="fieldcontain").
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
class Fieldcontain extends Tag
{
    private $_role;

    /**
     *
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param string $theme
     */
    public function __construct($id = '', array $attributes = array(), array $items = array(), $theme = '')
    {
        parent::__construct('div', $id, $attributes, $items, $theme);
        $this->_role = $this->addAttribute(new Attribute('data-role', 'fieldcontain', true));
    }

    /**
     *
     * @param string $value
     * @return string|self
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