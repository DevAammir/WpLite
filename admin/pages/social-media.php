    <?php
    foreach (WPL_SOCIAL_MEDIA_PLATFORMS as $key => $value) :

        FORMBUILDER->field([
            'type' => 'text',
            'label' => $key,
            'name' => 'sm_' . $value,
            'id' => 'sm_' . $value,
            'dbval' => !empty(WPL_SOCIALMEDIA['sm_'.$value]) ? WPL_SOCIALMEDIA['sm_'.$value] : '',
        ]);

    endforeach;

    ?>
