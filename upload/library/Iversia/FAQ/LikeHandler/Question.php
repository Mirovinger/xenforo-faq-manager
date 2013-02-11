<?php

class Iversia_FAQ_LikeHandler_Question extends XenForo_LikeHandler_Abstract
{
	public function incrementLikeCounter($contentId, array $latestLikes, $adjustAmount = 1)
	{
		$writer = XenForo_DataWriter::create('Iversia_FAQ_DataWriter_Question');
		$writer->setExistingData($contentId);
		$writer->set('likes', $writer->get('likes') + $adjustAmount);
		$writer->set('like_users', $latestLikes);
		$writer->save();
	}

	public function getContentData(array $contentIds, array $viewingUser)
	{
		$qustionModel = XenForo_Model::create('Iversia_FAQ_Model_Question');

		return $questionModel->getById($contentIds);

		/*
		alert_{contentType}_like
		*/
	}

	public function getListTemplateName()
	{
		// news_feed_item_{contentType}_like
		return 'news_feed_item_xf_faq_question_like';
	}
}