<?php
namespace LTC;

if (!in_array('advanced-custom-fields-pro/acf.php', get_option( 'active_plugins'))) {
    return;
}

class AcfBlocks
{

    /**
     * The single instance of the class.
     */
    protected static $_instance = null;


    /**
     * Directory where blocks reside
     */
    private $blocks_directory = '/acf-blocks';


    /**
     * Block instances
     */
    protected $_block_instances = [];


    /**
     * Default block config
     */
    private $default_config = [
        'mode' => 'edit',
        'supports' => [
            'align' => false,
            'html' => false,
        ]
    ];


    /**
     * Default block config
     */
    private $allowed_blocks = [		'core/block', 'core/post-content', 'core/post-excerpt', 'core/post-featured-image', 'core/heading', 'core/paragraph', 'core/image',];


    /**
     * Store loaded block info
     */
    private $loaded_blocks = [];


    /**
     * Ensures only one instance of `AcfBlocks` is loaded or can be loaded.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    /**
     * Get blocks dir
     */
    public function get_blocks_dir()
    {
        return get_template_directory() . $this->blocks_directory;
    }


    /**
     * Default block category
     */
    public function get_default_block_category()
    {
        return sanitize_title(wp_get_theme());
    }


    /**
     * When `AcfBlocks` instantiated execute first
     */
    public function init()
    {

        // disable gutenberg patterns
        remove_theme_support('core-block-patterns');

        // setup categories
        $this->setup_categories();

        // load blocks
        $this->load_blocks();

        // set allowed blocks
        $this->set_allowed_blocks();

        // enqueue backend styles
        $this->enqueue_backend_styles();

        // hook listeners
        $this->listeners();

    }


    /**
     * Setup category for theme blocks
     */
    function setup_categories()
    {
        add_filter('block_categories_all', function ($categories) {
            return array_merge($categories, [['slug' => $this->get_default_block_category(), 'title' => $this->get_default_block_category()]]);
        }, 10, 2);
    }


    /**
     * Load blocks
     */
    function load_blocks()
    {

        // find blocks in directory
        $blocks = glob($this->get_blocks_dir() . '/*', GLOB_ONLYDIR);

        foreach ($blocks as $block) {

            // block dir
            $block_dir = basename($block);

            // block path variable
            $block_path = $this->get_blocks_dir() . '/' . $block_dir;

            // store a list of loaded blocks
            $this->loaded_blocks[$block_dir] = ['block_path' => $block_path, 'block_name' => $block_dir];

            // load in block config
            require_once($block_path . '/config.php');

            // store instance of block class
            $this->_block_instances[$block_dir] = $config;

            // register block
            $this->register_block($block_path, $config->config());

        }

    }


    /**
     * Get block functions
     */
    public function f($block)
    {
        return (isset($this->_block_instances[$block]) ? $this->_block_instances[$block] : false);
    }


    /**
     * Get block information
     */
    function get_block_info()
    {

        // start with our block info
        $info = end($this->loaded_blocks);


        // add acf's info about the block
        // Validate ajax request.
        if (acf_verify_ajax()) {

            // Get request args.
            extract(acf_request_args(array(
                'block' => false,
                'post_id' => 0,
                'query' => array(),
            )));

            // Unslash and decode $_POST data.
            if ($block) {
                $block = wp_unslash($block);
                $block = json_decode($block, true);
                foreach ($block as $k => $v) {
                    $info[$k] = $v;
                }
            }

            // add post id to info
            if (isset($post_id)) {
                $info['post_id'] = $post_id;
            }

        }

        return $info;
    }


    /**
     * Return acf friendly group name string from passed input
     */
    function generate_group_name($group_name)
    {
        return 'group_block_' . strtolower(preg_replace('#[ -]+#', '_', $this->get_block_info()['block_name'] . '_' . $group_name));
    }


    /**
     * Return friendly acf field name string from passed input
     */
    function generate_field_name($field_name)
    {
        return 'field_block_' . strtolower(preg_replace('#[ -]+#', '_', $this->get_block_info()['block_name'] . '_' . $field_name));
    }


    /**
     * Get asset path
     */
    function get_asset_path($block_path, $type)
    {

        // get base dir
        $block_dir = basename($block_path);

        // switch get asset by type
        switch ($type) {
            case 'styles':
                $path = $block_path . '/assets/styles/styles.scss';
                $dist_file = 'acf-blocks/' . $block_dir . '.css';
                break;
            case 'script':
                $path = $block_path . '/assets/scripts/script.js';
                $dist_file = 'acf-blocks/' . $block_dir . '.js';
                break;
        }

        // exit if file doesn't exist
        if (!file_exists($path)) {
            return;
        }

        // make asset have an absolute path
        $asset_path = get_asset_uri($dist_file);

        // return compiled asset url
        return $asset_path;
    }


