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
 * This class represents the 'div' tag (data-role="footer").
 * @class jqmFooter
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
class jqmFooter extends jqmHeader {
    private $_group;
    /**
     *
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param string $theme
     * @param string $title
     * @param string $position
     * @param bool $group
     */
    function __construct($id='', $attributes=array(), $items=array(), $theme='', $title='', $position='inline', $group=false){
        parent::__construct($id, $attributes, $items, $theme, $title, $position);
        $this->group($group);
    }
    /**
     * Gets and sets the group property.
     * If the group is true an automatic div data-role="controlgroup" is generated.
     * @param bool $value
     * @return bool|jqmFooter
     */
    function group(){
        $args = func_get_args();
        if (count($args) == 0) return $this->_group;
        $this->_group = $args[0];
        $this->items()->prefix((($this->_group)?'<div data-role="controlgroup" data-type="horizontal">':''));
        $this->items()->suffix((($this->_group)?'</div>':''));
        return $this;
    }
}
?>