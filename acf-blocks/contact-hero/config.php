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
			'key' => \LTC\AcfBlocks()->generate_group_name('Contact Hero'),
			'title' => 'Contact Hero',
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
					'key' => \LTC\AcfBlocks()->generate_field_name('Button One Link Type'),
					'label' => 'Button One Link Type',
					'name' => 'button_one_link_type', 
					'type' => 'radio', 
					'choices' => [
						'' => 'Internal',
						'_blank' => 'External',
				    ],
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
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Button Two Link Type'),
					'label' => 'Button Two Link Type',
					'name' => 'button_two_link_type', 
					'type' => 'radio', 
					'choices' => [
						'' => 'Internal',
						'_blank' => 'External',
				    ],
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Image'),
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
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
			'description' => 'Volunteer Hero',
		]);
	}
};