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
            'key' => \LTC\AcfBlocks()->generate_group_name('Events'),
            'title' => 'Events',
            'fields' => [
                [
                    'key' => \LTC\AcfBlocks()->generate_field_name('Id'),
                    'label' => 'Id',
                    'name' => 'id',
                    'type' => 'text',
                ],
                [
                    'key' => \LTC\AcfBlocks()->generate_field_name('Posts Count'),
                    'label' => 'Posts Count',
                    'name' => 'posts_count',
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
                    'type' => 'text',
                ],
                [
                    'key' => \LTC\AcfBlocks()->generate_field_name('Categories'),
                    'label' => 'Categories',
                    'name' => 'categories',
                    'type' => 'taxonomy',
                    'taxonomy' => 'category', // Change 'tags' to 'category'
                    'field_type' => 'select',
                    'multiple' => true,
                    'ui' => true,
                    'ajax' => true,
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
            'description' => 'Events',
        ]);
    }

    /**
     * Function to fetch category choices dynamically.
     */
    function get_categories_choices() {
        $categories = get_categories(); // Retrieve categories instead of tags
        $choices = [];

        foreach ($categories as $category) {
            $choices[$category->term_id] = $category->name;
        }

        return $choices;
    }
};