<?php
/**
 * Feedreader Class
 * This class read and display feeds from a given  RSS url.
 * @author Jean Paul Delaye 
 */

class feedreader  {
	
	 public $url="";
	 
	
	 public function __construct($url, $maxfedd) {
    
	     $this->url = $url;  
         $this->maxfedd = $maxfedd; 
        //Check if the url is working  
        if(@simplexml_load_file($this->url)){
            $feeds = simplexml_load_file($this->url);
        }else{
            $invalidurl = true;
            echo "<h2> RSS feed is not working.</h2>";
        }
        $i=0;
		$out="";
        //check if the URL is not epmty.
        if(!empty($feeds)){
            $site = $feeds->channel->title;
            $sitelink = $feeds->channel->link;
            //Page title
            echo "<h1>".$site."</h1>"." total of feeds: ".count($feeds->channel->item);
            foreach ($feeds->channel->item as $item) {
                
                $title = $item->title;
                $link = $item->link;
                $description = $item->description;
                $postDate = $item->pubDate;
                $pubDate = date('D, d M Y',strtotime($postDate));
                
               if($i>=$this->maxfedd) break; // break when limit of feed are reached
       
 			$out.='
                <div class="post">
                    <div class="post-head">
                        <!--Title-->
                        <h2><a class="feed_title" href="'.$link.'">'.$title.'</a></h2>
                        <span>'.$pubDate.'</span> <!--Post date-->
                    </div>
                    <!-- Body-->
                    <div class="post-content">
                       '.$description.' <a href="'.$link.'">Read more</a> 
				  <!-- Read more-->
                    </div>
                </div>
               ';
                $i++;
            }
        }else{
            //Error 
            if(!$invalidurl){
                echo "<h2>Nothing to read</h2>";
            }
        }
		 
		 echo $out;
    		 
		  }
		 
		
	 }
