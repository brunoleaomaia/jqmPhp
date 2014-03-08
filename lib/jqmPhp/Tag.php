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
namespace jqmPhp;

/**
 * This class represents an html tag.
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
class Tag
{
    private $tagName;
    private $id;
    private $attributes;

    /**
     * @var Collection
     */
    private $items;

    /**
     * @var Attribute
     */
    private $theme;

    /**
     *
     * @param string $tagName
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param string $theme
     */
    public function __construct($tagName, $id = '', array $attributes = array(), array $items = array(), $theme = '')
    {
        $this->tagName = $tagName;
        $this->attributes = new Collection($attributes);
        $this->items = new Collection($items);
        $this->id = new Attribute('id', $id);
        $this->theme = new Attribute('data-theme', $theme);
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        return $this->openTag() . $this->items() . $this->closeTag();
    }

    /**
     * Gets a collection of attributes of the tag.
     *
     * @return Collection
     */
    public function attributes()
    {
        return $this->attributes;
    }

    /**
     * Gets and sets the an attribute.
     * @param string $name
     * @param string $value
     * @param boolean $returnAttribute
     * @return string|self|Attribute
     */
    public function attribute()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return '';
        }
        for ($i = 0; $i < $this->attributes()->size(); $i++) {
            if (is_object($this->attributes()->get($i)) && get_class($this->attributes()->get($i)) == 'jqmAttribute') {
                if ($this->attributes()->get($i)->name() == $args[0]) {
                    if (count($args) == 1) {
                        return $this->attributes()->get($i)->value();
                    }
                    $this->attributes()->get($i)->value($args[1]);
                    if (count($args) == 3 && $args[2]) {
                        return $this->attributes()->get($i);
                    }
                    return $this;
                }
            }
        }
        if (count($args) == 1) {
            return '';
        }
        return $this->addAttribute(new Attribute($args[0], $args[1]), (count($args) == 3 && $args[2]));
    }

    /**
     * Adds an attribute.
     * @param Attribute $attribute
     * @param boolean $returnAttribute
     * @return self|Attribute
     */
    public function addAttribute($attribute, $returnAttribute = false)
    {
        $this->attributes()->add($attribute);
        if ($returnAttribute === true) {
            return $attribute;
        }

        return $this;
    }

    /**
     * Gets a collection of items of the tag
     *
     * @return Collection
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * Adds an item.
     * @param mixed $item
     * @param boolean $returnItem
     * @return self|mixed
     */
    public function add($item, $returnItem = false)
    {
        $this->items()->add($item);
        if ($returnItem) {
            return $item;
        }
        return $this;
    }

    /**
     * Gets and sets the HTML tag.
     *
     * @param string $value
     * @return string|self
     */
    public function tag()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->tagName;
        }
        $this->tagName = $args[0];
        return $this;
    }

    /**
     * Gets and sets the id attribute.
     *
     * @param string $value
     * @return string|self
     */
    public function id()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->id->value();
        }
        $this->id->value($args[0]);
        return $this;
    }

    /**
     * Gets and sets the theme attribute (data-theme="a").
     * @param string $value
     * @return string|self
     */
    public function theme()
    {
        $args = func_get_args();
        if (count($args) == 0) {
            return $this->theme->value();
        }
        $this->theme->value($args[0]);

        return $this;
    }

    /**
     *
     * @return string
     */
    public function openTag()
    {
        $string = '<' . $this->tag();
        if ($this->attributes()->size() > 0) {
            $this->attributes()->separator(' ');
            if ('' . $this->attributes()->get(0) != '') {
                $string .= ' ';
            }
            $string .= $this->attributes();
        }
        $string .= '>';
        return $string;
    }

    /**
     *
     * @return string
     */
    public function closeTag()
    {
        $string = '</' . $this->tag() . '>';
        return $string;
    }
}