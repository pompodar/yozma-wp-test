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
        'title' => 'Latest News',
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
            'key' => \LTC\AcfBlocks()->generate_group_name('Home News'),
            'title' => 'Home News',
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
                    'key' => \LTC\AcfBlocks()->generate_field_name('Tags'),
                    'label' => 'Tags',
                    'name' => 'tags',
                    'type' => 'select',
                    'choices' => $this->get_tags_choices(), 
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
            'description' => 'Home Hero',
        ]);
    }

    /**
     * Function to fetch tag choices dynamically.
     */
    function get_tags_choices() {
        $tags = get_tags(); 
        $choices = [];

        foreach ($tags as $tag) {
            $choices[$tag->term_id] = $tag->name;
        }

        return $choices;
    }
};