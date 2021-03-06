<?PHP

require_once('api/Admin.php');

class PostAdmin extends Admin
{
	public function fetch()
	{
		if($this->request->method('post'))
		{
			$post->id = $this->request->post('id', 'integer');
			$post->name = $this->request->post('name');
            $post->name_en = $this->request->post('name_en');
			$post->date = date('Y-m-d', strtotime($this->request->post('date')));
			
			$post->visible = $this->request->post('visible', 'boolean');

			$post->url = $this->request->post('url', 'string');
			$post->meta_title = $this->request->post('meta_title');
			$post->meta_keywords = $this->request->post('meta_keywords');
			$post->meta_description = $this->request->post('meta_description');
			
			$post->annotation = $this->request->post('annotation');
            $post->annotation_en = $this->request->post('annotation_en');
			$post->text = $this->request->post('body');
            $post->text_en = $this->request->post('body_en');

 			// Не допустить одинаковые URL разделов.
			if(($a = $this->blog->get_post($post->url)) && $a->id!=$post->id)
			{			
				$this->design->assign('message_error', 'url_exists');
			}
			else
			{
				if(empty($post->id))
				{
	  				$post->id = $this->blog->add_post($post);
	  				$post = $this->blog->get_post($post->id);
					$this->design->assign('message_success', 'added');
	  			}
  	    		else
  	    		{
  	    			$this->blog->update_post($post->id, $post);
  	    			$post = $this->blog->get_post($post->id);
					$this->design->assign('message_success', 'updated');
  	    		}	

   	    		
			}
		}
		else
		{
			$post->id = $this->request->get('id', 'integer');
			$post = $this->blog->get_post(intval($post->id));
		}

		if(empty($post->date))
			$post->date = date($this->settings->date_format, time());
 		
		$this->design->assign('post', $post);
		
		
 	  	return $this->design->fetch('post.tpl');
	}
}