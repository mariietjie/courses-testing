<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class FlexibleHomepage extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Flexible content';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Flexible homepage content';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'common';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'star-half';

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'homepage_sections' => $this->homepage_sections(),
        ];
    }

    /**
     * The function `fields()` returns flexible content layout on homepage
     *
     * @return array
     */
    public function fields() {
        
        $content = new FieldsBuilder('page_content');
        $content
            ->setLocation('page_type', '==', 'front_page')
            ->addFlexibleContent('homepage_sections')
                ->addLayout('banner')
                    ->addImage('banner_image')
                    ->addText('banner_subtitle')
                    ->addText('banner_title')
                    ->addText('banner_short_description')
                    ->addText('banner_form_shortcode')
                ->addLayout('heading')
                    ->addWysiwyg('heading')
                ->addLayout('products_grid')
                ->addLayout('shadow_box')
                    ->addImage('box_image')
                    ->addText('text_content')
                ->addLayout('expert_info')
                    ->addImage('customers_image')
                ->addLayout('text_content')
                    ->addWysiwyg('homepage_text')
                ->addLayout('button')
                    ->addText('button_text')
                    ->addLink('button_link')
                ->addLayout('image')
                    ->addImage('homepage_image', [
                        'wrapper' => [
                            'class' => 'acf-image',
                            'id' => '',
                        ],
                    ])
                ->addLayout('testimonials')
                    ->addPostObject('testimonials', [
                        'post_type' => 'testimonials',
                        'multiple' => 1,
                        'return_format' => 'object',
                        'ui' => 1,
                    ])
                ->addLayout('form')
                    ->addImage('form_image')
                    ->addText('form_subtitle')
                    ->addText('form_title')
                    ->addText('form_content')
                    ->addText('form_shortcode');

        return $content->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function homepage_sections() {
        return get_field('homepage_sections') ?: [];
    }
}