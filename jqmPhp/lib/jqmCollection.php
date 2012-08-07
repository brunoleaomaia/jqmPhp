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
 * This class represents a collection.
 * @class jqmCollection
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
class jqmCollection {
    private $_items;
    private $_separator;
    private $_prefix;
    private $_suffix;
    /**
     *
     * @param array $items
     * @param string $separator
     * @param string $prefix
     * @param string $suffix
     */
    function __construct($items=array(), $separator='', $prefix='', $suffix=''){
        if (!is_array($items) && $items != '') $items = array($items);
        if (!is_array($items)) $items = array();
        if (is_array($items)) $this->_items = $items;
        $this->_separator = $separator;
        $this->_prefix = $prefix;
        $this->_suffix = $suffix;
    }
    /**
     *
     * @return string
     */
    function __toString() {
        $string='';
        if (count($this->_items) > 0) $string = $this->prefix();
        for($i = 0; $i < count($this->_items); $i++) {
            if ($i > 0 && $this->_items[$i] != '') $string .= $this->separator();
            $string .= $this->_items[$i];
        }
        if (count($this->_items) > 0) $string.= $this->suffix();
        return $string;
    }
    /**
     * Adds an item.
     * @param mixed $item
     * @return jqmCollection
     */
    function add($item) {
        $this->_items[] = $item;
        return $this;
    }
    /**
     * Adds many items from an array.
     * @param array $items
     * @return jqmCollection
     */
    function addFromArray($items) {
        if (is_array($items)) for ($i = 0; $i < count($items); $i++) $this->add($items[$i]);
        return $this;
    }
    /**
     * Gets all items.
     * @return array
     */
    function getAll() {
        return $this->_items;
    }
    /**
     * Gets an item in a position.
     * @param int $index
     * @return mixed
     */
    function get($index) {
        return $this->_items[$index];
    }
    /**
     * Sets an item in a position.
     * @param int $index
     * @param mixed $item
     * @return jqmCollection
     */
    function set($index, $item) {
        $this->_items[$index] = $item;
        return $this;
    }
    /**
     * Removes an item in a position.
     * @param int $index
     * @return jqmCollection
     */
    function remove($index) {
        $tmp = array();
        for ($i = 0; $i < count($this->_items); $i++) {
            if ($i != $index) $tmp[] = $this->_items[$i];
        }
        $this->_items = $tmp;
        return $this;
    }
    /**
     * Inserts an item in a position.
     * @param int $index
     * @param mixed $item
     * @return jqmCollection
     */
    function insert($index, $item) {
        $tmp = array();
        for ($i = 0; $i < count($this->_items); $i++) {
            if ($i == $index) $tmp[] = $item;
            $tmp[] = $this->_items[$i];
        }
        $this->_items = $tmp;
        return $this;
    }
    /**
     * Gets the collection size.
     * @return int
     */
    function size() {
        return count($this->_items);
    }
    /**
     * Gets and sets the separator property.
     * @param string $value
     * @return string|jqmCollection
     */
    function separator(){
        $args = func_get_args();
        if (count($args) == 0) return $this->_separator;
        $this->_separator = $args[0];
        return $this;
    }
    /**
     * Gets and sets the prefix property.
     * @param string $value
     * @return string|jqmCollection
     */
    function prefix(){
        $args = func_get_args();
        if (count($args) == 0) return $this->_prefix;
        $this->_prefix = $args[0];
        return $this;
    }
    /**
     * Gets and sets the suffix property.
     * @param string $value
     * @return string|jqmCollection
     */
    function suffix(){
        $args = func_get_args();
        if (count($args) == 0) return $this->_suffix;
        $this->_suffix = $args[0];
        return $this;
    }
}
?>