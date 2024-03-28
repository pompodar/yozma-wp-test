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
			'key' => \LTC\AcfBlocks()->generate_group_name('Get Help Hero'),
			'title' => 'Get Help Hero',
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
					'key' => \LTC\AcfBlocks()->generate_field_name('Button Text'),
					'label' => 'Button Text',
					'name' => 'button_text',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Button Link'),
					'label' => 'Button Link',
					'name' => 'button_link',
					'type' => 'link',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Button Link Type'),
					'label' => 'Button Link Type',
					'name' => 'button_link_type', 
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
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Heading'),
					'label' => 'Card One Heading',
					'name' => 'card_one_heading',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Button Text'),
					'label' => 'Card One Button Text',
					'name' => 'card_one_button_text',
					'type' => 'text',
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
			'description' => 'Get Help Hero',
		]);
	}
};