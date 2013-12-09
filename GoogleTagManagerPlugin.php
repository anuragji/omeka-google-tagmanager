<?php

/**
 * This plugin allows the implementation of the Google Tag Manager code to your Omeka install
 *
 * Please make sure to include the required hook <?php fire_plugin_hook('public_body', array('view' => $this)); ?>
 * right after the <body> tag in your theme.
 *
 * @package   Google TagManager
 * @author    Anurag Spatzenegger
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
	 * Add the google tagmanager code to your website, as long as
	 * the tracking code is set.
	 *
	 * @param  array $args  Plugin hook arguments (in this case the view)
	 */
	public function hookPublicBody($args)
	{
		$tagManagerContainerId = get_option('tagManagerContainerId');

		if (! empty($tagManagerContainerId))
		{
			ob_start();
			include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'google_tagmanager_code.php';
			echo ob_get_clean();
		}
	}

}
