<?php

function register_fields()
{
    acf_add_local_field_group([
        'key' => LTC\AcfBlocks()->generate_group_name('Global Settings'),
        'title' => 'Global Settings',
        'fields' => [
            [
                'key' => LTC\AcfBlocks()->generate_field_name('logo_pics'),
                'label' => 'Logo Pics',
                'type' => 'tab', 
            ],
            
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Mobile Logo'),
                'label' => 'Mobile Logo',
                'name' => 'mobile_logo',
                'type' => 'image',
                'parent' => LTC\AcfBlocks()->generate_field_name('contact_info_tab'), // Assign the field to the 'Contact Info' tab

            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Footer Logo'),
                'label' => 'Footer Logo',
                'name' => 'footer_logo',
                'type' => 'image'
            ],
                        [
                'key' => LTC\AcfBlocks()->generate_field_name('contact_info_tab'),
                'label' => 'Contact Info',
                'type' => 'tab',
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Address Top'),
                'label' => 'Address Top',
                'name' => 'address_top',
                'type' => 'text',
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Address Bottom'),
                'label' => 'Address Bottom',
                'name' => 'address_bottom',
                'type' => 'text',
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Phone Number'),
                'label' => 'Phone Number',
                'name' => 'phone_number',
                'type' => 'text',
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Email'),
                'label' => 'Email',
                'name' => 'email',
                'type' => 'text',
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Twitter Link'),
                'label' => 'Twitter Link',
                'name' => 'twitter_link',
                'type' => 'link',
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Instagram Link'),
                'label' => 'Instagram Link',
                'name' => 'instagram_link',
                'type' => 'link',
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Facebook Link'),
                'label' => 'Facebook Link Link',
                'name' => 'facebook_link',
                'type' => 'link',
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Linkedin Link'),
                'label' => 'Linkedin Link',
                'name' => 'linkedin_link',
                'type' => 'link',
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('pages_info_tab'),
                'label' => 'Pages Info',
                'type' => 'tab', 
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Privacy Policy'),
                'label' => 'Privacy Policy Link',
                'name' => 'privacy_policy',
                'type' => 'link',

            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Cookie Policy'),
                'label' => 'Cookie Policy Link',
                'name' => 'cookie_policy',
                'type' => 'link'
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Code of Conduct Policy'),
                'label' => 'Code of Conduct Policy',
                'name' => 'code_of_conduct_policy',
                'type' => 'link'
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('banner_info_tab'),
                'label' => 'Banner Info',
                'type' => 'tab',
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Banner Enabled'),
                'label' => 'Banner Enabled',
                'name' => 'banner_enabled',
                'type' => 'select',
                'choices' => [
                'yes'    => 'Yes',
                'no'  => 'No',
                ],
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Banner Text'),
                'label' => 'Banner Text',
                'name' => 'banner_text',
                'type' => 'text'
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Banner Button One Text'),
                'label' => 'Banner Button One Text',
                'name' => 'banner_button_one_text',
                'type' => 'text'
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Banner Button One Link'),
                'label' => 'Banner Button One Link',
                'name' => 'banner_button_one_link',
                'type' => 'link'
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Banner Button Two Text'),
                'label' => 'Banner Button Two Text',
                'name' => 'banner_button_two_text',
                'type' => 'text'
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('Banner Button Two Link'),
                'label' => 'Banner Button Two Link',
                'name' => 'banner_button_two_link',
                'type' => 'link'
            ],
            [
                'key' => LTC\AcfBlocks()->generate_field_name('reach_out_block_tab'),
                'label' => 'Reach Out Block Info',
                'type' => 'tab',
            ],
            [
					'key' => \LTC\AcfBlocks()->generate_field_name('Reach Out Id'),
					'label' => 'Reach Out Id',
					'name' => 'reach_out_id',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Reach Out Heading'),
					'label' => 'Reach Out Heading',
					'name' => 'reach_out_heading',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Reach Out Background'),
					'label' => 'Reach Out Background',
					'name' => 'reach_out_background',
					'type' => 'image',
				],
                [
                'key' => LTC\AcfBlocks()->generate_field_name('how_we_can_help_you_block_tab'),
                'label' => 'How We Can Help You Block Info',
                'type' => 'tab',
            ],
            [
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Id'),
					'label' => 'How We Can Help You Block Id',
					'name' => 'how_we_can_help_you_block_id',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Heading'),
					'label' => 'How We Can Help You Block Heading',
					'name' => 'how_we_can_help_you_block_heading',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Paragraph'),
					'label' => 'How We Can Help You Block Paragraph',
					'name' => 'paragraph',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card One Heading'),
					'label' => 'How We Can Help You Block Card One Heading',
					'name' => 'how_we_can_help_you_block_card_one_heading',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card One Background'),
					'label' => 'How We Can Help You Block Card One Background',
					'name' => 'how_we_can_help_you_block_card_one_background',
					'type' => 'image',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card One Paragraph'),
					'label' => 'How We Can Help You Block Card One Paragraph',
					'name' => 'how_we_can_help_you_block_card_one_paragraph',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card One Button Text'),
					'label' => 'How We Can Help You Block Card One Button Text',
					'name' => 'how_we_can_help_you_block_card_one_button_text',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card One Button Link'),
					'label' => 'How We Can Help You Block Card One Button Link',
					'name' => 'how_we_can_help_you_block_card_one_button_link',
					'type' => 'link',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card Two Heading'),
					'label' => 'How We Can Help You Block Card Two Heading',
					'name' => 'how_we_can_help_you_block_card_two_heading',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card Teo Background'),
					'label' => 'How We Can Help You Block Card Two Background',
					'name' => 'how_we_can_help_you_block_card_two_background',
					'type' => 'image',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card Two paragraph'),
					'label' => 'How We Can Help You Block Card Two paragraph',
					'name' => 'how_we_can_help_you_block_card_two_paragraph',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card Two Button Text'),
					'label' => 'How We Can Help You Block Card Two Button Text',
					'name' => 'how_we_can_help_you_block_card_two_button_text',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card Two Button Lin'),
					'label' => 'How We Can Help You Block Card Two Button Link',
					'name' => 'how_we_can_help_you_block_card_two_button_link',
					'type' => 'link',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card Three Heading'),
					'label' => 'How We Can Help You Block Card Three Heading',
					'name' => 'how_we_can_help_you_block_card_three_heading',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card Three Background'),
					'label' => 'How We Can Help You Block Card Three Background',
					'name' => 'how_we_can_help_you_block_card_three_background',
					'type' => 'image',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card Three paragraph'),
					'label' => 'How We Can Help You Block Card Three paragraph',
					'name' => 'how_we_can_help_you_block_card_three_paragraph',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card Three Button Text'),
					'label' => 'How We Can Help You Block Card Three Button Text',
					'name' => 'how_we_can_help_you_block_card_three_button_text',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('How We Can Help You Block Card Three Button Lin'),
					'label' => 'How We Can Help You Block Card Three Button Link',
					'name' => 'how_we_can_help_you_block_card_three_button_link',
					'type' => 'link',
				],
                [
                'key' => LTC\AcfBlocks()->generate_field_name('posts_tab'),
                'label' => 'Posts Info',
                'type' => 'tab',
                 ],
                 [
					'key' => \LTC\AcfBlocks()->generate_field_name('Post Button Text'),
					'label' => 'Post Button Text',
					'name' => 'post_button_text',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Post Button Lin'),
					'label' => 'Post Button Link',
					'name' => 'post_button_link',
					'type' => 'link',
				],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'site_options',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'Global Settings',
    ]);
}

register_fields();