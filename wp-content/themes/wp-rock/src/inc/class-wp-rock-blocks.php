<?php
/**
 *  Custom ACF Gutenberg blocks.
 *
 *  @package WP-rock
 *  @since 4.4.0
 */

/**
 * Registering ACF blocks.
 */
class WP_Rock_Blocks {

    /**
     * Array with blocks defining.
     *
     * @var array|array[]
     */
    protected array $blocks = array(
        'custom-classic' => array(
            'title' => 'Custom classic block',
            'description' => '',
            'template' => 'src/template-parts/block-custom-classic.php',
            'post_types' => array( 'post', 'page' ),
        ),
        'hero' => array(
            'title' => 'Hero block',
            'description' => '',
            'template' => 'src/template-parts/block-hero.php',
            'post_types' => array( 'post', 'page' ),
        ),
    );
    /**
     * List of Allowed blocks
     * core/freeform  - it's standard WYSIWYG.
     *
     * @var string[]
     */
    protected array $allowed = array( 'core/freeform' );


    /**
     *  Construct of the class
     */
    public function __construct() {
         add_action( 'init', array( $this, 'add_custom_blocks' ) );
        add_filter( 'allowed_block_types_all', array( $this, 'filter_allowed_blocks' ), 10, 2 );
    }

    /**
     * Function for `allowed_block_types_all` filter-hook.
     *
     * @param bool|string[]           $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
     * @param WP_Block_Editor_Context $editor_context      The current block editor context.
     *
     * @return bool|string[]
     */
    public function filter_allowed_blocks( array|bool $allowed_block_types, WP_Block_Editor_Context $editor_context ): array|bool {

        if ( ! empty( $editor_context->post ) ) {
            $allowed = array_map( array( $this, 'add_prefix' ), array_keys( $this->blocks ) );

            if ( ! empty( $this->allowed ) ) {
                foreach ( $this->allowed as $block ) {
                    $allowed[] = $block;
                }
            }

            return $allowed;
        }
        return $allowed_block_types;
    }

    /**
     * Just adding prefix to blocks.
     *
     * @param string $value  - name of block.
     * @return string
     */
    public function add_prefix( string $value ) : string {
        return 'acf/' . $value;
    }

    /**
     * Final registration blocks
     *
     * @return void
     */
    public function add_custom_blocks(): void {
        if ( function_exists( 'acf_register_block_type' ) ) {
            foreach ( $this->blocks as $id => $block ) {

                $title = $block['title'];
                $description = $block['description'];

                $args = array(
                    'name'              => $id,
                    'title'             => __( $title, 'headless_wp' ),
                    'description'       => __( $description, 'headless_wp' ),
                    'render_template'   => $block['template'],
                    'category'          => 'layout',
                    'example'            => array(
                        'attributes' => array(
                            'data' => array( 'is_example' => true ),
                        ),
                    ),

                );
                if ( array_key_exists( 'post_types', $block ) ) {
                    $args['post_types'] = $block['post_types'];
                }

                acf_register_block_type( $args );
            }
        }
    }
}

new WP_Rock_Blocks();
