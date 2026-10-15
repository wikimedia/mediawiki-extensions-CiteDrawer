<?php

namespace MediaWiki\Extensions\CiteDrawer;

use ConfigFactory;
use MediaWiki\Output\Hook\BeforePageDisplayHook;
use MediaWiki\Output\Hook\MakeGlobalVariablesScriptHook;

/**
 * Hooks for CiteDrawer extension
 *
 * @ingroup Extensions
 */
class CiteDrawerHooks implements BeforePageDisplayHook, MakeGlobalVariablesScriptHook {

	public function __construct(
		private readonly ConfigFactory $configFactory,
	) {
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