    /**
     * Register block
     */
    function register_block($block_path, $config)
    {

        // set to use default config
        $reg_config = $this->default_config;

        // add category
        $reg_config['category'] = $this->get_default_block_category();

        // over-ride default config values
        foreach ($config as $k => $v) {
            $reg_config[$k] = $v;
        }

        // get block directory name
        $block_dir = basename($block_path);

        // set block name
        $reg_config['name'] = $block_dir;

        if ( !empty($config['title']) ) {
            $reg_config['title'] = $config['title'];
        }
    
        // if no title set then make a generic one
        if (empty($reg_config['title'])) {
            $reg_config['title'] = ucwords(str_replace('-', ' ', basename($block_path)));
        }

        // if exists enqueue styles
        $styles_path = $this->get_asset_path($block_path, 'styles');
        if (!is_admin() && $styles_path) {
            $reg_config['enqueue_style'] = $styles_path;
        }

        // if exists enqueue js
        $script_path = $this->get_asset_path($block_path, 'script');
        if (!is_admin() && $script_path) {
            $reg_config['enqueue_script'] = $script_path;
        }

        // render template
        $reg_config['render_template'] = $block_path . '/render.php';

        // add block name to allowed blocks
        $this->allowed_blocks[] = 'acf/' . $reg_config['name'];

        // register the block
        \acf_register_block_type($reg_config);
    }


    /**
     * Function to get fields from block by passing block id and post id
     */
    public function get_block_fields(int $post_id, string $select)
    {
        $post = get_post($post_id);
        if (!$post) {
            return;
        }

        $blocks = parse_blocks($post->post_content);
        $is_name = (substr($select, 0, 4) === 'acf/');

        foreach ($blocks as $block) {
            if (!isset($block['attrs']['id'])) {
                continue;
            }
            $select_type = ($is_name ? $block['attrs']['name'] : $block['attrs']['id']);
            if ($select_type == $select) {
                acf_setup_meta($block['attrs']['data'], $block['attrs']['id'], true);
                $fields = get_fields();
                acf_reset_meta($block['attrs']['id']);
                return $fields;
            }
        }
    }


    /**
     * Function to get field from block by passing either block name/block id, post id and field name
     */
    public function get_block_field(int $post_id, string $select, $field, $original_block = false)
    {
        if ($field) {
            $get_block_fields = $this->get_block_fields($post_id, $select);

            // reset acf data back to original block that called the this function if passed
            if ($original_block) {
                acf_setup_meta($original_block['data'], $original_block['id'], true);
            }

            if (isset($get_block_fields[$field])) {
                return $get_block_fields[$field];
            }
        }
    }


    /**
     * Function to set allowed blocks
     */
    private function set_allowed_blocks()
    {
        add_filter('allowed_block_types_all', function () {
            return $this->allowed_blocks;
        });
    }


    /**
     * Enqueue back-end styles
     */
    private function enqueue_backend_styles()
    {
        add_action('enqueue_block_editor_assets', function () {
            wp_enqueue_style('ud-gutenberg-styles', get_asset_uri('styles/backend.css'), false);
        });

    }


    /**
     * Hook listeners
     */
    private function listeners()
    {

        // if post is block content then extract excerpt from first paragraph block
        add_filter('get_the_excerpt', [$this, 'blocks_post_excerpt'], 10, 3);

    }


    /**
     * If post is block content then extract excerpt from first paragraph block
     */
    public function blocks_post_excerpt($post_excerpt, $post)
    {
        if($post_excerpt) {
            return $post_excerpt;
        }

        if (has_blocks($post->post_content)) {
            $blocks = parse_blocks($post->post_content);
            if (!empty($blocks)) {
                foreach ($blocks as $block) {
                    if (in_array($block['blockName'], ['core/paragraph', 'acf/paragraph'])) {
                        $html = (isset($block['attrs']['data']['paragraph']) ? $block['attrs']['data']['paragraph'] : $block['innerHTML']);
                        return wp_strip_all_tags($html);
                    }
                }
            }
        }

        return $post_excerpt;
    }
}


/**
 * Public function instantiating `AcfBlocks` class
 */
function AcfBlocks()
{
    return AcfBlocks::instance();
}


/**
 * Initializing initial boot-up functions
 */
AcfBlocks()->init();