<?php

class WPML_Upgrade_Schema {

	/** @var wpdb $wpdb */
	private $wpdb;

	public function __construct( wpdb $wpdb ) {
		$this->wpdb = $wpdb;
	}

	/**
	 * @param string $table_name
	 *
	 * @return bool
	 */
	public function does_table_exist( $table_name ) {
		return (bool) count( $this->wpdb->get_results( "SHOW TABLES LIKE '{$this->wpdb->prefix}{$table_name}'" ) );
	}

	/**
	 * @param string $table_name
	 * @param string $column_name
	 *
	 * @return bool
	 */
	public function does_column_exist( $table_name, $column_name ) {
		return (bool) count( $this->wpdb->get_results( "SHOW COLUMNS FROM {$this->wpdb->prefix}{$table_name} LIKE '{$column_name}'" ) );
	}

	/**
	 * @param string $table_name
	 * @param string $column_name
	 * @param string $attribute_string
	 *
	 * @return false|int
	 */
	public function add_column( $table_name, $column_name, $attribute_string ) {
		return $this->wpdb->query( "ALTER TABLE {$this->wpdb->prefix}{$table_name} ADD `{$column_name}` {$attribute_string}" );
	}

}