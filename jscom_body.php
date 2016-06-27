<?php
/**
 * JS Com extension - based on the JS Communicator
 *
 *
 *
 * You should add a brief comment explaining what the file contains and
 * what it is for. MediaWiki core uses the doxygen documentation syntax,
 * you're recommended to use those tags to complement your comment.
 * See the online documentation at:
 * http://www.stack.nl/~dimitri/doxygen/manual.html
 *
 * Here are commonly used tags, most of them are optional, though:
 *
 * First we tag this document block as describing the entire file (as opposed
 * to a variable, class or function):
 * @file
 *
 * We regroup all extensions documentation in the group named "Extensions":
 * @ingroup Extensions
 *
 * The author would let everyone know who wrote the code, if there is more
 * than one author, add multiple author annotations:
 * @author Keerthana K
 *
 * To mention the file version in the documentation:
 * @version 1.0
 *
 * The license governing the extension code:
 * @license GNU General Public Licence 2.0 or later
 */

/**
 * MediaWiki has several global variables which can be reused or even altered
 * by your extension. The very first one is the $wgExtensionCredits which will
 * expose to MediaWiki metadata about your extension. For additional
 * documentation, see its documentation block in includes/DefaultSettings.php
 */
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,

	// Name of your Extension:
	'name' => 'JSCom',

	// Sometime other patches contributors and minor authors are not worth
	// mentionning, you can use the special case '...' to output a localised
	// message 'and others...'.
	'author' => array(
		'Keerthana K'
	),

	'version'  => '0.1.0',

	// The extension homepage. www.mediawiki.org will be happy to host
	// your extension homepage.
	//'url' => 'https://www.mediawiki.org/wiki/Extension:Example',


	# Key name of the message containing the description.
	//'descriptionmsg' => 'jscom-desc',
);

/* Setup */

// Register special pages
// See also http://www.mediawiki.org/wiki/Manual:Special_pages
$wgSpecialPages['JSComm'] = 'SpecialJSComm';

// Register modules
// See also http://www.mediawiki.org/wiki/Manual:$wgResourceModules
// ResourceLoader modules are the de facto standard way to easily
// load JavaScript and CSS files to the client.

//***************** Adding .sh, .shtml, internationalisation :how??

$wgResourceModules['ext.Example.welcome'] = array(
	'scripts' => array(
		'JSCommunicator/Arbiter.js', 'JSCommunicator/config.js', 'JSCommunicator/event-demo.js', 'JSCommunicator/i18n.js', 'JSCommunicator/init.js', 'JSCommunicator/jquery.i18n.properties', 'JSCommunicator/jquery.js', 'JSCommunicator/jquery-ui.js', 'JSCommunicator/JSComm', 'JSCommunicator/JSCommManager', 'JSCommunicator/JSCommUI', 'JSCommunicator/jssip.js', 'JSCommunicator/jssip-helper.js', 'JSCommunicator/parseuri.js', 'JSCommunicator/webrtc-check.js' ),
	'styles' => array(
		'JSCommunicator/font-awesome.min.css', 'JSCommunicator/jquery-ui.css', 'JSCommunicator/skin.css', 'JSCommunicator/style.css', 'JSCommunicator/style-debrtc.css', 'JSCommunicator/style-event-demo.css','JSCommunicator/style-horizontal.css'
	),
	'messages' => array(
		'example-welcome-title-loggedout',
		'example-welcome-title-user',
		'example-welcome-color-label',
		'example-welcome-color-value',
	),
	'dependencies' => array(
		'mediawiki.util',
		'mediawiki.user',
		'mediawiki.Title',
	),

	'localBasePath' => $dir,
	'remoteExtPath' => 'examples/' . $dirbasename,
);

// Initialize an easy to use shortcut:
$dir = dirname( __FILE__ );
$dirbasename = basename( $dir );

// Register files
// MediaWiki need to know which PHP files contains your class. It has a
// registering mecanism to append to the internal autoloader. Simply use

