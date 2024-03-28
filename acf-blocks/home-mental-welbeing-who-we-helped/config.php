<?php
$config = new class
{
	private array $info = [];

	/**
	 *  On class construction
	 */
	function __construct()
	{

			// store block information in local variable
			$this->store_block_info();

			// register fields
			$this->register_fields();
	}


	/**
	 *  Set config params for block
	 */
	public $config = [
			'icon' => 'cover-image',
			'title' =>  'Video Testimonials',
	];


	/**
	 *  Function to config params back to query
	 */
	public function config()
	{
			return $this->config;
	}


	/**
	 *  Store block information in local variable
	 */
	public function store_block_info()
	{
			$this->info = \LTC\AcfBlocks()->get_block_info();
	}


	/**
	 *  Register ACF fields
	 */
	public function register_fields()
	{
		acf_add_local_field_group([
			'key' => \LTC\AcfBlocks()->generate_group_name('Home Who We Helped'),
			'title' => 'Home Who We Helped',
			'fields' => [
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Id'),
					'label' => 'Id',
					'name' => 'id',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Heading'),
					'label' => 'Heading',
					'name' => 'heading',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Paragraph'),
					'label' => 'Paragraph',
					'name' => 'paragraph',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Background'),
					'label' => 'Background',
					'name' => 'background',
					'type' => 'image',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Items'),
					'label' => 'Items',
					'name' => 'items_repeater',
					'type' => 'repeater',
					'layout' => 'block',
					'button_label' => 'Add item',
					'sub_fields' => [
						[
							'key' => \LTC\AcfBlocks()->generate_field_name('Video'),
							'label' => 'Video',
							'name' => 'video',
							'type' => 'text',
						],
						[
							'key' => \LTC\AcfBlocks()->generate_field_name('Video Background'),
							'label' => 'Video Background',
							'name' => 'video_background',
							'type' => 'image',
						],
						[
							'key' => \LTC\AcfBlocks()->generate_field_name('Video Heading'),
							'label' => 'Video Heading',
							'name' => 'video_heading',
							'type' => 'text',
						],
						[
							'key' => \LTC\AcfBlocks()->generate_field_name('Video Paragraph'),
							'label' => 'Video Paragraph',
							'name' => 'video_paragraph',
							'type' => 'wysiwyg',
						],
						
					],
				],
			],
			'location' => [
				[
					[
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/' . $this->info['block_name'],
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
			'description' => 'Home Who We Helped',
		]);
	}
};