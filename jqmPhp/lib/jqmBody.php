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
 * This class represents the 'body' tag.
 * @class jqmBody
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
class jqmBody extends jqmTag {
    private $_pages;
    /**
     *
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param array $pages
     */
    function __construct($id='', $attributes=array(), $items=array(), $pages=array()){
        parent::__construct('body', $id, $attributes, $items);
        $this->_pages = $this->add(new jqmCollection($pages),true);
    }
    /**
     * Gets the pages collection in HTML Body (jqmBody).
     * @return jqmCollection
     */
    function pages() {
        return $this->_pages;
    }
    /**
     * Adds a page to the pages collection of HTML Body element (jqmBody).
     * @param jqmPage $page
     * @param bool $returnAdded
     * @return jqmBody|jqmPage
     */
    function addPage($page, $returnAdded=false) {
        $this->pages()->add($page);
        if ($returnAdded) return $page;
        return $this;
    }
}
?>