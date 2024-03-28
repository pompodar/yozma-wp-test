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
			'key' => \LTC\AcfBlocks()->generate_group_name('Contact Cards'),
			'title' => 'Contact Cards',
			'fields' => [
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Id'),
					'label' => 'Id',
					'name' => 'id',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Heading'),
					'label' => 'Card One Heading',
					'name' => 'card_one_heading',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Paragraph'),
					'label' => 'Card One paragraph',
					'name' => 'card_one_paragraph',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Image'),
					'label' => 'Card One image',
					'name' => 'card_one_image',
					'type' => 'image',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Button Text'),
					'label' => 'Card One button text',
					'name' => 'card_one_button_text',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card One Button Link'),
					'label' => 'Card One Button link',
					'name' => 'card_one_button_link',
					'type' => 'link',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card Two Heading'),
					'label' => 'Card Two Heading',
					'name' => 'card_two_heading',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card Two Paragraph'),
					'label' => 'Card Two paragraph',
					'name' => 'card_two_paragraph',
					'type' => 'wysiwyg',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card Two Image'),
					'label' => 'Card Two image',
					'name' => 'card_two_image',
					'type' => 'image',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card Two Button Text'),
					'label' => 'Card Two button text',
					'name' => 'card_two_button_text',
					'type' => 'text',
				],
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Card Two Button Link'),
					'label' => 'Card Two Button link',
					'name' => 'card_two_button_link',
					'type' => 'link',
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
			'description' => 'Articles Cards',
		]);
	}
};