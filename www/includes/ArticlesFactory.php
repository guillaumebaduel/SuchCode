<?php
/*
** ArticlesFactory.php
*/

class Article {

	public $id;

	public $title;

	public $pic;

	public $date;

    function __construct() {
		
		$this->id = 0;
		$this->title = 'default title';
		$this->pic = 'https://assets.entrepreneur.com/content/16x9/822/20141216174043-vision-healthier-workplace-sitting-not-allowed-barbara-visser.jpeg';
		$this->date = '17/11/2015';		
    }  

    public function getId($id) {
    	return $id;
    } 

    public function setId($id) {
    	$this->id = $id;
    }

    public function getTitle() {
    	return $title;
    }

    public function setTitle($title) {
    	$this->title = $title;
    }

    public function getPic() {
    	return $pic;
    }

    public function setPic($pic) {
    	$this->pic = $pic;
    }

    public function getDate() {
    	return $date;
    }

    public function setDate($date) {
    	$this->date = $date;
    }
}

class ArticleFactory
{
    public static function build($article) {

        $class = "Article";
        if (class_exists($class)) {
        	$object = new $class();

        	$object->setId($article['id']);
        	$object->setTitle($article['title']);
        	//$object->setPic($article['image']);
        	$object->setDate($article['date']);
			
            return $object;
        }
        else {
            throw new Exception("Invalid article type given.");
        }
    } 
}

class Articles extends Article {

  	private static $_instance = null;
  	public $key = 0;

    function __construct() {
    	 $this->key = 0;		  
    }  

 	public static function getInstance() {


	     if(is_null(self::$_instance)) {
	       self::$_instance = new Articles();  
	     }
	 
	     return self::$_instance;
    }
     
    public function getArticles() {
    	return $articles;
    }

    public function addArticle($article) {
    	$this->_instance[$this->key] = $article;
    	$this->key++;
    }

    public function appendArticles($articles) {



    	foreach ($articles as $article) {
    		$article = ArticleFactory::build($article);
    	    $this->addArticle($article);   
		}
    }
 
    public function getArray($articles) {
		$arrays = (array)$articles;
		foreach ($arrays as $items)
		{
			if ($items)
			{
				$articleArray = (array)$items;
			}
		}
		return $articleArray;
    }
 }


?>