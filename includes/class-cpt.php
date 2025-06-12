<?php
/**
 * Define el Custom Post Type (CPT) y sus taxonomías.
 *
 * @package PluginJuniorTest
 */

// Evita el acceso directo al archivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Plugin_Junior_Test_CPT' ) ) {

    class Plugin_Junior_Test_CPT {

        public function __construct() {
            add_action( 'init', array( $this, 'register_cpt_project' ) );
            add_action( 'init', array( $this, 'register_taxonomies_project' ) );
            add_action( 'init', array( $this, 'register_cpt_contact_message' ) ); // <-- AÑADE ESTA LÍNEA
        }



        /**
         * Registra el Custom Post Type 'project'.
         */
        public function register_cpt_project() {
            $labels = array(
                'name'                  => _x( 'Proyectos', 'Post Type General Name', 'plugin-junior-test' ),
                'singular_name'         => _x( 'Proyecto', 'Post Type Singular Name', 'plugin-junior-test' ),
                'menu_name'             => __( 'Proyectos', 'plugin-junior-test' ),
                'name_admin_bar'        => __( 'Proyecto', 'plugin-junior-test' ),
                'archives'              => __( 'Archivo de Proyectos', 'plugin-junior-test' ),
                'attributes'            => __( 'Atributos del Proyecto', 'plugin-junior-test' ),
                'parent_item_colon'     => __( 'Proyecto Padre:', 'plugin-junior-test' ),
                'all_items'             => __( 'Todos los Proyectos', 'plugin-junior-test' ),
                'add_new_item'          => __( 'Añadir Nuevo Proyecto', 'plugin-junior-test' ),
                'add_new'               => __( 'Añadir Nuevo', 'plugin-junior-test' ),
                'new_item'              => __( 'Nuevo Proyecto', 'plugin-junior-test' ),
                'edit_item'             => __( 'Editar Proyecto', 'plugin-junior-test' ),
                'update_item'           => __( 'Actualizar Proyecto', 'plugin-junior-test' ),
                'view_item'             => __( 'Ver Proyecto', 'plugin-junior-test' ),
                'view_items'            => __( 'Ver Proyectos', 'plugin-junior-test' ),
                'search_items'          => __( 'Buscar Proyectos', 'plugin-junior-test' ),
                'not_found'             => __( 'No encontrado', 'plugin-junior-test' ),
                'not_found_in_trash'    => __( 'No encontrado en la papelera', 'plugin-junior-test' ),
                'featured_image'        => __( 'Imagen Destacada del Proyecto', 'plugin-junior-test' ),
                'set_featured_image'    => __( 'Establecer imagen destacada del proyecto', 'plugin-junior-test' ),
                'remove_featured_image' => __( 'Quitar imagen destacada del proyecto', 'plugin-junior-test' ),
                'use_featured_image'    => __( 'Usar como imagen destacada del proyecto', 'plugin-junior-test' ),
                'insert_into_item'      => __( 'Insertar en proyecto', 'plugin-junior-test' ),
                'uploaded_to_this_item' => __( 'Subido a este proyecto', 'plugin-junior-test' ),
                'items_list'            => __( 'Lista de Proyectos', 'plugin-junior-test' ),
                'items_list_navigation' => __( 'Navegación de la lista de proyectos', 'plugin-junior-test' ),
                'filter_items_list'     => __( 'Filtrar lista de proyectos', 'plugin-junior-test' ),
            );
            $args = array(
                'label'                 => __( 'Proyecto', 'plugin-junior-test' ),
                'description'           => __( 'Custom Post Type para proyectos', 'plugin-junior-test' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ), // Qué campos tendrá el editor
                'hierarchical'          => false, // ¿Puede tener proyectos padres/hijos?
                'public'                => true, // ¿Es visible en el front-end?
                'show_ui'               => true, // ¿Es visible en el panel de administración?
                'show_in_menu'          => true, // ¿Aparece en el menú del panel de administración?
                'menu_position'         => 5, // Posición en el menú (5 es debajo de 'Entradas')
                'menu_icon'             => 'dashicons-portfolio', // Icono para el menú
                'show_in_admin_bar'     => true, // ¿Aparece en la barra de administración?
                'show_in_nav_menus'     => true, // ¿Se puede usar en menús de navegación?
                'can_export'            => true, // ¿Se puede exportar?
                'has_archive'           => true, // ¿Tiene un archivo de listado? (ej. /proyectos/)
                'exclude_from_search'   => false, // ¿Se excluye de las búsquedas?
                'publicly_queryable'    => true, // ¿Se puede consultar directamente por URL?
                'capability_type'       => 'post', // Tipo de capacidad para permisos
                'show_in_rest'          => true, // Para que esté disponible en la API REST (editor de bloques Gutenberg)
                'rewrite'               => array( 'slug' => 'proyectos' ), // La URL amigable (ej. /proyectos/mi-proyecto)
            );
            register_post_type( 'project', $args ); // 'project' es el identificador único del CPT
        }

        /**
         * Registra las taxonomías personalizadas 'tecnologia' y 'sector' para el CPT 'project'.
         */
        public function register_taxonomies_project() {

            // Taxonomía: Tecnología
            $labels_tec = array(
                'name'                       => _x( 'Tecnologías', 'Taxonomy General Name', 'plugin-junior-test' ),
                'singular_name'              => _x( 'Tecnología', 'Taxonomy Singular Name', 'plugin-junior-test' ),
                'menu_name'                  => __( 'Tecnologías', 'plugin-junior-test' ),
                'all_items'                  => __( 'Todas las Tecnologías', 'plugin-junior-test' ),
                'parent_item'                => __( 'Tecnología Padre', 'plugin-junior-test' ),
                'parent_item_colon'          => __( 'Tecnología Padre:', 'plugin-junior-test' ),
                'new_item_name'              => __( 'Nueva Tecnología', 'plugin-junior-test' ),
                'add_new_item'               => __( 'Añadir Nueva Tecnología', 'plugin-junior-test' ),
                'edit_item'                  => __( 'Editar Tecnología', 'plugin-junior-test' ),
                'update_item'                => __( 'Actualizar Tecnología', 'plugin-junior-test' ),
                'view_item'                  => __( 'Ver Tecnología', 'plugin-junior-test' ),
                'separate_items_with_commas' => __( 'Separar tecnologías con comas', 'plugin-junior-test' ),
                'add_or_remove_items'        => __( 'Añadir o quitar tecnologías', 'plugin-junior-test' ),
                'choose_from_most_used'      => __( 'Elegir entre las tecnologías más usadas', 'plugin-junior-test' ),
                'popular_items'              => __( 'Tecnologías Populares', 'plugin-junior-test' ),
                'search_items'               => __( 'Buscar Tecnologías', 'plugin-junior-test' ),
                'not_found'                  => __( 'No encontrada', 'plugin-junior-test' ),
                'no_terms'                   => __( 'No hay tecnologías', 'plugin-junior-test' ),
                'items_list'                 => __( 'Lista de tecnologías', 'plugin-junior-test' ),
                'items_list_navigation'      => __( 'Navegación de la lista de tecnologías', 'plugin-junior-test' ),
            );
            $args_tec = array(
                'labels'                     => $labels_tec,
                'hierarchical'               => true, // True para que se comporte como categorías, False para etiquetas
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true, // Mostrar columna en la tabla del admin
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
                'show_in_rest'               => true, // Para el editor de bloques
                'rewrite'                    => array( 'slug' => 'tecnologia' ), // La URL amigable (ej. /tecnologia/php)
            );
            register_taxonomy( 'tecnologia', array( 'project' ), $args_tec ); // 'tecnologia' es el identificador, 'project' es el CPT al que se asocia

            // Taxonomía: Sector
            $labels_sec = array(
                'name'                       => _x( 'Sectores', 'Taxonomy General Name', 'plugin-junior-test' ),
                'singular_name'              => _x( 'Sector', 'Taxonomy Singular Name', 'plugin-junior-test' ),
                'menu_name'                  => __( 'Sectores', 'plugin-junior-test' ),
                'all_items'                  => __( 'Todos los Sectores', 'plugin-junior-test' ),
                'parent_item'                => __( 'Sector Padre', 'plugin-junior-test' ),
                'parent_item_colon'          => __( 'Sector Padre:', 'plugin-junior-test' ),
                'new_item_name'              => __( 'Nuevo Sector', 'plugin-junior-test' ),
                'add_new_item'               => __( 'Añadir Nuevo Sector', 'plugin-junior-test' ),
                'edit_item'                  => __( 'Editar Sector', 'plugin-junior-test' ),
                'update_item'                => __( 'Actualizar Sector', 'plugin-junior-test' ),
                'view_item'                  => __( 'Ver Sector', 'plugin-junior-test' ),
                'separate_items_with_commas' => __( 'Separar sectores con comas', 'plugin-junior-test' ),
                'add_or_remove_items'        => __( 'Añadir o quitar sectores', 'plugin-junior-test' ),
                'choose_from_most_used'      => __( 'Elegir entre los sectores más usados', 'plugin-junior-test' ),
                'popular_items'              => __( 'Sectores Populares', 'plugin-junior-test' ),
                'search_items'               => __( 'Buscar Sectores', 'plugin-junior-test' ),
                'not_found'                  => __( 'No encontrado', 'plugin-junior-test' ),
                'no_terms'                   => __( 'No hay sectores', 'plugin-junior-test' ),
                'items_list'                 => __( 'Lista de sectores', 'plugin-junior-test' ),
                'items_list_navigation'      => __( 'Navegación de la lista de sectores', 'plugin-junior-test' ),
            );
            $args_sec = array(
                'labels'                     => $labels_sec,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
                'show_in_rest'               => true,
                'rewrite'                    => array( 'slug' => 'sector' ),
            );
            register_taxonomy( 'sector', array( 'project' ), $args_sec );
        }

        /**
         * Registra el Custom Post Type 'contact_message' para los mensajes del formulario.
         */
        public function register_cpt_contact_message() {
            $labels = array(
                'name'          => _x( 'Mensajes de Contacto', 'Post Type General Name', 'plugin-junior-test' ),
                'singular_name' => _x( 'Mensaje de Contacto', 'Post Type Singular Name', 'plugin-junior-test' ),
                'menu_name'     => __( 'Mensajes de Contacto', 'plugin-junior-test' ),
                'all_items'     => __( 'Todos los Mensajes', 'plugin-junior-test' ),
                'add_new_item'  => __( 'Añadir Nuevo Mensaje', 'plugin-junior-test' ),
                'add_new'       => __( 'Añadir Nuevo', 'plugin-junior-test' ),
                'new_item'      => __( 'Nuevo Mensaje', 'plugin-junior-test' ),
                'edit_item'     => __( 'Editar Mensaje', 'plugin-junior-test' ),
                'view_item'     => __( 'Ver Mensaje', 'plugin-junior-test' ),
                'search_items'  => __( 'Buscar Mensajes', 'plugin-junior-test' ),
                'not_found'     => __( 'No se encontraron mensajes', 'plugin-junior-test' ),
                'not_found_in_trash' => __( 'No se encontraron mensajes en la papelera', 'plugin-junior-test' ),
            );
            $args = array(
                'label'             => __( 'Mensaje de Contacto', 'plugin-junior-test' ),
                'description'       => __( 'Mensajes enviados a través del formulario de contacto.', 'plugin-junior-test' ),
                'labels'            => $labels,
                'supports'          => array( 'title', 'editor' ),
                'hierarchical'      => false,
                'public'            => false, // Muy importante: No visible en el front-end
                'show_ui'           => true,
                'show_in_menu'      => true,
                'menu_position'     => 20,
                'menu_icon'         => 'dashicons-email-alt',
                'show_in_admin_bar' => false,
                'show_in_nav_menus' => false,
                'can_export'        => true,
                'has_archive'       => false,
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'capability_type'   => 'post',
                'show_in_rest'      => false,
            );
            register_post_type( 'contact_message', $args );
        }
    }


}