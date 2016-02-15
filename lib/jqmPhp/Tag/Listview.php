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
        parent::__construct($ordered === true ? 'ol' : 'ul', $id, $attributes, $items, $theme);

        $this->_role = $this->addAttribute(new Attribute('data-role', 'listview'), true);
        $this->_inset = $this->addAttribute(new Attribute('data-inset', $inset === true ? 'true' : ''), true);
        $this->_filter = $this->addAttribute(new Attribute('data-filter', $filter === true ? 'true' : ''), true);
        $this->_splitIcon = $this->addAttribute(new Attribute('data-split-icon', $splitIcon), true);
        $this->_splitTheme = $this->addAttribute(new Attribute('data-split-theme', $splitTheme), true);
        $this->_dividerTheme = $this->addAttribute(new Attribute('data-divider-theme', $dividerTheme), true);
        $this->_countTheme = $this->addAttribute(new Attribute('data-count-theme', $countTheme), true);
    }

    /**
     * Adds a Basic Listitem (Listitem).
     * @param string $title
     * @param string $href
     * @param string $count
     * @param boolean $returnAdded
     * @return self|Listitem
     */
    public function addBasic($title, $href = '', $count = '', $returnAdded = false)
    {
        $li = new Listitem();
        $li->title($title)
            ->href($href)
            ->count($count);
        $this->add($li);
        if ($returnAdded === true) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Nested Listitem (Listitem).
     * @param string $title
     * @param Listview $listview
     * @param boolean $returnAdded
     * @return self
     */
    public function addNested($title, Listview $listview, $returnAdded = false)
    {
        $li = $this->add(new Listitem());
        $li->title($title);
        $li->add($listview);
        if ($returnAdded === true) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Divider Listitem
     *
     * @param string $title
     * @param string $count
     * @param boolean $returnAdded
     * @return self|Listitem
     */
    public function addDivider($title, $count = '', $returnAdded = false)
    {
        $li = new Listitem();
        $li->title($title)
            ->divider(true)
            ->count($count);

        $this->add($li);
        if ($returnAdded === true) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Icon Listitem (Listitem)
     *
     * @param string $title
     * @param string $href
     * @param string $img
     * @param string $count
     * @param boolean $returnAdded
     * @return self|Listitem
     */
    public function addIcon($title, $href = '', $img = '', $count = '', $returnAdded = false)
    {
        $li = new Listitem();
        $li->title($title)
            ->href($href)
            ->count($count)
            ->img($img);
        $this->add($li);
        if ($returnAdded === true) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Thumbnail Listitem (Listitem)
     *
     * @param string $title
     * @param string $subTitle
     * @param string $href
     * @param string $img
     * @param string $count
     * @param boolean $returnAdded
     * @return self|Listitem
     */
    public function addThumb($title, $subTitle = '', $href = '', $img = '', $count = '', $returnAdded = false)
    {
        $li = new Listitem();
        $li->title($title)
            ->href($href)
            ->count($count)
            ->img($img)
            ->isThumb(true)
            ->subTitle($subTitle);

        $this->add($li);
        if ($returnAdded === true) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Split Listitem (Listitem)
     *
     * @param string $title
     * @param string $href
     * @param string $splitHref
     * @param string $count
     * @param boolean $returnAdded
     * @return self|Listitem
     */
    public function addSplit($title, $href = '', $splitHref = '', $count = '', $returnAdded = false)
    {
        $li = new Listitem();

        $li->title($title)
            ->href($href)
            ->count($count)
            ->splitHref($splitHref);
        $this->add($li);
        if ($returnAdded === true) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Icon-Split Listitem (Listitem)
     *
     * @param string $title
     * @param string $href
     * @param string $splitHref
     * @param string $img
     * @param string $count
     * @param boolean $returnAdded
     * @return self|Listitem
     */
    public function addIconSplit($title, $href = '', $splitHref = '', $img = '', $count = '', $returnAdded = false)
    {
        $li = new Listitem();
        $li->title($title)
            ->href($href)
            ->count($count)
            ->splitHref($splitHref)
            ->img($img);
        $this->add($li);
        if ($returnAdded === true) {
            return $li;
        }
        return $this;
    }

    /**
     * Adds a Thumbnail-Split Listitem (Listitem)
     *
     * @param string $title
     * @param string $subTitle
     * @param string $href
     * @param string $splitHref
     * @param string $img
     * @param string $count
     * @param boolean $returnAdded
     * @return self|Listitem
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
        $li = new Listitem();
        $li->title($title)
            ->href($href)
            ->count($count)
            ->splitHref($splitHref)
            ->img($img)
            ->subTitle($subTitle)
            ->isThumb(true);
        $this->add($li);
        if ($returnAdded === true) {
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
        if (func_num_args() === 0) {
            return $this->_role->value();
        }
        $this->_role->value(func_get_arg(0));
        return $this;
    }

    /**
     * Gets and sets the inset property (data-inset="true").
     * @param boolean $value
     * @return bool|self
     */
    public function inset()
    {
        if (func_num_args() === 0) {
            return ($this->_inset->value() == 'true') ? true : false;
        }
        $this->_inset->value(func_get_arg(0) === true ? 'true' : '');
        return $this;
    }

    /**
     * Gets and sets the filter property (data-filter="true").
     * @param boolean $value
     * @return bool|self
     */
    public function filter()
    {
        if (func_num_args() === 0) {
            return ($this->_filter->value() == 'true') ? true : false;
        }
        $this->_filter->value(func_get_arg(0) === true ? 'true' : '');
        return $this;
    }

    /**
     * Gets and sets the splitIcon property (data-split-icon="gear").
     * @param string $value
     * @return string|self
     */
    public function splitIcon()
    {
        if (func_num_args() === 0) {
            return $this->_splitIcon->value();
        }
        $this->_splitIcon->value(func_get_arg(0));
        return $this;
    }

    /**
     * Gets and sets the splitTheme property (data-split-theme="a").
     * @param string $value
     * @return string|self
     */
    public function splitTheme()
    {
        if (func_num_args() === 0) {
            return $this->_splitTheme->value();
        }
        $this->_splitTheme->value(func_get_arg(0));
        return $this;
    }

    /**
     * Gets and sets the dividerTheme property (data-divider-theme="a").
     * @param string $value
     * @return string|self
     */
    public function dividerTheme()
    {
        if (func_num_args() === 0) {
            return $this->_dividerTheme->value();
        }
        $this->_dividerTheme->value(func_get_arg(0));
        return $this;
    }

    /**
     * Gets and sets the countTheme property (data-count-theme="a").
     * @param string $value
     * @return string|self
     */
    public function countTheme()
    {
        if (func_num_args() === 0) {
            return $this->_countTheme->value();
        }
        $this->_countTheme->value(func_get_arg(0));
        return $this;
    }
}
