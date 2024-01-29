<?php

/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if (!function_exists('twentytwentyfour_block_styles')) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles()
	{

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __('Arrow icon', 'twentytwentyfour'),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __('Pill', 'twentytwentyfour'),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __('Checkmark', 'twentytwentyfour'),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __('With arrow', 'twentytwentyfour'),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __('With asterisk', 'twentytwentyfour'),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action('init', 'twentytwentyfour_block_styles');

/**
 * Enqueue block stylesheets.
 */

if (!function_exists('twentytwentyfour_block_stylesheets')) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets()
	{
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri('assets/css/button-outline.css'),
				'ver'    => wp_get_theme(get_template())->get('Version'),
				'path'   => get_parent_theme_file_path('assets/css/button-outline.css'),
			)
		);
	}
endif;

add_action('init', 'twentytwentyfour_block_stylesheets');

/**
 * Register pattern categories.
 */

if (!function_exists('twentytwentyfour_pattern_categories')) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories()
	{

		register_block_pattern_category(
			'page',
			array(
				'label'       => _x('Pages', 'Block pattern category'),
				'description' => __('A collection of full page layouts.'),
			)
		);
	}
endif;

add_action('init', 'twentytwentyfour_pattern_categories');

// In a custom plugin on your local environment.
add_filter('wp_is_application_passwords_available', '__return_true');

add_action('wp_authorize_application_password_request_errors', function ($error) {
	$error->remove('invalid_redirect_scheme');
});

add_filter('https_ssl_verify', '__return_false');

/**
 * Auto unlink distributor posts automatically.
 *
 * Runs on the `dt_after_set_meta` hook.
 *
 * @param mixed $meta          All received meta for the post
 * @param mixed $existing_meta Existing meta for the post
 * @param mixed $post_id       Post ID
 * @return void
 */
function client_prefix_auto_unlink_distributed_posts($meta, $existing_meta, $post_id)
{
	$post = get_post($post_id);

	if (!$post) {
		return;
	}

	$is_distributed = get_post_meta($post->ID, 'dt_original_post_id', true) ? true : false;

	if (!$is_distributed) {
		return;
	}

	update_post_meta($post->ID, 'dt_unlinked', true);
}
add_action('dt_after_set_meta', 'client_prefix_auto_unlink_distributed_posts', 10, 3);

/**
 * Keep the publication date on the new pushed post.
 *
 * This filter is used to filter the arguments sent to the remote server during a push. The below code snippet passes the original published date to the new pushed post and sets the same published date instead of setting it as per the current time.
 */
/* add_filter( 'dt_pull_post_args', function( $post_body, $post ) {
    $post_body['post_date'] = $post->post_date;

	echo '<pre>';
	var_dump($post_body);
	echo '</pre>';

    return $post_body;
}, 10, 2 ); */

// ['terms']['category'][0]['name']


/* add_filter('dt_pull_post_args', function ($post_body, $post) {

    echo '<pre>';
    var_dump($post_body);
    echo '</pre>';

    return $post_body;
}, 10, 2);
 */
/* 
add_action('dt_pull_post', function ($post, $original_post, $external_connection) {
    // Check if 'post_terms' key is present in the received data
    if (isset($original_post['post_terms']['category']) && is_array($original_post['post_terms']['category'])) {
        // Map the original category slugs to new category slugs on the target site
        $category_mapping = array(
            'demo' => 'target',
            // Add more mappings as needed
        );

        // Get the original post ID on the target site (you might need to adjust this based on your data structure)
        $target_post_id = $post->ID;

        // Initialize an array to store the new category IDs
        $new_category_ids = array();

        // Map and update the categories
        foreach ($original_post['post_terms']['category'] as $original_category_slug) {
            // Check if there's a mapping for the original category
            if (isset($category_mapping[$original_category_slug])) {
                // Use object-oriented syntax to access the method or property
                $new_category_ids[] = $external_connection->someMethodToMapCategory($category_mapping[$original_category_slug]);
            } else {
                // If no mapping is found, use a default category or skip it
                // $new_category_ids[] = $external_connection->getDefaultCategory();
            }
        }

        // Update the post categories on the target site
        wp_set_post_terms($target_post_id, $new_category_ids, 'category');
    }
}, 10, 3);
 */

