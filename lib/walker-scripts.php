<?php
class LTC_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub-menu-wrapper'><ul class='sub-menu'>\n";
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $current_object_id = 0) {
        // Add <hr> after each submenu item
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $output .= $indent . '<li id="menu-item-' . $item->ID . '" class="menu-item menu-item-type-' . esc_attr($item->type) . ' menu-item-object-' . esc_attr($item->object) . ' menu-item-' . $item->ID . '">';
        $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $output .= "$indent</li>\n";

        if (!$args->walker->has_children) {
            $output .= "$indent<hr>\n";
        }
    }
}
