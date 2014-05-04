<?php
namespace wbb\data\post;

use wcf\data\IFeedEntry;

/**
 * Represents a viewable post for RSS feeds.
 *
 * @author Tobias Friebel
 * @copyright 2014 Tobias Friebel
 * @license Creative Commons Attribution-NonCommercial-NoDerivatives 4.0
 *          International
 *          <http://creativecommons.org/licenses/by-nc-nd/4.0/deed.en>
 * @package com.toby.threadfeed
 */
class FeedPost extends ViewablePost implements IFeedEntry
{

	/**
	 *
	 * @see \wcf\data\ILinkableObject::getLink()
	 */
	public function getLink()
	{
		return $this->getDecoratedObject()->getLink();
	}

	/**
	 *
	 * @see \wcf\data\ITitledObject::getTitle()
	 */
	public function getTitle()
	{
		return $this->getDecoratedObject()->getTitle();
	}

	/**
	 *
	 * @see \wcf\data\IMessage::getFormattedMessage()
	 */
	public function getFormattedMessage()
	{
		return $this->getDecoratedObject()->getFormattedMessage();
	}

	/**
	 * Returns a simplified version of the formatted message.
	 *
	 * @return string
	 */
	public function getSimplifiedFormattedMessage()
	{
		return $this->getDecoratedObject()->getSimplifiedFormattedMessage();
	}

	/**
	 *
	 * @see \wcf\data\IMessage::getMessage()
	 */
	public function getMessage()
	{
		return $this->getDecoratedObject()->getMessage();
	}

	/**
	 *
	 * @see \wcf\data\IMessage::getExcerpt()
	 */
	public function getExcerpt($maxLength = 255)
	{
		return $this->getDecoratedObject()->getExcerpt();
	}

	/**
	 *
	 * @see \wcf\data\IMessage::getUserID()
	 */
	public function getUserID()
	{
		return $this->getDecoratedObject()->getUserID();
	}

	/**
	 *
	 * @see \wcf\data\IMessage::__toString()
	 */
	public function __toString()
	{
		return $this->getDecoratedObject()->__toString();
	}

	/**
	 *
	 * @see \wcf\data\IFeedEntry::getComments()
	 */
	public function getComments()
	{
		return 0;
	}

	/**
	 *
	 * @see \wcf\data\IFeedEntry::getCategories()
	 */
	public function getCategories()
	{
		return array ();
	}

	/**
	 *
	 * @see \wcf\data\IMessage::getTime()
	 */
	public function getTime()
	{
		return $this->getDecoratedObject()->getTime();
	}

	/**
	 *
	 * @see \wcf\data\IMessage::isVisible()
	 */
	public function isVisible()
	{
		return $this->getDecoratedObject()->isVisible();
	}

	/**
	 *
	 * @see \wcf\data\IUserContent::getUsername()
	 */
	public function getUsername()
	{
		return $this->getDecoratedObject()->getUsername();
	}
}