/* add_action('dt_pull_post', function ($post, $original_post, $external_connection) {
    // Check if 'post_terms' key is present in the received data
    if (isset($original_post['post_terms']['category']) && is_array($original_post['post_terms']['category'])) {
        // Map the original category slugs to new category slugs on the target site
        $category_mapping = array(
            'demo' => 'target',
            // Add more mappings as needed
        );

        // Get the original post ID on the target site (you might need to adjust this based on your data structure)
        $target_post_id = $post->ID;

        // Initialize an array to store the new category IDs
        $new_category_ids = array();

        // Get the original post data from the external connection
        $original_post_data = $external_connection->getOriginalPostData($original_post);

        // Map and update the categories
        foreach ($original_post_data['post_terms']['category'] as $original_category_slug) {
            // Check if there's a mapping for the original category
            if (isset($category_mapping[$original_category_slug])) {
                $new_category_ids[] = $category_mapping[$original_category_slug];
            } else {
                // If no mapping is found, use a default category or skip it
                // $new_category_ids[] = 'default_category';
            }
        }

        // Update the post categories on the target site
        wp_set_post_terms($target_post_id, $new_category_ids, 'category');
    }
}, 10, 3);
 */

/* add_filter('dt_post_to_pull', function ($post, $display_data) {

	echo '<pre>';
    var_dump($display_data);
    echo '</pre>';

	// wp_die();
	return $display_data;

}, 10, 2); */

/* add_filter('dt_pull_post_args', function ($post_array, $remote_id, $post) {

	// Check if there are category terms in the remote post data
	if (isset($post_array['terms']['category']) && is_array($post_array['terms']['category'])) {
		// Get the category term IDs from the remote post data
		$category_term_ids = array_map('intval', $post_array['terms']['category']);

		// Set the category terms for the pulled post
		wp_set_object_terms($post->ID, $category_term_ids, 'target');
	}

	// echo '<pre>';
	// var_dump($post_array);
	// echo '</pre>';

	// echo '<pre>';
	// var_dump($post);
	// echo '</pre>';

	return $post_array;
}, 10, 3); */

/* add_filter( 'dt_pull_post_args', function( $post_array, $remote_id, $post ) {
    // Other modifications you want to make...

    // Check if there are category terms in the remote post data
    if (isset($post_array['terms']['category']) && is_array($post_array['terms']['category'])) {
        // Get the category term IDs from the remote post data
        $category_term_ids = array_map('intval', $post_array['terms']['category']);

        // Use wp_insert_post_data action to set terms after the post is saved
        add_action('wp_insert_post_data', function ($data, $postarr) use ($category_term_ids) {
            // Check if this action is related to our post
            if ($postarr['ID'] == $data['ID']) {
                // Set the category terms for the pulled post
                wp_set_object_terms($postarr['ID'], $category_term_ids, 'target');
            }

            return $data;
        }, 10, 2);
    }

    // Other modifications you want to make...

	echo '<pre>';
	var_dump($post_array);
	echo '</pre>';

    return $post_array;
}, 10, 3 );
 */

/* add_filter('dt_post_to_pull', function ($display_data) {
    // Check if you want to proceed with setting terms

	echo '<pre>';
	var_dump($display_data);
	echo '</pre>';

    return $display_data;
}, 10, 6);
 */

/*     $post_array['post_date'] = $post->post_date;
    $post_array['post_date_gmt'] = $post->post_date_gmt; */
/* add_filter( 'dt_pull_post_terms', function( $new_post_id, $post_terms, $remote_post_id, $post_array ) {

	echo '<pre>';
	var_dump($post_terms);
	echo '</pre>';

    return $post_terms;
}, 10, 4 ); */


/* add_filter( 'dt_pull_post_args', function(  $post_array, $remote_post_id, $post ) {

	// $post_array['post_date'] = $post->post_date;
    // $post_array['post_date_gmt'] = $post->post_date_gmt;

	$new_cat_slug = 'target';
	$new_cat_id = 5;
	$new_cat_name = 'Target';

	$post_array['terms']['category'][0]['slug'] = $new_cat_slug;
	$post_array['terms']['category'][0]['term_id'] = $new_cat_id;
	$post_array['terms']['category'][0]['name'] = $new_cat_name;

	// echo '<pre>';
	// var_dump($post_array);
	// echo '</pre>';

    return $post_array;
}, 10, 3 ); */


/* add_filter('wp_insert_post_data', 'check_and_update_category', 10, 2);

function check_and_update_category($data, $postarr) {
    // Check if the post has the 'dt_original_post_id' meta key
    $original_post_id = get_post_meta($postarr['ID'], 'dt_original_post_id', true);

    // If the meta key is present, update the post category
    if ($original_post_id !== '') {
        // Get the new category ID for 'target'
        $target_category_id = get_cat_ID('target');

        // Update the post category in the modified data
        $data['post_category'] = array($target_category_id);

		
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
    }

    return $data;
}
 */

/**
 * This filters the the arguments passed into wp_insert_post during a pull
 */