class JSCom extends SpecialPage {
	/**
	 * @var AllMessagesTablePager
	 */
protected $d_name, $sip_uri, $d_pass;

public $destination, $dial_no, $a_or_v;
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct( 'jscom-desc' );
	}

	public function execute( $par ) {
		$request = $this->getRequest();
		$out = $this->getOutput();

		$this->setHeaders();

		$this->outputHeader( 'allmessagestext' );
		$out->addModuleStyles( 'mediawiki.special' );
		$this->addHelpLink( 'Help:System message' );


		$this->getOutput()->addHTML( $this->Destination() );
		
		);
	}

	public function Web_Socket() {

		//public $Websocket_conn, $registerrn, $deregisterrn; 

		//Transfer data 2&fro jscom files
	}

	public function errors() {

		//error is displayed accordingly
	}

	    function call_state() {

	
    protected $cs_switch;
	/* protected switching variable
	auto switch between:
		Call Dialling fn
		Call Incoming fn
		Call Accepted/Answering fn
		Call Connected fn */
	}

	function Session_Control() {

	protected $sc_switch;
	/* public switching variable
	manual switch between

		Cancel
		Reject
		Answer
		Answer with video **** - connect to fn videocall)
		//Hold
		Hangup
		Active */
	}

	function video_call() {

		public $remote_v, $self_v;

	}

	function chat_error() {

		//No destination specified
	}

	private function Destination() {
		$form = Html::openElement( 'fieldset' ) . "\n";
		$form .= Html::element(
			'legend',
			array(),
			$this->msg( 'destination-details' )->text()
		) . "\n";
		$form .= Html::openElement( 'form', array( 'method' => 'get', 'action' => wfScript() ) ) . "\n";
		//$form .= Html::hidden( 'title', $this->getPageTitle()->getPrefixedText() ) . "\n";
		$form .= '<p>' . Xml::inputLabel(
			$this->msg( 'enter-name' )->text(),
			'd_name',
			'd_name',
			30,
			$this->d_name,
			array( 'autofocus' => '', 'class' => 'mw-ui-input-inline' )
		);

		$d_name = $form;

		$form .= Html::openElement( 'form', array( 'method' => 'get', 'action' => wfScript() ) ) . "\n";
		//$form .= Html::hidden( 'title', $this->getPageTitle()->getPrefixedText() ) . "\n";
		$form .= '<p>' . Xml::inputLabel(
			$this->msg( 'enter-sip-uri' )->text(),
			'sip_uri',
			'sip_uri',
			40,
			$this->sip_uri,
			array( 'autofocus' => '', 'class' => 'mw-ui-input-inline' )
		);

		$sip_uri = $form;

		$form .= Html::openElement( 'form', array( 'method' => 'get', 'action' => wfScript() ) ) . "\n";
		//$form .= Html::hidden( 'title', $this->getPageTitle()->getPrefixedText() ) . "\n";
		$form .= '<p>' . Xml::inputLabel(
			$this->msg( 'enter-password' )->text(),
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
			$this->getOutput()->addHTML( $this->Caller() );,
			array( 'autofocus' => '', 'class' => 'mw-ui-input-inline' )
		);

		$d_caller = $form;

		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'call-details' )->text(),
			array(), array( 'mw-ui-progressive' )
		) . "</p>\n";

		$form .= Html::closeElement( 'form' ) . "\n";
		$form .= Html::closeElement( 'fieldset' ) . "\n";

		//return $form;
	}

	private function dialer() {

		$form .= Html::openElement( 'form', array( 'method' => 'get', 'action' => wfScript() ) ) . "\n";

		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'one' )->text(),
			array(), array( 'mw-ui-progressive' )
		)

		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'two' )->text(),
			array(), array( 'mw-ui-progressive' )
		) 

		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'three' )->text(),
			array(), array( 'mw-ui-progressive' )
		) 

		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'four' )->text(),
			array(), array( 'mw-ui-progressive' )
		)
		
		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'five' )->text(),
			array(), array( 'mw-ui-progressive' )
		)

		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'six' )->text(),
			array(), array( 'mw-ui-progressive' )
		)
		
		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'seven' )->text(),
			array(), array( 'mw-ui-progressive' )
		)
		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'eight' )->text(),
			array(), array( 'mw-ui-progressive' )
		)
		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'nine' )->text(),
			array(), array( 'mw-ui-progressive' )
		)
		
		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'asterix' )->text(),
			array(), array( 'mw-ui-progressive' )
		)
		
		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'zero' )->text(),
			array(), array( 'mw-ui-progressive' )
		)
		
		$form .= '&#160;' . Html::submitButton(
			$this->msg( 'hash' )->text(),
			array(), array( 'mw-ui-progressive' )
		)

		$form .= Html::closeElement( 'form' ) . "\n";
		

	}

}


