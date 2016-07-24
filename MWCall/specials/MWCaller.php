
<?php
/**
 * Main Page for Media Wiki Caller
 *
 * @file
 * @ingroup Extensions
 */

class SpecialMWCaller extends SpecialPage {


	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		// A special page should at least have a name.
		// We do this by calling the parent class (the SpecialPage class)
		// constructor method with the name as first and only parameter.
		parent::__construct( 'MWCall' );
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub: The subpage string argument (if any).
	 *  [[Special:HelloWorld/subpage]].
	 */
	public function execute( $sub ) {
		global $isbn, $d_name, $sip_uri, $d_pass;
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'mw-caller' ) );

		// Parses message from .i18n.php as wikitext and adds it to the
		// page output.
		$out->addWikiMsg( 'mw-caller-intro' );
		$out = $this->getOutput();
		/*$out->addWikiMsg( 'mw-caller-intro' );
		$out = $this->getOutput();*/

    	//$out->addWikimsg( 'example-hello_world' );
    	//$out->addWikimsg( 'example-hello_world', $wgRequest->getText( 'name' ));
    	//$isbn = $this->getRequest()->getText( 'isbn' ) ;
    	$this->getOutput()->addHTML( $this->Callerfn() );
    	//$this->getOutput()->addHTML( $this->Registration() );
    	//If videoCall then,
    	//$this->getOutput()->addHTML( $this->VideoCallOptions() );
	}

	protected function getGroupName() {
		return 'other';
	}

		private function Callerfn() {

			global $d_name, $d_pass, $sip_uri;

		$form = Html::openElement( 'fieldset' ) . "\n";
		$form .= Html::element(
			'legend',
			array(),
			$this->msg( 'destination-details' )->text()
		) . "\n";
		$form .= Html::openElement( 'form', array( 'method' => 'get', 'action' => wfScript() ) ) . "\n";
		//$form .= Html::hidden( 'title', $this->getPageTitle()->getPrefixedText() ) . "\n";
		$form .= '<p>' . Xml::inputLabel(
			$this->msg( 'enter-contact' )->text(),
			'd_name',
			'd_name',
			30,
			$this->d_name,
			array( 'autofocus' => '', 'class' => 'mw-ui-input-inline' )
		);

		$form .= Html::openElement( 'form', array( 'method' => 'get', 'action' => wfScript() ) ) . "\n";
		//$form .= Html::hidden( 'title', $this->getPageTitle()->getPrefixedText() ) . "\n";
		$form .= '<p>' . Xml::inputLabel(
			$this->msg( 'enter-d-name' )->text(),
			'sip_uri',
			'sip_uri',
			40,
			$this->sip_uri,
			array( 'autofocus' => '', 'class' => 'mw-ui-input-inline' )
		);

		/*$form .= Html::openElement( 'form', array( 'method' => 'get', 'action' => wfScript() ) ) . "\n";
		//$form .= Html::hidden( 'title', $this->getPageTitle()->getPrefixedText() ) . "\n";
		$form .= '<p>' . Xml::inputLabel(
			$this->msg( 'enter-d-password' )->text(),
			'd_pass',
			'd_pass',
			20,
			$this->d_pass,
			array( 'autofocus' => '', 'class' => 'mw-ui-input-inline' )
		);

		$d_pass = $form;

		$form .= Html::openElement( 'form', array( 'method' => 'get', 'action' => wfScript() ) ) . "\n";
		//$form .= Html::hidden( 'title', $this->getPageTitle()->getPrefixedText() ) . "\n";
		$form .= '<p>' . Xml::inputLabel(
			$this->msg( 'enter-contact' )->text(),
			'd_caller',
			'd_caller',
			30,
			$this->d_name,
			array( 'autofocus' => '', 'class' => 'mw-ui-input-inline' )
		);

		$d_caller = $form;*/

		$form .=  Xml::openElement( 'form', array(
				'method' => 'get',
				'action' => $this->getConfig()->get( 'Script' ),
				'id' => 'mw-allmessages-form'
			) ) . "</td>\n</tr>\n<p>" . 
			Xml::radioLabel( $this->msg( 'call-audio' )->text(),
				'call-type',
				'audio',
				'mw-allmessages-form-filter-unmodified',
				( $this->filter === 'audio' )
			) .
			Xml::radioLabel( $this->msg( 'call-video' )->text(),
				'call-type',
				'video',
				'mw-allmessages-form-filter-all',
				( $this->filter === 'video' )
			) .
			"</td>\n</tr>" ;

			//Xml::closeElement( 'form' ) .
			//$this->getHiddenFields( array( 'title', 'prefix', 'filter', 'lang', 'limit' ) ) .
		$form .= '<p>' . Xml::element( 'input',
				array(
					'type' => 'submit',
					'value' => $this->msg( 'call' )->escaped()
				),
				''
			) .
			Xml::closeElement('input').
			Html::closeElement( 'form' ) .
			Html::closeElement( 'fieldset' );
			

		//eturn $out;

		return $form;

		
	}
	/*private function Registration() {

		$form = Html::openElement( 'fieldset' ) . "\n";
		$form .= Html::element(
			'legend',
			array(),
			$this->msg( 'sip-registration' )->text()
		) . "\n";

		$form .=  Xml::openElement( 'form', array(
				'method' => 'get',
				'action' => $this->getConfig()->get( 'Script' ),
				'id' => 'mw-allmessages-form'
			) ) . "</td>\n</tr>\n<p>" . 
			Xml::radioLabel( $this->msg( 'register-sip' )->text(),
				'call-type',
				'audio',
				'mw-allmessages-form-filter-unmodified',
				( $this->filter === 'audio' )
			) .
			Xml::radioLabel( $this->msg( 'unregister-sip' )->text(),
				'call-type',
				'video',
				'mw-allmessages-form-filter-all',
				( $this->filter === 'video' )
			) .
			"</td>\n</tr>" .

			//Xml::closeElement( 'form' ) .
			//$this->getHiddenFields( array( 'title', 'prefix', 'filter', 'lang', 'limit' ) ) .
			//Html::closeElement( 'form' ) .
			Html::closeElement( 'fieldset' );


		return $form;
	}

	private function VideoCallOptions() {

		$this->getOutput()->addHTML( $this->VideoRemoteView() );

		$this->getOutput()->addHTML( $this->VideoSelfView() );

	}

	private function VideoRemoteView() {

		$form = Html::openElement( 'fieldset' ) . "\n";
		$form .= Html::element(
			'legend',
			array(),
			$this->msg( 'video-call-options' )->text()
		) . "\n";

		$form .=  Xml::openElement( 'form', array(
				'method' => 'get',
				'action' => $this->getConfig()->get( 'Script' ),
				'id' => 'mw-allmessages-form'
			) ) . "</td>\n</tr>\n<p>" . 
			Xml::radioLabel( $this->msg( 'enable-remote-view' )->text(),
				'call-type',
				'audio',
				'mw-allmessages-form-filter-unmodified',
				( $this->filter === 'audio' )
			) .
			Xml::radioLabel( $this->msg( 'disable-remote-view' )->text(),
				'call-type',
				'video',
				'mw-allmessages-form-filter-all',
				( $this->filter === 'video' )
			) .
			"</td>\n</tr>";
			return $form;
	}

	private function VideoSelfView() {

		//$form = Html::openElement( 'fieldset' ) . "\n";
		/*$form .= Html::element(
			'legend',
			array(),
			$this->msg( 'Video-Call-Options' )->text()
		) . "\n";*/

		/*$form .=  Xml::openElement( 'form', array(
				'method' => 'get',
				'action' => $this->getConfig()->get( 'Script' ),
				'id' => 'mw-allmessages-form'
			) ) . "</td>\n</tr>\n<p>" . 
			Xml::radioLabel( $this->msg( 'enable-self-view' )->text(),
				'call-type',
				'audio',
				'mw-allmessages-form-filter-unmodified',
				( $this->filter === 'audio' )
			) .
			Xml::radioLabel( $this->msg( 'disable-self-view' )->text(),
				'call-type',
				'video',
				'mw-allmessages-form-filter-all',
				( $this->filter === 'video' )
			) .
			"</td>\n</tr>";

			//Xml::closeElement( 'form' ) .
			//$this->getHiddenFields( array( 'title', 'prefix', 'filter', 'lang', 'limit' ) ) .
			//Html::closeElement( 'form' ) .
			//Html::closeElement( 'fieldset' );
		//eturn $out;

		return $form;

	}*/
}