/* add_filter( 'dt_pull_post_args', function( $post_array, $remote_id, $post ) {

	$post_new_cat = 'Target';
    $post_array['terms']['category'][0]['name'] = $post_new_cat;

	// foreach ($post_array as $k => $v) {
	// 	$array[$v['listing ID']] = $v;
	// 	unset($post_array[$k]);
	// }

	echo '<pre>';
	var_dump($post_array);
	echo '</pre>';

    return $post_array;
}, 10, 3 ); */

/* add_filter('dt_pull_post_args', 'check_and_update_category', 10, 2);

function check_and_update_category($data, $postarr) {
    // Check if the post has the 'dt_original_post_id' meta key
    $original_post_id = get_post_meta($postarr['ID'], 'dt_original_post_id', true);

    // If the meta key is present, update the post category
    if ($original_post_id !== '') {
        // Get the new category ID for 'target'
        $target_category_id = get_cat_ID('5');

        // Access the 'terms' array within the post data
        if (isset($data['terms']['category'][0])) {
            // Update the keys with new values
            $data['terms']['category'][0]['term_id'] = $target_category_id;
            $data['terms']['category'][0]['name'] = 'Target';
            $data['terms']['category'][0]['slug'] = 'target';
        }
    }

    return $data;
} */

/* add_filter('wp_insert_post_data', 'check_and_update_category', 10, 2);

function check_and_update_category($data, $postarr) {
    // Check if the post has the 'dt_original_post_id' meta key
    $original_post_id = get_post_meta($postarr['ID'], 'dt_original_post_id', true);

    // If the meta key is present, update the post category
    if ($original_post_id !== '') {
        // Get the new category ID for 'target'
        $target_category_id = get_cat_ID('target');

        // Access the 'terms' array within the post data
        if (isset($data['terms']['category'][0])) {
            // Update the keys with new values
            $data['terms']['category'][0]['term_id'] = $target_category_id;
            $data['terms']['category'][0]['name'] = 'Target';
            $data['terms']['category'][0]['slug'] = 'target';

            // Remove the 'category' key to prevent the default category assignment
            unset($data['category']);
        }
    }

    return $data;
}

add_action('save_post', 'update_category_after_post_save', 10, 2);

function update_category_after_post_save($post_id, $post) {
    // Check if the post has the 'dt_original_post_id' meta key
    $original_post_id = get_post_meta($post_id, 'dt_original_post_id', true);

    // If the meta key is present, update the post category
    if ($original_post_id !== '') {
        // Get the new category ID for 'target'
        $target_category_id = get_cat_ID('target');

        // Update the post category using wp_set_post_terms
        wp_set_post_terms($post_id, array($target_category_id), 'category', false);
    }
}

 */

/*  //Removing &amp; or any html special enitiy from name
function filter_post_name( $data, $postarr, $unsanitized_postarr){
    // $data['post_title'] = html_entity_decode($data['post_title']);

	echo '<pre>';
	var_dump( $postarr );
	echo '</pre>';

    return $postarr;
}

add_filter( 'wp_insert_post_data', 'filter_post_name',10,3); */

/* add_filter('wp_insert_post_data', 'update_post_category', 10, 4);

function update_post_category($data, $postarr, $unsanitized_postarr, $update) {
    // Check if this is an update and if the post has the 'source' category
    if ($update) {
        $source_category = get_cat_ID('demo');
        $post_categories = wp_get_post_categories($postarr['ID']);

        if (in_array($source_category, $post_categories)) {
            // Change the post category to 'target'
            $target_category = get_cat_ID('target');
            wp_set_post_categories($postarr['ID'], array($target_category));
        }
    }

    return $postarr;
}
 */


/**
 * Change post category  on publishing. 
 * 
 */
/* add_action('save_post', 'update_post_category_on_save', 10, 2);

function update_post_category_on_save($post_id, $post) {
    // Check if post has the 'source' category
    $source_category = get_cat_ID('demo');
    $post_categories = wp_get_post_categories($post_id);

    if (in_array($source_category, $post_categories)) {
        // Change the post category to 'target'
        $target_category = get_cat_ID('target');
        wp_set_post_categories($post_id, array($target_category));
    }
}
*/


/**
 * Change post category  on publishing.
 * Checks if post has dt_original_post_id meta key.
 * Assign posts with 'demo' cat to 'target' category.
 * 
 */
