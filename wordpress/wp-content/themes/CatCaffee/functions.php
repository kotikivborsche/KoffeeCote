<?php
add_theme_support( 'menus' );
// правильный способ подключить стили и скрипты темы
add_action( 'wp_enqueue_scripts', 'theme_add_scripts' );
function theme_add_scripts() {
    // подключаем файл стилей темы
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css' ); // общий файл стилей
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' ); // стили bootstrap
    wp_enqueue_style( 'full-spoon', get_template_directory_uri() . '/css/full-spoon.css'  ); // тема для bootstrap
    wp_enqueue_style( 'galery', get_template_directory_uri() . '/css/gallery-styles.css'  ); // для галереи
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );// для анимаций   
    wp_enqueue_style( 'owl', get_template_directory_uri() . '/css/owl.theme.css'  ); // для видоса
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css'  );// для анимаций
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css'  );// для шрифтов
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/css/owl.carousel.css'  );// для анимаций
    


    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), null, true); // jquery
	
    wp_enqueue_script( 'js-isotope', get_template_directory_uri() .'/js/isotope.pkgd.min.js', array(), '1.0', true ); // для видоса 
    wp_enqueue_script( 'js-popup', get_template_directory_uri() .'/js/jquery.magnific-popup.min.js', array(), '1.0', true ); // для анимаций
    wp_enqueue_script( 'js-easing', get_template_directory_uri() .'/js/jquery.easing.min.js', array(), '1.0', true );
    wp_enqueue_script( 'js-bootstrap', get_template_directory_uri() .'/js/bootstrap.min.js', array(), '1.0', true );
    wp_enqueue_script( 'js-classie', get_template_directory_uri() .'/js/classie.js', array(), '1.0', true );// для видоса
    wp_enqueue_script( 'js-animate', get_template_directory_uri() .'/js/cbpAnimatedHeader.min.js', array(), '1.0', true );// для видоса
    wp_enqueue_script( 'js-wow', get_template_directory_uri() .'/js/wow.min.js', array(), '1.0', true ); // для анимаций
	wp_enqueue_script( 'js-fullspoon', get_template_directory_uri() .'/js/fullspoon.js', array(), '1.0', true ); // скрипты fullspoon
    wp_enqueue_script( 'js-pwl', get_template_directory_uri() .'/js/owl.carousel.js', array(), '1.0', true ); // для видоса
     // для анимаций
	wp_enqueue_script( 'js-popup-content', get_template_directory_uri() .'/js/popup-content.js', array(), '1.0', true );// для анимаций
	wp_enqueue_script( 'js-video', get_template_directory_uri() .'/js/backgroundVideo.min.js', array(), '1.0', true );// для видоса

    // wp_enqueue_script( 'js-marked', get_template_directory_uri() .'/js/marked.min.js', array(), '1.0', true );
    // wp_enqueue_script( 'js-analitycs', get_template_directory_uri() .'/js/analytics.js', array(), '1.0', true );
    // wp_enqueue_script( 'js-watch', get_template_directory_uri() .'/js/watch.js', array(), '1.0', true );
    

}


add_theme_support('post-thumbnails');
add_action( 'init', 'register_post_types' );

function register_post_types(){
// пользовательский тип записи для сотрудников
	register_post_type( 'staff', [
		'label'  => null,
		'labels' => [
			'name'               => 'Сотрудники', // основное название для типа записи
			'singular_name'      => 'Сотрудник', // название для одной записи этого типа
			'add_new'            => 'Добавить сотрудника', // для добавления новой записи
			'add_new_item'       => 'Добавление сотрудника', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование сотрудника', // для редактирования типа записи
			'new_item'           => 'Новый сотрудник', // текст новой записи
			'view_item'          => 'Смотреть сотрудника', // для просмотра записи этого типа.
			'search_items'       => 'Искать сотрудника', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Сотрудники', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
// пользовательский тип записи для вопросов-ответов
    register_post_type( 'faq', [
		'label'  => null,
		'labels' => [
			'name'               => 'FAQ', // основное название для типа записи
			'singular_name'      => 'FAQ', // название для одной записи этого типа
			'add_new'            => 'Добавить faq', // для добавления новой записи
			'add_new_item'       => 'Добавление faq', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование faq', // для редактирования типа записи
			'new_item'           => 'Новый faq', // текст новой записи
			'view_item'          => 'Смотреть faq', // для просмотра записи этого типа.
			'search_items'       => 'Искать faq', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'FAQ', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
// пользовательский тип записи для картинок в галерее
    register_post_type( 'gallery', [
		'label'  => null,
		'labels' => [
			'name'               => 'Фотографии', // основное название для типа записи
			'singular_name'      => 'Фотография', // название для одной записи этого типа
			'add_new'            => 'Добавить фото', // для добавления новой записи
			'add_new_item'       => 'Добавление фото', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование фото', // для редактирования типа записи
			'new_item'           => 'Новое фото', // текст новой записи
			'view_item'          => 'Смотреть фото', // для просмотра записи этого типа.
			'search_items'       => 'Искать фото', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Фотографии', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
// пользовательский тип записи для котиков
    register_post_type( 'cats', [
		'label'  => null,
		'labels' => [
			'name'               => 'Котики', // основное название для типа записи
			'singular_name'      => 'Котик', // название для одной записи этого типа
			'add_new'            => 'Добавить котика', // для добавления новой записи
			'add_new_item'       => 'Добавление котика', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование котика', // для редактирования типа записи
			'new_item'           => 'Новый котик', // текст новой записи
			'view_item'          => 'Смотреть котика', // для просмотра записи этого типа.
			'search_items'       => 'Искать котика', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Котики', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
// пользовательский тип записи для мерча
    register_post_type( 'products', [
		'label'  => null,
		'labels' => [
			'name'               => 'Мерч', // основное название для типа записи
			'singular_name'      => 'Мерч', // название для одной записи этого типа
			'add_new'            => 'Добавить мерч', // для добавления новой записи
			'add_new_item'       => 'Добавление мерча', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование мерча', // для редактирования типа записи
			'new_item'           => 'Новый мерч', // текст новой записи
			'view_item'          => 'Смотреть мерч', // для просмотра записи этого типа.
			'search_items'       => 'Искать мерч', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Мерч', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
// пользовательский тип записи для акций
    register_post_type( 'promo', [
		'label'  => null,
		'labels' => [
			'name'               => 'Акции', // основное название для типа записи
			'singular_name'      => 'Акция', // название для одной записи этого типа
			'add_new'            => 'Добавить акцию', // для добавления новой записи
			'add_new_item'       => 'Добавление акции', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование акции', // для редактирования типа записи
			'new_item'           => 'Новая акция', // текст новой записи
			'view_item'          => 'Смотреть акцию', // для просмотра записи этого типа.
			'search_items'       => 'Искать акцию', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Акции', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
// пользовательский тип записи для новостей
    register_post_type( 'news', [
		'label'  => null,
		'labels' => [
			'name'               => 'Новости', // основное название для типа записи
			'singular_name'      => 'Новость', // название для одной записи этого типа
			'add_new'            => 'Добавить новость', // для добавления новой записи
			'add_new_item'       => 'Добавление новости', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование новости', // для редактирования типа записи
			'new_item'           => 'Новая новость', // текст новой записи
			'view_item'          => 'Смотреть новость', // для просмотра записи этого типа.
			'search_items'       => 'Искать новость', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Новости', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}

