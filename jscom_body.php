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


		this->table = new NetworkControl(
			$this,
			array(),
		);
	}

	public function Web_Socket() {

		// public Websocket_conn, registerrn, deregisterrn; 

	}

	public function errors() {

		//error is displayed accordingly
	}




}

class NetworkControl {

    protected $con_name, $sip_uri, $sip_pass;

    // public $destination, $dialled number, $a_or_v **** - connect to videocall

    // Build form to input values. Use xml and html tags

    function call_state() {

	/* protected switching variable
	auto switch between:
		Call Dialling fn
		Call Incoming fn
		Call Accepted/Answering fn
		Call Connected fn */
	}

	function Session_Control() {

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

		//pubic remote_v, self_v;

	}

}

class  Chat {

	protected $con_name, $sip_uri, $sip_pass;
	// public $destination

	function chat_error() {

		//No destination specified
	}

}

