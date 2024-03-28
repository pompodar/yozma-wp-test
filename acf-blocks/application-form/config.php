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
			'key' => \LTC\AcfBlocks()->generate_group_name('Articles Video'),
			'title' => 'Articles Video',
			'fields' => [
				[
					'key' => \LTC\AcfBlocks()->generate_field_name('Id'),
					'label' => 'Id',
					'name' => 'id',
					'type' => 'text',
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
			'description' => 'Articles Video',
		]);
	}
};