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
 * This class represents the 'input' tag (type="range").
 * @class jqmRange
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
class jqmRange extends jqmInput {
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
     * @param bool $fieldContain
     */
    function __construct($id='', $name='', $value='0', $min='0', $max='100', $label='', $theme='', $fieldContain=false){
        parent::__construct($id, $name, 'range', $value, $label, $theme, $fieldContain);
        $this->_min = $this->addAttribute(new jqmAttribute('min', $min, true), true);
        $this->_max = $this->addAttribute(new jqmAttribute('max', $max, true), true);
    }
    /**
     *
     * @param string $value
     * @return string|jqmRange
     */
    function name() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_name->value();
        $this->_name->value($args[0]);
        $this->_label->forField($this->_name);
        return $this;
    }
    /**
     *
     * @param string $value
     * @return string|jqmRange
     */
    function min(){
        $args = func_get_args();
        if (count($args) == 0) return $this->_min->value();
        $this->_min->value($args[0]);
        return $this;
    }
    /**
     *
     * @param string $value
     * @return string|jqmRange
     */
    function max(){
        $args = func_get_args();
        if (count($args) == 0) return $this->_max->value();
        $this->_max->value($args[0]);
        return $this;
    }
}
?>