/* add_action('save_post', 'update_post_category_on_save', 10, 2);

function update_post_category_on_save($post_id, $post) {
    // Check if the post has the 'source' category
    $source_category = get_cat_ID('demo');
    $post_categories = wp_get_post_categories($post_id);

    // Check for a specific post meta added by the plugin
    $plugin_created = get_post_meta($post_id, 'dt_original_post_id', true);

    if ($plugin_created && in_array($source_category, $post_categories)) {
        // Change the post category to 'target'
        $target_category = get_cat_ID('target');
        wp_set_post_categories($post_id, array($target_category));
    }
} */

/**
 * Change post category on publishing.
 * Assigns posts to the default category.
 * Checks if post has dt_original_post_id meta key.
 * 
 */
add_action('save_post', 'update_post_category_on_save', 10, 2);

function update_post_category_on_save($post_id, $post)
{
	// get the default category
	$default_category = get_option('default_category');
	$post_categories = wp_get_post_categories($post_id);

	// check if post has meta key added by Distributor plugin
	$distributor_meta_key = get_post_meta($post_id, 'dt_original_post_id', true);

	if ($distributor_meta_key && !in_array($default_category, $post_categories)) {
		// assign the post to the default category
		wp_set_post_categories($post_id, array($default_category));
	}
}


/**
 * Filter pull posts column.
 * Adds 4 new columns to the Pull post table.
 * 
 */

add_filter('dt_pull_list_table_columns', 'post_column_func_header', 10, 1);

function post_column_func_header($columns)
{

	if (is_array($columns) && !isset($columns['author'], $columns['tags'], $columns['categories'], $columns['post-excerpt'])) {
		$columns['author'] = __('Author');
		$columns['tags'] = __('Tags');
		$columns['categories'] = __('Categories');
		$columns['post-excerpt'] = __('Excerpt');
	}

	return $columns;
}

/**
 * Limit the width of column tables.
 * Adds CSS code to distributor_page_pull admin page.
 */

add_action('admin_print_styles-distributor_page_pull', function () {
	echo '<style> .column-post_type { width: 100px !important; }</style>';
	echo '<style> .column-date { width: 100px !important; }</style>';
	echo '<style> .column-author { width: 120px !important; }</style>';
	echo '<style> .column-tags { width: 120px !important; }</style>';
});

/**
 * Display category name for each post.
 * 
 */

add_action('dt_pull_list_table_custom_column', 'dt_pull_post_cat_name', 10, 2);

function dt_pull_post_cat_name($column_name, $item)
{

	if ($column_name == 'categories') {

		if (isset($item->terms['category']) && is_array($item->terms['category'])) {
			// initialize an empty string to store category names
			$category_names = '';

			// loop through each category and append to the string
			foreach ($item->terms['category'] as $index => $category) {
				$category_names .= $category['name'];

				// add a comma if it's not the last category
				if ($index < count($item->terms['category']) - 1) {
					$category_names .= ', ';
				}
			}

			// output the concatenated string
			echo $category_names;
		} else {
			echo __('No categories found for this post.');
		}

		// echo '<pre>';
		// var_dump($item);
		// echo '</pre>';
	}

	return $item;
}

/**
 * Display author id for each post.
 * 
 */

add_action('dt_pull_list_table_custom_column', 'dt_pull_post_author_id', 10, 2);

function dt_pull_post_author_id($column_name, $item)
{

	if ($column_name == 'author') {

		if ($item->post_author !== 0) {
			$post_author_id = $item->post_author;
			// display post author id
			echo $post_author_id;
		} else {
			echo 'No author found for this post.';
		}
	}

	return $item;
}

/**
 * Display post tags for each post.
 * 
 */

add_action('dt_pull_list_table_custom_column', 'dt_pull_post_tags', 10, 2);

function dt_pull_post_tags($column_name, $item)
{

	if ($column_name == 'tags') {

		// Check if the post_tag data exists and is an array
		if (isset($item->terms['post_tag']) && is_array($item->terms['post_tag'])) {
			// Loop through each term in post_tag
			foreach ($item->terms['post_tag'] as $term) {
				// Access the 'name' key for each term
				$tag_name = $term['name'];

				// Output or use $tag_name as needed
				echo $tag_name;
			}
		} else {
			echo 'No post tags found for this post.';
		}
	}

	return $item;
}

/**
 * Display post excerpt for each post.
 * 
 */

add_action('dt_pull_list_table_custom_column', 'dt_pull_post_excerpt', 10, 2);

function dt_pull_post_excerpt($column_name, $item)
{

	if ($column_name == 'post-excerpt') {

		if (isset($item->post_excerpt)) {
			// Access the 'post_excerpt' property
			$post_excerpt = $item->post_excerpt;
			
			// Output or use $post_excerpt as needed
			echo $post_excerpt;
		} else {
			echo 'No post excerpt found for this post.';
		}
	}

	return $item;
}
