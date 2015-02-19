<?php
  
   $connectToMongoDB = new MongoClient();
   $MongoDatabase = $connectToMongoDB->myblogspots; //Connect to Database Like mysql_select_db
   
   $collection = $MongoDatabase->createCollection("blogposts"); //collection is something like table in mysql
   
   
   /*Insert Into MongoDB*/
   
   $document = array( 
      "title" => "Political Geography of Middle East", 
      "description" => "Body of Blogspot", 
      "author" => "Apolon Pachulia",
      "category" => "Geography",
      "language", "ENG"
   );
   $collection->insert($document);
   
   
   /*Select From MongoDB*/
   
   $cursor = $collection->find();
    
   foreach ($cursor as $document) {
   
      echo $document["title"];
      
   }
   
   
    /*Update in MongoDB*/
    
    
    
   $collection->update(array("title"=>"Political Geography of Middle East"), array('$set'=>array("title"=>"Political Geography of Far East")));
   
   $cursor = $collection->find();

   
   foreach ($cursor as $document) {
      echo $document["title"];
   }
   
   
   /*Delete something in MongoDB*/
   
   
    
   $collection->remove(array("title"=>"Political Geography of Middle East"),false);
   
   $cursor = $collection->find();
   
   foreach ($cursor as $document) {
      echo $document["title"];
   }
   
?>
