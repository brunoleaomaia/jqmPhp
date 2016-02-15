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

namespace jqmPhp\Tag\Input;

use jqmPhp\Attribute;
use jqmPhp\Tag\Input;

/**
 * This class represents the 'input' tag (type="range").
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
class Range extends Input
{
    private $_max;
    private $_min;

    /**
     *
     * @param string $id
     * @param string $name
     * @param string $value
     * @param string $min
     * @param string $max
     * @param string $label
     * @param string $theme
     * @param boolean $fieldContain
     */
    public function __construct(
        $id = '',
        $name = '',
        $value = '0',
        $min = '0',
        $max = '100',
        $label = '',
        $theme = '',
        $fieldContain = false
    ) {
        parent::__construct($id, $name, 'range', $value, $label, $theme, $fieldContain);
        $this->_min = $this->addAttribute(new Attribute('min', $min, true), true);
        $this->_max = $this->addAttribute(new Attribute('max', $max, true), true);
    }

    /**
     *
     * @param string $value
     * @return string|self
     */
    public function name()
    {
        if (func_num_args() === 0) {
            return $this->_name->value();
        }
        $this->_name->value(func_get_arg(0));
        $this->_label->forField($this->_name);
        return $this;
    }

    /**
     *
     * @param string $value
     * @return string|Range
     */
    public function min()
    {
        if (func_num_args() === 0) {
            return $this->_min->value();
        }
        $this->_min->value(func_get_arg(0));
        return $this;
    }

    /**
     *
     * @param string $value
     * @return string|self
     */
    public function max()
    {
        if (func_num_args() === 0) {
            return $this->_max->value();
        }
        $this->_max->value(func_get_arg(0));
        return $this;
    }
}
