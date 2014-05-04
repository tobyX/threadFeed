<?php
namespace wbb\data\post;
use wcf\system\language\LanguageFactory;
use wcf\system\WCF;

/**
 * Represents a list of posts.
 *
 * @author		Tobias Friebel
 * @copyright	2014 Tobias Friebel
 * @license		Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International <http://creativecommons.org/licenses/by-nc-nd/4.0/deed.en>
 * @package		com.toby.threadfeed
 */
class FeedPostList extends ViewablePostList {
	/**
	 * @see	\wcf\data\DatabaseObjectList::$decoratorClassName
	 */
	public $decoratorClassName = 'wbb\data\post\FeedPost';

	/**
	 * Creates a new FeedPostList object.
	 *
	 * @param	integer		$threadID
	 */
	public function __construct($threadID) {
		parent::__construct();

		$this->getConditionBuilder()->add('post.threadID = ?', array($threadID));

		$this->getConditionBuilder()->add('post.isDeleted = 0');
		$this->getConditionBuilder()->add('post.isDisabled = 0');

		$this->sqlJoins .= " LEFT JOIN wbb".WCF_N."_thread thread ON (thread.threadID = post.threadID)";

		// apply language filter
		if (LanguageFactory::getInstance()->multilingualismEnabled() && count(WCF::getUser()->getLanguageIDs())) {
			$this->getConditionBuilder()->add('(thread.languageID IN (?) OR thread.languageID IS NULL)', array(WCF::getUser()->getLanguageIDs()));
		}
	}
}
