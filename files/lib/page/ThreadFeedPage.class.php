<?php
namespace wbb\page;
use wbb\data\post\FeedPostList;
use wcf\page\AbstractFeedPage;
use wcf\system\exception\IllegalLinkException;
use wbb\data\thread\ViewableThread;

class ThreadFeedPage extends AbstractFeedPage
{
	/**
	 * offset for paginated calls
	 *
	 * @var	integer
	 */
	public $offset = 0;

	/**
	 * limit of entries for paginated calls
	 *
	 * @var integer
	 */
	public $limit = 20;

	/**
	 * @see	\wcf\page\IPage::readParameters()
	 */
	public function readParameters()
	{
		parent::readParameters();

		if (isset($_REQUEST['offset']))
			$this->offset = intval($_REQUEST['offset']);

		if (isset($_REQUEST['limit']))
			$this->limit = intval($_REQUEST['limit']);
	}

	/**
	 * @see	\wcf\page\IPage::readData()
	 */
	public function readData() {
		parent::readData();

		// we support only one thread at a time
		if (count($this->objectIDs) != 1)
			throw new IllegalLinkException();

		$threadID = $this->objectIDs[0];

		// read the threads
		$this->items = new FeedPostList($threadID);
		$this->items->sqlLimit = $this->limit;
		$this->items->sqlOffset = $this->offset;
		$this->items->readObjects();

		// set title
		$thread = ViewableThread :: getThread($threadID);
		$this->title = $thread->getTitle();
	}
}
