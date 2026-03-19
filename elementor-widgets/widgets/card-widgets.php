<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit;

class MyTheme_Card_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'mytheme_card';
    }

    public function get_title()
    {
        return 'Card Widget';
    }

    public function get_icon()
    {
        return 'eicon-post';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_style_depends()
    {
        return ['mytheme-card-widget'];
    }

    public function get_script_depends()
    {
        return ['mytheme-card-widget'];
    }

    protected function register_controls()
    {

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'Content',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'default' => 'Card Title',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => 'Description',
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Card description goes here.',
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => 'Image',
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => 'Style',
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => 'Title Color',
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mytheme-card h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => 'Title Typography',
                'selector' => '{{WRAPPER}} .mytheme-card h3',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => 'Description Color',
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mytheme-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => 'Description Typography',
                'selector' => '{{WRAPPER}} .mytheme-card p',
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => 'Image Width',
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .mytheme-card img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_align',
            [
                'label' => 'Image Alignment',
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => 'Left',
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => 'Center',
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => 'Right',
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .mytheme-card-image' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>
        <div class="mytheme-card">
            <?php if (!empty($settings['image']['url'])) : ?>
                <div class="mytheme-card-image">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                </div>
            <?php endif; ?>

            <h3><?php echo esc_html($settings['title']); ?></h3>
            <p><?php echo esc_html($settings['description']); ?></p>
        </div>
<?php
    }
}
