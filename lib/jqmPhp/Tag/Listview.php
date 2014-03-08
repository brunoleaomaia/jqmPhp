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

/**
 * This class represents the 'ul' or 'ol' tag (data-role="listview").
 * @class Listviem
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
class Listview extends Tag
{
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
     * @param boolean $inset
     * @param boolean $filter
     * @param boolean $ordered
     * @param string $splitIcon
     * @param string $splitTheme
     * @param string $dividerTheme
     * @param string $countTheme
     */
    public function __construct(
        $id = '',
        array $attributes = array(),
        array $items = array(),
        $theme = '',
        $inset = false,
        $filter = false,
        $ordered = false,
        $splitIcon = '',
        $splitTheme = '',
        $dividerTheme = '',
        $countTheme = ''
    ) {
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
     * Adds a Basic Listitem (listitem).
     * @param string $title
     * @param string $href
     * @param string $count
     * @param boolean $returnAdded
     * @return listview|listitem
     */
    public function addBasic($title, $href = '', $count = '', $returnAdded = false)
    {
        $li = $this->add(new listitem(), true);
        $li->title($title)->href($href)->count($count);
        if ($returnAdded) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Nested Listitem (listitem).
     * @param string $title
     * @param listview $listview
     * @param boolean $returnAdded
     * @return listview
     */
    public function addNested($title, $listview, $returnAdded = false)
    {
        $li = $this->add(new listitem(), true);
        $li->title($title);
        $li->add($listview);
        if ($returnAdded) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Divider Listitem (listitem).
     * @param string $title
     * @param string $count
     * @param boolean $returnAdded
     * @return listview|listitem
     */
    public function addDivider($title, $count = '', $returnAdded = false)
    {
        $li = $this->add(new listitem(), true);
        $li->title($title)->divider(true)->count($count);
        if ($returnAdded) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Icon Listitem (listitem).
     * @param string $title
     * @param string $href
     * @param string $img
     * @param string $count
     * @param boolean $returnAdded
     * @return listview|listitem
     */
    public function addIcon($title, $href = '', $img = '', $count = '', $returnAdded = false)
    {
        $li = $this->add(new listitem(), true);
        $li->title($title)->href($href)->count($count)->img($img);
        if ($returnAdded) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Thumbnail Listitem (listitem).
     * @param string $title
     * @param string $subTitle
     * @param string $href
     * @param string $img
     * @param string $count
     * @param boolean $returnAdded
     * @return listview|listitem
     */
    public function addThumb($title, $subTitle = '', $href = '', $img = '', $count = '', $returnAdded = false)
    {
        $li = $this->add(new listitem(), true);
        $li->title($title)->href($href)->count($count)->img($img)->isThumb(true)->subTitle($subTitle);
        if ($returnAdded) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Split Listitem (listitem).
     * @param string $title
     * @param string $href
     * @param string $splitHref
     * @param string $count
     * @param boolean $returnAdded
     * @return listview|listitem
     */
    public function addSplit($title, $href = '', $splitHref = '', $count = '', $returnAdded = false)
    {
        $li = $this->add(new listitem(), true);
        $li->title($title)->href($href)->count($count)->splitHref($splitHref);
        if ($returnAdded) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Icon-Split Listitem (listitem).
     * @param string $title
     * @param string $href
     * @param string $splitHref
     * @param string $img
     * @param string $count
     * @param boolean $returnAdded
     * @return listview|listitem
     */
    public function addIconSplit($title, $href = '', $splitHref = '', $img = '', $count = '', $returnAdded = false)
    {
        $li = $this->add(new listitem(), true);
        $li->title($title)->href($href)->count($count)->splitHref($splitHref)->img($img);
        if ($returnAdded) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Thumbnail-Split Listitem (listitem).
     * @param string $title
     * @param string $subTitle
     * @param string $href
     * @param string $splitHref
     * @param string $img
     * @param string $count
     * @param boolean $returnAdded
     * @return listview|listitem
     */
    public function addThumbSplit(
        $title,
        $subTitle = '',
        $href = '',
        $splitHref = '',
        $img = '',
        $count = '',
        $returnAdded = false
    ) {
        $li = $this->add(new listitem(), true);
        $li->title($title)->href($href)->count($count)->splitHref($splitHref)->img($img)->subTitle($subTitle)->isThumb(
            true
        );
        if ($returnAdded) {
            return $li;
        }
        return $this;
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

    /**
     * Gets and sets the inset property (data-inset="true").
     * @param boolean $value
     * @return bool|self
     */
    public function inset()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return ($this->_inset->value() == 'true') ? true : false;
        }
        $this->_inset->value(($args[0]) ? 'true' : '');
        return $this;
    }

    /**
     * Gets and sets the filter property (data-filter="true").
     * @param boolean $value
     * @return bool|self
     */
    public function filter()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return ($this->_filter->value() == 'true') ? true : false;
        }
        $this->_filter->value(($args[0]) ? 'true' : '');
        return $this;
    }

    /**
     * Gets and sets the splitIcon property (data-split-icon="gear").
     * @param string $value
     * @return string|self
     */
    public function splitIcon()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_splitIcon->value();
        }
        $this->_splitIcon->value($args[0]);
        return $this;
    }

    /**
     * Gets and sets the splitTheme property (data-split-theme="a").
     * @param string $value
     * @return string|self
     */
    public function splitTheme()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_splitTheme->value();
        }
        $this->_splitTheme->value($args[0]);
        return $this;
    }

    /**
     * Gets and sets the dividerTheme property (data-divider-theme="a").
     * @param string $value
     * @return string|self
     */
    public function dividerTheme()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_dividerTheme->value();
        }
        $this->_dividerTheme->value($args[0]);
        return $this;
    }

    /**
     * Gets and sets the countTheme property (data-count-theme="a").
     * @param string $value
     * @return string|self
     */
    public function countTheme()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->_countTheme->value();
        }
        $this->_countTheme->value($args[0]);
        return $this;
    }
}
