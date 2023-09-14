<?php

namespace Mediawiki\Extensions\CiteDrawer;

use ConfigFactory;
use MediaWiki\Hook\BeforePageDisplayHook;
use MediaWiki\Hook\MakeGlobalVariablesScriptHook;

/**
 * Hooks for CiteDrawer extension
 *
 * @file
 * @ingroup Extensions
 */
class CiteDrawerHooks implements BeforePageDisplayHook, MakeGlobalVariablesScriptHook {

	/** @var ConfigFactory */
	private $configFactory;

	/** @inheritDoc */
	public function __construct( ConfigFactory $configFactory ) {
		$this->configFactory = $configFactory;
	}

	/** @inheritDoc */
	public function onBeforePageDisplay( $out, $skin ): void {
		$out->addModules( 'ext.citedrawer.main' );
	}

	/** @inheritDoc */
	public function onMakeGlobalVariablesScript( &$vars, $out ): void {
		$config = $this->configFactory->makeConfig( 'CiteDrawer' );
		$vars['wgCiteDrawerEnableDesktop'] = $config->get( 'CiteDrawerEnableDesktop' );
		$vars['wgCiteDrawerEnableMobile'] = $config->get( 'CiteDrawerEnableMobile' );
		$vars['wgCiteDrawerTheme'] = $config->get( 'CiteDrawerTheme' );
	}

}
