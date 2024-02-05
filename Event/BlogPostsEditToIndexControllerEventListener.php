<?php
class BlogPostsEditToIndexControllerEventListener extends BcControllerEventListener {
	public $events = array(
		'Blog.BlogPosts.afterEdit',
		'Blog.BlogPosts.afterAdd',
		);

	/**
	 * blogBlogPostsAfterEdit
	 *
	 * @param CakeEvent $event
	 */
	public function blogBlogPostsAfterEdit(CakeEvent $event) {
		return $this->_toIndex($event);
	}
	/**
	 * blogBlogPostsAfterEdit
	 *
	 * @param CakeEvent $event
	 */
	public function blogBlogPostsAfterAdd(CakeEvent $event) {
		return $this->_toIndex($event);
	}

	private function _toIndex($event) {
		$Controller = $event->subject();
		$admin = Configure::read('Routing.prefixes', array('cmsadmin'));
		if (is_array($admin)  && !empty($admin[0])) {
			$admin = $admin[0];
		} else {
			$admin = 'admin';
		}
		$entity_id = $Controller->blogContent['BlogContent']['id'];
		$url = '/'. $admin. '/blog/blog_posts/index/'. $entity_id;

		$Controller->redirect($url);
		exit;
	}


}
