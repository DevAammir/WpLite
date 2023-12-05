<?php




foreach (WPL_AVAILABLE_OPTIONS as $key => $value) {
    WPL_FORMBUILDER->field([
        'type' => 'checkbox',
        'label' => $value,
        'name' => $key,
        'id' => $key,
        'dbval' => !empty(WPL_SETTINGS[$key]) ? WPL_SETTINGS[$key] : '',
    ]);
}
echo '<hr>';

