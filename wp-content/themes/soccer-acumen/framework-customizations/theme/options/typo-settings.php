<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'typo' => array(
        'title' => esc_html__('Typography', 'soccer-acumen'),
        'type' => 'tab',
        'options' => array(
            'typo-box' => array(
                'title' => esc_html__('Typography Settings', 'soccer-acumen'),
                'type' => 'box',
                'options' => array(
                    'enable_typo' => array(
                        'type' => 'switch',
                        'value' => 'off',
                        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
                        'label' => esc_html__('Enable / Disable Typography', 'soccer-acumen'),
                        'desc' => esc_html__('If you disable this, these options below would not be applied to frontend', 'soccer-acumen'),
                        'left-choice' => array(
                            'value' => 'off',
                            'label' => esc_html__('Off', 'soccer-acumen'),
                        ),
                        'right-choice' => array(
                            'value' => 'on',
                            'label' => esc_html__('ON', 'soccer-acumen'),
                        ),
                    ),
                    'body_font' => array(
                        'type' => 'typography',
                        'value' => array(
                            'family' => 'Verdana',
                            'size' => 15,
                            'style' => '300italic',
                            'color' => '#505050'
                        ),
                        'components' => array(
                            'family' => true,
                            'size' => true,
                            'color' => true
                        ),
                        'label' => esc_html__('Regular Font', 'soccer-acumen'),
                        'desc' => esc_html__('Default Font for body p ul li', 'soccer-acumen'),
                    ),
                    'h1_font' => array(
                        'type' => 'typography',
                        'value' => array(
                            'size' => 40,
                            'family' => 'Verdana',
                            'style' => '300italic',
                            'color' => '#505050'
                        ),
                        'components' => array(
                            'family' => true,
                            'size' => true,
                            'color' => true
                        ),
                        'label' => esc_html__('H1 Heading', 'soccer-acumen'),
                        'desc' => esc_html__('Choose Your H1 Heading font-family, font-size, color, font-weight.', 'soccer-acumen'),
                    ),
                    'h2_font' => array(
                        'type' => 'typography',
                        'value' => array(
                            'family' => 'Verdana',
                            'size' => 40,
                            'style' => '300italic',
                            'color' => '#505050'
                        ),
                        'components' => array(
                            'family' => true,
                            'size' => true,
                            'color' => true
                        ),
                        'label' => esc_html__('H2 Heading', 'soccer-acumen'),
                        'desc' => esc_html__('Choose Your H2 Heading font-family, font-size, color, font-weight.', 'soccer-acumen'),
                    ),
                    'h3_font' => array(
                        'type' => 'typography',
                        'value' => array(
                            'family' => 'Verdana',
                            'size' => 30,
                            'style' => '300italic',
                            'color' => '#505050'
                        ),
                        'components' => array(
                            'family' => true,
                            'size' => true,
                            'color' => true
                        ),
                        'label' => esc_html__('H3 Heading', 'soccer-acumen'),
                        'desc' => esc_html__('Choose Your H3 Heading font-family, font-size, color, font-weight.', 'soccer-acumen'),
                    ),
                    'h4_font' => array(
                        'type' => 'typography',
                        'value' => array(
                            'family' => 'Verdana',
                            'size' => 24,
                            'style' => '300italic',
                            'color' => '#505050'
                        ),
                        'components' => array(
                            'family' => true,
                            'size' => true,
                            'color' => true
                        ),
                        'label' => esc_html__('H4 Heading', 'soccer-acumen'),
                        'desc' => esc_html__('Choose Your H4 Heading font-family, font-size, color, font-weight.', 'soccer-acumen'),
                    ),
                    'h5_font' => array(
                        'type' => 'typography',
                        'value' => array(
                            'family' => 'Verdana',
                            'size' => 20,
                            'style' => '300italic',
                            'color' => '#505050'
                        ),
                        'components' => array(
                            'family' => true,
                            'size' => true,
                            'color' => true
                        ),
                        'label' => esc_html__('H5 Heading', 'soccer-acumen'),
                        'desc' => esc_html__('Choose Your H5 Heading font-family, font-size, color, font-weight.', 'soccer-acumen'),
                    ),
                    'h6_font' => array(
                        'type' => 'typography',
                        'value' => array(
                            'family' => 'Verdana',
                            'size' => 16,
                            'style' => '300italic',
                            'color' => '#505050'
                        ),
                        'components' => array(
                            'family' => true,
                            'size' => true,
                            'color' => true
                        ),
                        'label' => esc_html__('H6 Heading', 'soccer-acumen'),
                        'desc' => esc_html__('Choose Your H6 Heading font-family, font-size, color, font-weight.', 'soccer-acumen'),
                    ),
                )
            ),
        )
    )
);
