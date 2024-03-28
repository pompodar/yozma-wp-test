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
			'title' => 'Articles',
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
			'key' => \LTC\AcfBlocks()->generate_group_name('Mental Wellbeing Articles'),
			'title' => 'Mental Wellbeing Articles',
			'fields' => [
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Id'),
					'label' => 'Id',
					'name' => 'id',
					'type' => 'text',
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
							'key' => \LTC\AcfBlocks()->generate_field_name('Button One Text'),
							'label' => 'Button One Text',
							'name' => 'button_one_text',
							'type' => 'text',
						],
						[
							'key' => \LTC\AcfBlocks()->generate_field_name('Button One Link'),
							'label' => 'Button One Link',
							'name' => 'button_one_link',
							'type' => 'link',
						],
						[
							'key' => \LTC\AcfBlocks()->generate_field_name('Button Two Text'),
							'label' => 'Button Two Text',
							'name' => 'button_two_text',
							'type' => 'text',
						],
						[
							'key' => \LTC\AcfBlocks()->generate_field_name('Button Two Link'),
							'label' => 'Button Two Link',
							'name' => 'button_two_link',
							'type' => 'link',
						],
					]
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
			'description' => 'Mental Wellbeing Articles',
		]);
	}
};