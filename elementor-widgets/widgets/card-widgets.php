<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

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

        $this->add_control(
            'extra_class',
            [
                'label' => 'Extra CSS Class',
                'type' => Controls_Manager::TEXT,
                'placeholder' => 'optional-class-name',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>
        <div class="mytheme-card <?php echo esc_attr($settings['extra_class']); ?>">

            <?php if (!empty($settings['image']['url'])) : ?>
                <div class="mytheme-card__image">
                    <img
                        src="<?php echo esc_url($settings['image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['title'] ?: 'Card Image'); ?>">
                </div>
            <?php endif; ?>

            <?php if (!empty($settings['title'])) : ?>
                <h3 class="mytheme-card__title">
                    <?php echo esc_html($settings['title']); ?>
                </h3>
            <?php endif; ?>

            <?php if (!empty($settings['description'])) : ?>
                <p class="mytheme-card__description">
                    <?php echo esc_html($settings['description']); ?>
                </p>
            <?php endif; ?>

        </div>
<?php
    }
}
