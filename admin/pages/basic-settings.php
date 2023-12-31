<?php
/*
foreach (WPL_AVAILABLE_OPTIONS as $key => $value) {
    FORMBUILDER->field([
        'type' => 'checkbox',
        'label' => $value,
        'name' => $key,
        'id' => $key,
        'dbval' => !empty(WPL_SETTINGS[$key]) ? WPL_SETTINGS[$key] : '',
    ]);
}
echo '<hr>';
*/
foreach (WPL_AVAILABLE_FEATURES as $k => $v) {
    FORMBUILDER->field([
        'type' => $v,
        'label' => $k,
        'name' => $k,
        'id' => $k,
        'dbval' => !empty(WPL_SETTINGS[$k]) ? WPL_SETTINGS[$k] : '',
    ]);
}
echo '<hr>';

foreach (WPL_AVAILABLE_OPTIONS as $k => $v) {
    FORMBUILDER->field([
        'type' => $v,
        'label' => $k,
        'name' => $k,
        'id' => $k,
        'dbval' => !empty(WPL_SETTINGS[$k]) ? WPL_SETTINGS[$k] : '',
    ]);
}
echo '<hr>';