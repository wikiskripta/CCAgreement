<?php

/**
 * All hooked functions used by CCAgreement
 * @ingroup Extensions
 * @author Josef Martiňák
 */

class CCAgreementHooks {

	/**
	 * Function for BeforePageDisplay hook
	 * Add agreement with policy to the registration page
	 * @param object $skin: instance of Skin object
	 * @param string &$out: instance of Output object
	 * @return Boolean: true
	 */
	public static function AddLicencing(&$out,&$skin) {
		global $wgSitename;
		$title = $skin->getTitle();
		if($title->getBaseTitle() == SpecialPage::getTitleFor('CreateAccount')->getBaseTitle()) {
			// Change submit button text and position
			$out->mBodytext = preg_replace("/(id=\"wpCreateaccount\" .*?)value=\"[^\"]*\" ([^>]*>)([^<]*)/",
				"$1value=\"".$out->msg('cca-submit-button')->text()."\" $2".$out->msg('cca-submit-button')->text(),$out->mBodytext);
			// Append the text message
			$tm = "<div style='font-size:90%;margin:30px 0px 20px 0px;'>" . $out->msg('cca-agreement-' . $wgSitename)->text()."</div>\n";
			$out->mBodytext = preg_replace("/(<div class=\"mw-htmlform-field-HTMLSubmitField cdx-field\">)/","$tm$1",$out->mBodytext);
			                                               
		}
		/*
		elseif($title->getBaseTitle() == SpecialPage::getTitleFor('RequestAccount')->getBaseTitle()) {
			$tm = preg_replace("/<br\/>/", " ", $out->msg('cca-agreement-' . $wgSitename)->text());
			$out->mBodytext = preg_replace('/<label for="wpToS">[^<]*<\/label>/', '<label for="wpToS">' . $tm . '</label>', $out->mBodytext);
			//$out->mBodytext .= $tm;
		}
		*/
		return true;
	}
}
