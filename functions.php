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

add_action('dt_after_set_meta', 'client_prefix_auto_unlink_distributed_posts', 10, 3);

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
 * Unset default name, date, post_type columns.
 * 
 */

add_filter('dt_pull_list_table_columns', 'post_column_unset_columns', 10, 1);

function post_column_unset_columns($columns)
{
	// unset default date & post_type columns
	if (is_array($columns) && isset($columns['date'], $columns['post_type'])) {
		unset($columns['date']);
		unset($columns['post_type']);
	}

	// unset default name column only for the status=pulled page
	if (isset($_GET['page']) && $_GET['page'] === 'pull' && isset($_GET['status']) && $_GET['status'] === 'pulled') {
		if (is_array($columns) && isset($columns['name'])) {
			unset($columns['name']);
		}
	}

	return $columns;
}

/**
 * Filter pull posts column.
 * Adds new columns to the Distributor post table.
 * 
 */

add_filter('dt_pull_list_table_columns', 'post_column_func_header', 10, 1);

function post_column_func_header($columns)
{	
	// initialize dt-post-name only for the status=pulled page
	if (isset($_GET['page']) && $_GET['page'] === 'pull' && isset($_GET['status']) && $_GET['status'] === 'pulled') {
		if (is_array($columns) && !isset($columns['dt-post-name'])) {
			$columns['dt-post-name'] = __('Name');
		}
	}

	// initialize the rest of columns normally
	if (is_array($columns) && !isset($columns['dt-post-type'], $columns['date-time'], $columns['author'], $columns['tags'], $columns['categories'], $columns['post-excerpt'])) {
		$columns['dt-post-type'] = __('Post Type');
		$columns['date-time'] = __('Date & Time');
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
	echo '<style>
		.column-dt-post-type,
		.column-date-time { width: 150px !important; }
		.column-author,
		.column-tags { width: 120px !important; }
	</style>';
});

/**
 * Display post type for each post.
 * 
 */

add_action('dt_pull_list_table_custom_column', 'dt_pull_post_dt_post_type', 10, 2);

function dt_pull_post_dt_post_type($column_name, $item)
{

	if ($column_name == 'dt-post-type') {
		if (isset($item->post_type)) {
			// display post_type name
			echo ucwords($item->post_type);
		} else {
			_e('No post type found for this post.');
		}
	}

	return $item;
}

/**
 * Display date and time gmt for each post.
 * 
 */

add_action('dt_pull_list_table_custom_column', 'dt_pull_post_publish_date_time_gmt', 10, 2);

function dt_pull_post_publish_date_time_gmt($column_name, $item)
{

	if ($column_name == 'date-time') {
		_e('Published:');

		if (isset($item->post_date_gmt)) {
			// display post date GMT
			echo '<br>' . $item->post_date_gmt;
		} else {
			_e('No post date found for this post.');
		}
	}

	return $item;
}

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

			// get the total number of categories
			$total_categories = count($item->terms['category']);

			// loop through each category and append to the string
			foreach ($item->terms['category'] as $index => $category) {
				$category_names .= $category['name'];

				// add a comma if it's not the last category
				if ($index < $total_categories - 1) {
					$category_names .= ', ';
				}
			}

			// output the concatenated string
			echo $category_names;
		} else {
			echo __('No categories found for this post.');
		}
	}

	return $item;
}

/**
 * Display author nickname for each post.
 * 
 */

add_action('dt_pull_list_table_custom_column', 'dt_pull_post_author_nickname', 10, 2);

function dt_pull_post_author_nickname($column_name, $item)
{
	if ($column_name == 'author') {
		// check if the 'author_nickname' meta key exists in the item's meta data.
		if (isset($item->meta['author_nickname'])) {
			// output author nickname
			echo $item->meta['author_nickname'];
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
		if (isset($item->terms['post_tag']) && is_array($item->terms['post_tag'])) {
			// initialize an empty string to store tag names
			$tag_names = '';

			// get the total number of tags
			$total_tags = count($item->terms['post_tag']);

			// loop through each tag and append to the string
			foreach ($item->terms['post_tag'] as $index => $tag) {
				$tag_names .= $tag['name'];

				// add a comma if it's not the last tag
				if ($index < $total_tags - 1) {
					$tag_names .= ', ';
				}
			}

			// output the concatenated string
			echo $tag_names;
		} else {
			echo __('No tags found for this post.');
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
			// access the 'post_excerpt' of WP_Post object
			$post_excerpt = $item->post_excerpt;

			// display post excerpt
			echo $post_excerpt;
		} else {
			echo 'No post excerpt found for this post.';
		}
	}

	return $item;
}

/**
 * Add a custom meta key to the prepared meta using dt_prepared_meta filter.
 * Meta key will store post author's nickname.
 */

add_filter('dt_prepared_meta', 'add_author_nickname_to_prepared_meta', 10, 2);

function add_author_nickname_to_prepared_meta($prepared_meta, $post_id)
{
	// check if it's a post
	if ($post_id && get_post_type($post_id) === 'post') {
		// get author nickname based on post author ID
		$author_nickname = get_the_author_meta('nickname', get_post_field('post_author', $post_id));

		// add the custom meta key to the prepared meta array
		$prepared_meta['author_nickname'] = $author_nickname;
	}

	return $prepared_meta;
}
