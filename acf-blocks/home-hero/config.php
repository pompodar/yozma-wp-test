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
			'title' => 'Main Hero',
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
			'key' => \LTC\AcfBlocks()->generate_group_name('Home Hero'),
			'title' => 'Home Hero',
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
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Paragraph'),
					'label' => 'Card One Paragraph',
					'name' => 'card_one_paragraph',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Button Text'),
					'label' => 'Card One Button Text',
					'name' => 'card_one_button_text',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Button Link'),
					'label' => 'Card One Button Link',
					'name' => 'card_one_button_link',
					'type' => 'link',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Button Link Type'),
					'label' => 'Card One Button Link Type',
					'name' => 'card_one_button_link_type', 
					'type' => 'radio', 
					'choices' => [
						'' => 'Internal',
						'_blank' => 'External',
				],
			],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card Two Heading'),
					'label' => 'Card Two Heading',
					'name' => 'card_two_heading',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card Two paragraph'),
					'label' => 'Card Two paragraph',
					'name' => 'card_two_paragraph',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card Two Button Text'),
					'label' => 'Card Two Button Text',
					'name' => 'card_two_button_text',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card Two Button Lin'),
					'label' => 'Card Two Button Link',
					'name' => 'card_two_button_link',
					'type' => 'link',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card Two Button Link Type'),
					'label' => 'Card Two Button Link Type',
					'name' => 'card_two_button_link_type', 
					'type' => 'radio', 
					'choices' => [
						'' => 'Internal',
						'_blank' => 'External',
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
			'description' => 'Home Hero',
		]);
	}
};