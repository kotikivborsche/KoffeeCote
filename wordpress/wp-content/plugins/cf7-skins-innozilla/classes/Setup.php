<?php
/**
 * Free and Pro plugin conflict fix
*/
include_once(ABSPATH.'wp-admin/includes/plugin.php');
if ( is_plugin_active('cf7-skins-innozilla-pro/cf7-skins-innozilla-pro.php') ) {
  deactivate_plugins('cf7-skins-innozilla-pro/cf7-skins-innozilla-pro.php');
}
class ICF7S_Setup {

	/** @var My_Plugin_Dependency_Checker */
	private $dependency_checker;

	public function init() {
		$this->load_classes();
		$this->create_instances();
		
		try {
			$this->dependency_checker->check();
		} catch ( ICF7S_Missing_Dependencies_Exception $e ) {
			// The exception contains the names of missing plugins.
			$this->report_missing_dependencies( $e->get_missing_plugin_names() );
			return;
		}
		
		// Do actual plugin functionality registration here - add_action(), add_filter() etc.
	}

	private function load_classes() {
		// Exceptions
		require_once dirname( __FILE__ ) . '/exceptions/Exception.php';
		require_once dirname( __FILE__ ) . '/exceptions/Missing_Dependencies_Exception.php';

		// Dependency checker
		require_once dirname( __FILE__ ) . '/Dependency_Checker.php';
		require_once dirname( __FILE__ ) . '/Missing_Dependency_Reporter.php';
	}

	private function create_instances() {
		$this->dependency_checker = new ICF7S_Dependency_Checker();
	}
	
	/**
	 * @param string[] $missing_plugin_names
	 */
	private function report_missing_dependencies( $missing_plugin_names ) {
		$missing_dependency_reporter = new ICF7S_Missing_Dependency_Reporter( $missing_plugin_names );
		$missing_dependency_reporter->bind_to_admin_hooks();
	}

}