<?php

/**
 * All hooked functions used by CCAgreement
 * @ingroup Extensions
 * @author Josef Martiňák
 * @license MIT
 * @file
 */

class CCAgreementHooks {

	/**
	 * Function for BeforePageDisplay hook
	 * Add agreement with policy to the registration page
	 * @param object $skin: instance of Skin object
	 * @param string &$out: instance of Output object
	 * @return Boolean: true
	 */
	function AddLicencing(&$out,&$skin) { 
		global $wgSitename;
		$pgtitle = $skin->getTitle()->getBaseText();
		$tmp = SpecialPageFactory::resolveAlias( $pgtitle );
		$pagename = $tmp[0];
		if( $pagename == "CreateAccount" ) {
			$qvalues = $out->getRequest()->getQueryValues();
			if( !empty( $qvalues ) ) {
	
				if( array_key_exists( "title", $qvalues ) && in_array( $qvalues["title"], array( 'Speciální:Vytvořit_účet', 'Special:CreateAccount' ) ) ) {
					// signup page
					// Change submit button text and position
					$out->mBodytext = preg_replace("/(id=\"wpCreateaccount\" .*?)value=\"[^\"]*\" ([^>]*>)([^<]*)/",
						"$1value=\"".$out->msg('cca-submit-button')->text()."\" $2".$out->msg('cca-submit-button')->text(),$out->mBodytext);
					// Append the text message
					$tm = "<div style='font-size:90%;margin:30px 0px 20px 0px;'>" . $out->msg('cca-agreement-' . $wgSitename)->text()."</div>\n";
					$out->mBodytext = preg_replace("/(<div class=\"mw-htmlform-field-HTMLSubmitField mw-ui-vform-field\">)/","$tm$1",$out->mBodytext);
				}
			}
		}
		return true;
	}

	
}