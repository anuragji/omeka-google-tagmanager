<?php $view = get_view(); ?>
<div id="google-tag-manager-settings">
    <h2><?php echo __('Google Tag Manager Settings');?></h2>
    <div class="field">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tagmanagerContainer', __('Container ID')); ?>
        </div>
        <div class="inputs five columns omega">
            <?php echo $view->formText('tagManagerContainerId', $tagManagerContainerId); ?>
        </div>
    </div>
    <p class="explanation">Your Google Tag Manager Container ID can be found by following the steps below.</p>
    <ul class="explanation">
        <li>Log into Google Tag Manager - <a href="http://www.google.com/tagmanager" target="_blank">http://www.google.com/tagmanager</a></li>
        <li>Select your Account in the list of Accounts</li>
        <li>Click on "Containers" to view the list of available containers</li>
        <li>Select your the desired container - the ID <i>(GTM-XXXXXX)</i> is displayed right next to the container name</li>
    </ul>
    <p class="explanation"><b>Please note</b>: In order for the tag to be included in your template files, you will need to ensure that following hook
        <br /><code style="font-size: 90%">&lt;?php fire_plugin_hook('public_body', array('view' => $this)); ?&gt;</code>
        <br />is inserted right after the <code style="font-size: 90%">&lt;body&gt</code> tag of your theme (e.g. in <i>yourtheme/common/header.php</i>).</p>
</div>




