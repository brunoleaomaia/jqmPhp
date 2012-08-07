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
 * This class represents the 'ul' or 'ol' tag (data-role="listview").
 * @class jqmListviem
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
class jqmListview extends jqmTag {
    private $_role;
    private $_inset;
    private $_filter;
    private $_splitIcon;
    private $_splitTheme;
    private $_dividerTheme;
    private $_countTheme;
    /**
     *
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param string $theme
     * @param bool $inset
     * @param bool $filter
     * @param bool $ordered
     * @param string $splitIcon
     * @param string $splitTheme
     * @param string $dividerTheme
     * @param string $countTheme
     */
    function __construct($id='', $attributes=array(), $items=array(), $theme='', $inset=false, $filter=false, $ordered=false, $splitIcon='', $splitTheme='', $dividerTheme='', $countTheme=''){
        parent::__construct(($ordered) ? 'ol' : 'ul', $id, $attributes, $items, $theme);
        $this->_role = $this->attribute('data-role', 'listview', true);
        $this->_inset = $this->attribute('data-inset', (($inset) ? 'true' : ''), true);
        $this->_filter = $this->attribute('data-filter', (($filter) ? 'true' : ''), true);
        $this->_splitIcon = $this->attribute('data-split-icon', $splitIcon, true);
        $this->_splitTheme = $this->attribute('data-split-theme', $splitTheme, true);
        $this->_dividerTheme = $this->attribute('data-divider-theme', $dividerTheme, true);
        $this->_countTheme = $this->attribute('data-count-theme', $countTheme, true);
    }
    /**
     * Adds a Basic Listitem (jqmListitem).
     * @param string $title
     * @param string $href
     * @param string $count
     * @param bool $returnAdded
     * @return jqmListview|jqmListitem
     */
    function addBasic($title, $href='', $count='', $returnAdded=false) {
        $li = $this->add(new jqmListitem(), true);
        $li->title($title)->href($href)->count($count);
        if ($returnAdded) return $li;
        return $this;
    }
    /**
     * Adds a Nested Listitem (jqmListitem).
     * @param string $title
     * @param jqmListview $listview
     * @param bool $returnAdded
     * @return jqmListview
     */
    function addNested($title, $listview, $returnAdded=false) {
        $li = $this->add(new jqmListitem(), true);
        $li->title($title);
        $li->add($listview);
        if ($returnAdded) return $li;
        return $this;
    }
    /**
     * Adds a Divider Listitem (jqmListitem).
     * @param string $title
     * @param string $count
     * @param bool $returnAdded
     * @return jqmListview|jqmListitem
     */
    function addDivider($title, $count='', $returnAdded=false) {
        $li = $this->add(new jqmListitem(), true);
        $li->title($title)->divider(true)->count($count);
        if ($returnAdded) return $li;
        return $this;
    }
    /**
     * Adds a Icon Listitem (jqmListitem).
     * @param string $title
     * @param string $href
     * @param string $img
     * @param string $count
     * @param bool $returnAdded
     * @return jqmListview|jqmListitem
     */
    function addIcon($title, $href='', $img='', $count='', $returnAdded=false) {
        $li = $this->add(new jqmListitem(), true);
        $li->title($title)->href($href)->count($count)->img($img);
        if ($returnAdded) return $li;
        return $this;
    }
    /**
     * Adds a Thumbnail Listitem (jqmListitem).
     * @param string $title
     * @param string $subTitle
     * @param string $href
     * @param string $img
     * @param string $count
     * @param bool $returnAdded
     * @return jqmListview|jqmListitem
     */
    function addThumb($title, $subTitle='', $href='', $img='', $count='', $returnAdded=false) {
        $li = $this->add(new jqmListitem(), true);
        $li->title($title)->href($href)->count($count)->img($img)->isThumb(true)->subTitle($subTitle);
        if ($returnAdded) return $li;
        return $this;
    }
    /**
     * Adds a Split Listitem (jqmListitem).
     * @param string $title
     * @param string $href
     * @param string $splitHref
     * @param string $count
     * @param bool $returnAdded
     * @return jqmListview|jqmListitem
     */
    function addSplit($title, $href='', $splitHref='', $count='', $returnAdded=false) {
        $li = $this->add(new jqmListitem(), true);
        $li->title($title)->href($href)->count($count)->splitHref($splitHref);
        if ($returnAdded) return $li;
        return $this;
    }
    /**
     * Adds a Icon-Split Listitem (jqmListitem).
     * @param string $title
     * @param string $href
     * @param string $splitHref
     * @param string $img
     * @param string $count
     * @param bool $returnAdded
     * @return jqmListview|jqmListitem
     */
    function addIconSplit($title, $href='', $splitHref='', $img='', $count='', $returnAdded=false) {
        $li = $this->add(new jqmListitem(), true);
        $li->title($title)->href($href)->count($count)->splitHref($splitHref)->img($img);
        if ($returnAdded) return $li;
        return $this;
    }
    /**
     * Adds a Thumbnail-Split Listitem (jqmListitem).
     * @param string $title
     * @param string $subTitle
     * @param string $href
     * @param string $splitHref
     * @param string $img
     * @param string $count
     * @param bool $returnAdded
     * @return jqmListview|jqmListitem
     */
    function addThumbSplit($title, $subTitle='', $href='', $splitHref='', $img='', $count='', $returnAdded=false) {
        $li = $this->add(new jqmListitem(), true);
        $li->title($title)->href($href)->count($count)->splitHref($splitHref)->img($img)->subTitle($subTitle)->isThumb(true);
        if ($returnAdded) return $li;
        return $this;
    }
    /**
     * @access private
     * @param string $value
     * @return string|jqmListviem
     */
    function role() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_role->value();
        $this->_role->value($args[0]);
        return $this;
    }
    /**
     * Gets and sets the inset property (data-inset="true").
     * @param bool $value
     * @return bool|jqmListviem
     */
    function inset() {
        $args = func_get_args();
        if (count($args) == 0) return ($this->_inset->value()=='true') ? true : false;
        $this->_inset->value(($args[0]) ? 'true' : '');
        return $this;
    }
    /**
     * Gets and sets the filter property (data-filter="true").
     * @param bool $value
     * @return bool|jqmListviem
     */
    function filter() {
        $args = func_get_args();
        if (count($args) == 0) return ($this->_filter->value()=='true') ? true : false;
        $this->_filter->value(($args[0]) ? 'true' : '');
        return $this;
    }
    /**
     * Gets and sets the splitIcon property (data-split-icon="gear").
     * @param string $value
     * @return string|jqmListviem
     */
    function splitIcon() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_splitIcon->value();
        $this->_splitIcon->value($args[0]);
        return $this;
    }
    /**
     * Gets and sets the splitTheme property (data-split-theme="a").
     * @param string $value
     * @return string|jqmListviem
     */
    function splitTheme() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_splitTheme->value();
        $this->_splitTheme->value($args[0]);
        return $this;
    }
    /**
     * Gets and sets the dividerTheme property (data-divider-theme="a").
     * @param string $value
     * @return string|jqmListviem
     */
    function dividerTheme() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_dividerTheme->value();
        $this->_dividerTheme->value($args[0]);
        return $this;
    }
    /**
     * Gets and sets the countTheme property (data-count-theme="a").
     * @param string $value
     * @return string|jqmListviem
     */
    function countTheme() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_countTheme->value();
        $this->_countTheme->value($args[0]);
        return $this;
    }
}
/**
 * Fix a typo in first version of the Class Name;
 */
class jqmListviem extends jqmListview {}
?>