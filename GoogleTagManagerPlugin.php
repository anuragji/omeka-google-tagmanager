<?php

/**
 * A plugin for Omeka that adds Google Analytics code to your page.
 *
 * You will have to make sure you add the following code to the footer.php file
 * of your theme
 *
 * 		<?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
 *
 * @package   Google Analytics
 * @author    Dave Widmer <dwidmer@bgsu.edu>
 */
class GoogleTagmanagerPlugin extends Omeka_Plugin_AbstractPlugin
{
	/**
	 * @var array  Plugin hooks
	 */
	protected $_hooks = array('install','uninstall','config','config_form', 'public_body');

	/**
	 * @var array  Plugin options
	 */
	protected $_options = array(
		'tagManagerContainerId' => ""
	);

	/**
	 * Installation hook.
	 */
	public function hookInstall()
	{
        $this->_installOptions();
	}

	/**
	 * Uninstalls any options that have been set.
	 */
	public function hookUninstall()
	{
		$this->_uninstallOptions();
	}

	/**
	 * Set the options from the Config form.
	 */
	public function hookConfig()
	{
        $newID = $_POST['tagManagerContainerId'];
        set_option('tagManagerContainerId', $newID);
	}

	/**
	 * Displays the configuration form.
	 */
	public function hookConfigForm()
	{
        $tagManagerContainerId = get_option('tagManagerContainerId');
		require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config_form.php';
	}

	/**
	 * The hook that adds the google tagmanager code to your website, as long as
	 * the tracking code is set.
	 *
	 * @param  array $args  Plugin hook arguments (in this case the view)
	 */
	public function hookPublicBody($args)
	{
		$tagManagerContainerId = get_option('tagManagerContainerId');

		if ( ! empty($tagManagerContainerId))
		{
			ob_start();
			include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'google_tagmanager_code.php';
			echo ob_get_clean();
		}
	}

}
