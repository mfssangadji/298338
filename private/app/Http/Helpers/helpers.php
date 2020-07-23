<?php
 
/**
 * Return active if current path begins with path.
 *
 * @param string $path
 * @return string
 */
function active($path) {
    if (Request::is($path)) {
        return 'active';
    } else {
        return '';
    }
}