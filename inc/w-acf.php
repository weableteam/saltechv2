<?php

/**
 * Load ACF json
 * 
 * @author weable team
 */
function acf_json_load_point($paths)
{
    unset($paths[0]);

    $paths[] = get_template_directory_uri() . '/acf-json';

    return $paths;
}
add_filter('acf/settings/load_json', 'acf_json_load_point');

/**
 * Add ACF option page
 * 
 * @author weable team
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Cấu hình website',
		'menu_title'	=> 'Cấu hình website',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
        'icon_url' => 'dashicons-superhero-alt',
	));
	
}

/**
 * ACF blocks registant
 * 
 * @author weable team
 */
add_action('acf/init', 'tpa_acf_init_block_types');
function tpa_acf_init_block_types() {

    /**
     * Elements registant
     */
    if( function_exists('acf_register_block_type') ) {

        /**
         * [W-Elements] Section
         */
        acf_register_block_type( array(
            'name'              => 'w-element-container',
            'title'             => __('[W-Elements] Section'),
            'description'       => __('Element "Section"'),
            'render_template'   => 'template-parts/blocks/elements/w-element-container.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'preview',
            'align'             => 'full',
            'keywords'          => array( '[W-Elements] Section', 'acf' ),
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
        ));
    }

    /**
     * Blocks registant
     */
    if( function_exists('acf_register_block_type') ) {

        /** 
         * [W-Section] Banner Hero
         */
        acf_register_block_type(array(
            'name'              => 'banner-hero',
            'title'             => __('[W-Section] Banner Hero'),
            'description'       => __('Slider'),
            'render_template'   => 'template-parts/blocks/sections/banner-hero.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Banner Hero', 'acf' ),
        ));

        /** 
         * [W-Section] Project Items
         */
        acf_register_block_type(array(
            'name'              => 'project-items',
            'title'             => __('[W-Section] Project Items'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/project-items.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Project Items', 'acf' ),
        ));
        
        /** 
         * [W-Section] Introduction
         */
        acf_register_block_type(array(
            'name'              => 'intro',
            'title'             => __('[W-Section] Introduction'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-introduction.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Introduction', 'acf' ),
        ));

        /** 
         * [W-Section] Tab Service
         */
        acf_register_block_type(array(
            'name'              => 'tabService',
            'title'             => __('[W-Section] Tab Service'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-tab-service.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Tab Service', 'acf' ),
        ));

         /** 
         * [W-Section] Archievement
         */
        acf_register_block_type(array(
            'name'              => 'archievement',
            'title'             => __('[W-Section] Archievement'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-archievement.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Archievement', 'acf' ),
        ));

        /** 
         * [W-Section] Textbox Image
         */
        acf_register_block_type(array(
            'name'              => 'textbox-image',
            'title'             => __('[W-Section] Textbox Image'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/textbox-image.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Textbox Image', 'acf' ),
        ));
        /** 
         * [W-Section] Testimonals Slider
         */
        acf_register_block_type(array(
            'name'              => 'testimonals-slider',
            'title'             => __('[W-Section] Testimonals Slider'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-testimonals-slider.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Testimonals Slider', 'acf' ),
        ));
        /** 
         * [W-Section] Posts
         */
        acf_register_block_type(array(
            'name'              => 'posts',
            'title'             => __('[W-Section] Posts'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-posts.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Posts', 'acf' ),
        ));
         /** 
         * [W-Section] FAQ W CTA
         */
        acf_register_block_type(array(
            'name'              => 'faqwcta',
            'title'             => __('[W-Section] FAQ W CTA'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-faqs-cta.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] FAQ W CTA', 'acf' ),
        ));
         /** 
         * [W-Section] Page Header V1
         */
        acf_register_block_type(array(
            'name'              => 'pageheaderv1',
            'title'             => __(' [W-Section] Page Header V1'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/page-header-v1.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Page Header V1', 'acf' ),
        ));
          /** 
         * [W-Section] List Image Partner
         */
        acf_register_block_type(array(
            'name'              => 'listImagePartner',
            'title'             => __(' [W-Section] List Image Partner'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-listpartnerImg.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] List Image Partner', 'acf' ),
        ));
          /** 
         * [W-Section] Why We Can
         */
        acf_register_block_type(array(
            'name'              => 'wwc',
            'title'             => __(' [W-Section] Why We Can'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-WhyWeCan.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Why We Can', 'acf' ),
        ));
          /** 
         * [W-Section] Difficulties
         */
        acf_register_block_type(array(
            'name'              => 'diff',
            'title'             => __(' [W-Section] Difficulties'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-difficulties.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Difficulties', 'acf' ),
        ));
          /** 
         * [W-Section] Contact
         */
        acf_register_block_type(array(
            'name'              => 'contact',
            'title'             => __(' [W-Section] Contact'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-formContact.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Contact', 'acf' ),
        ));
         /** 
         * [W-Section] Package Service
         */
        acf_register_block_type(array(
            'name'              => 'packageService',
            'title'             => __(' [W-Section] Package Service'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-packageService.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Package Service', 'acf' ),
        ));
         /** 
         * [W-Section] Process
         */
        acf_register_block_type(array(
            'name'              => 'process',
            'title'             => __(' [W-Section] Process'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-process.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Process', 'acf' ),
        ));
        /** 
         * [W-Section] Member SLider
         */
        acf_register_block_type(array(
            'name'              => 'memberSlider',
            'title'             => __(' [W-Section] Member SLider'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-memberSlider.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Member SLider', 'acf' ),
        ));
         /** 
         * [W-Section] Contact Us
         */
        acf_register_block_type(array(
            'name'              => 'contactUs',
            'title'             => __(' [W-Section] Contact Us'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-contactUs.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Contact Us', 'acf' ),
        ));
         /** 
         * [W-Section] Page Header V2
         */
        acf_register_block_type(array(
            'name'              => 'pageheaderv2',
            'title'             => __(' [W-Section] Page Header V2'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/page-header-v2.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Page Header V2', 'acf' ),
        ));

        /** 
         * [W-Section] Quote
         */
        acf_register_block_type(array(
            'name'              => 'quote',
            'title'             => __(' [W-Section] Quote'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-quote.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Quote', 'acf' ),
        ));

        /** 
         * [W-Section] helper
         */
        acf_register_block_type(array(
            'name'              => 'helper',
            'title'             => __(' [W-Section] helper'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-helper.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] helper', 'acf' ),
        ));
        /** 
         * [W-Section] Drop W Image
         */
        acf_register_block_type(array(
            'name'              => 'dwi',
            'title'             => __(' [W-Section] Drop W Image'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-dropWimage.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Drop W Image', 'acf' ),
        ));

         

        
         /** 
         * [W-Section] Project Slider
         */
        acf_register_block_type(array(
            'name'              => 'projectSlider',
            'title'             => __(' [W-Section] Project Slider'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-projectSlider.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Project Slider', 'acf' ),
        ));

          /** 
         * [W-Section] Feedback
         */
        acf_register_block_type(array(
            'name'              => 'feedback',
            'title'             => __(' [W-Section] Feedback'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/feedback.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Feedback', 'acf' ),
        ));

           /** 
         * [W-Section] Box Service
         */
        acf_register_block_type(array(
            'name'              => 'box-service',
            'title'             => __(' [W-Section] Box Service'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/box-service.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Box Service', 'acf' ),
        ));

           /** 
         * [W-Section] Get In Touch
         */
        acf_register_block_type(array(
            'name'              => 'get-in-touch',
            'title'             => __(' [W-Section] Get In Touch'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/get-in-touch.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Get In Touch', 'acf' ),
        ));

           /** 
         * [W-Section] List Item
         */
        acf_register_block_type(array(
            'name'              => 'listItem',
            'title'             => __(' [W-Section] List Item'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/listItem.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] List Item', 'acf' ),
        ));

           /** 
         * [W-Section] Member
         */
        acf_register_block_type(array(
            'name'              => 'member',
            'title'             => __(' [W-Section] Member'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/member.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Member', 'acf' ),
        ));

           /** 
         * [W-Section] Page Header V3
         */
        acf_register_block_type(array(
            'name'              => 'page-header-v3',
            'title'             => __(' [W-Section] Page Header V3'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/page-header-v3.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Page Header V3', 'acf' ),
        ));

         /** 
         * [W-Section] Page Header V4
         */
        acf_register_block_type(array(
            'name'              => 'page-header-v4',
            'title'             => __(' [W-Section] Page Header V4'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/page-header-v4.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Page Header V4', 'acf' ),
        ));

         /** 
         * [W-Section] Slider Run
         */
        acf_register_block_type(array(
            'name'              => 'slider-run',
            'title'             => __(' [W-Section] Slider Run'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/slider-run.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Slider Run', 'acf' ),
        ));

         /** 
         * [W-Section] Slider
         */
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __(' [W-Section] Slider'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/slider.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Slider', 'acf' ),
        ));

         /** 
         * [W-Section] Special Design
         */
        acf_register_block_type(array(
            'name'              => 'special-design',
            'title'             => __(' [W-Section] Special Design'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/special-design.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Special Design', 'acf' ),
        ));


         /** 
         * [W-Section] Tab Image
         */
        acf_register_block_type(array(
            'name'              => 'tabImage',
            'title'             => __(' [W-Section] Tab Image'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/tabImage.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Tab Image', 'acf' ),
        ));

         /** 
         * [W-Section] Timeline
         */
        acf_register_block_type(array(
            'name'              => 'time-line',
            'title'             => __(' [W-Section] Timeline'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/time-line.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Timeline', 'acf' ),
        ));

        /** 
         * [W-Section] Image Text
         */
        acf_register_block_type(array(
            'name'              => 'imageText',
            'title'             => __(' [W-Section] Image Text'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-imageText.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Image Text', 'acf' ),
        ));

        /** 
         * [W-Section] Missions
         */
        acf_register_block_type(array(
            'name'              => 'missions',
            'title'             => __(' [W-Section] Missions'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-missions.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Missions', 'acf' ),
        ));

        /** 
         * [W-Section] Stage
         */
        acf_register_block_type(array(
            'name'              => 'stage',
            'title'             => __(' [W-Section] Stage'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-stage.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Stage', 'acf' ),
        ));

        /** 
         * [W-Section] Gallery
         */
        acf_register_block_type(array(
            'name'              => 'gallery',
            'title'             => __(' [W-Section] Gallery'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-gallery.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Gallery', 'acf' ),
        ));

        /** 
         * [W-Section] Link Hiring
         */
        acf_register_block_type(array(
            'name'              => 'linkhiring',
            'title'             => __(' [W-Section] Link Hiring'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-linkhiring.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Link Hiring', 'acf' ),
        ));

        /** 
         * [W-Section] Values
         */
        acf_register_block_type(array(
            'name'              => 'values',
            'title'             => __(' [W-Section] Values'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-values.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Values', 'acf' ),
        )); 

        /** 
         * [W-Section] About Project
         */
        acf_register_block_type(array(
            'name'              => 'abproject',
            'title'             => __(' [W-Section] About Project'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-abproject.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] About Project', 'acf' ),
        ));


        /** 
         * [W-Section] Image Text Revert
         */
        acf_register_block_type(array(
            'name'              => 'imgtextrev',
            'title'             => __(' [W-Section] Image Text Revert'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/w-imgtextrev.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Image Text Revert', 'acf' ),
        ));

         /** 
         * [W-Section] Campaign
         */
        acf_register_block_type(array(
            'name'              => 'campaign',
            'title'             => __(' [W-Section] Campaign'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/campaign.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Campaign', 'acf' ),
        ));

         /** 
         * [W-Section] Page Header v5
         */
        acf_register_block_type(array(
            'name'              => 'page-header-v5',
            'title'             => __(' [W-Section] Page Header v5'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/page-header-v5.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Page Header v5', 'acf' ),
        ));

         /** 
         * [W-Section] Simple
         */
        acf_register_block_type(array(
            'name'              => 'simple',
            'title'             => __(' [W-Section] Simple'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/simple.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Simple', 'acf' ),
        ));

         /** 
         * [W-Section] Tab Ads
         */
        acf_register_block_type(array(
            'name'              => 'tab-ads',
            'title'             => __(' [W-Section] Tab Ads'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/tab-ads.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Tab Ads', 'acf' ),
        ));

         /** 
         * [W-Section] What You Need
         */
        acf_register_block_type(array(
            'name'              => 'whatyouneed',
            'title'             => __(' [W-Section] What You Need'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/whatyouneed.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] What You Need', 'acf' ),
        ));

        
         /** 
         * [W-Section] Page Header Image
         */
        acf_register_block_type(array(
            'name'              => 'page-header-image',
            'title'             => __(' [W-Section] Page Header Image'),
            'description'       => __('Show dự án'),
            'render_template'   => 'template-parts/blocks/sections/page-header-image.php',
            'category'          => 'formatting',
            'icon'              => 'block-default',
            'mode'              => 'edit',
            'align'             => 'full',
            'keywords'          => array( '[W-Section] Page Header Image', 'acf' ),
        ));
    }

    
}