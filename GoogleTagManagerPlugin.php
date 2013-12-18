<?php
/**
 *  Google Tag Manager Plugin
 *  @copyright Copyright 2013 The Digital Ark, Corp.
 *  @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 or any later version
 *  @package GoogleTag Manager
 */

define('GOOGLETAGMANAGER_PLUGIN_DIR', PLUGIN_DIR . '/GoogleTagmanager');
class GoogleTagmanagerPlugin extends Omeka_Plugin_AbstractPlugin
{
	/**
	 * @var array  Plugin hooks
	 */
	protected $_hooks = array(
        'install',
        'uninstall',
        'config',
        'config_form',
        'public_body'
    );

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
		require GOOGLETAGMANAGER_PLUGIN_DIR . '/config_form.php';
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

		if (!empty($tagManagerContainerId))
		{
			ob_start();
			include GOOGLETAGMANAGER_PLUGIN_DIR . '/views/public/google_tagmanager_code.php';
			echo ob_get_clean();
		}
	}

}
