<?php

class rex_api_structureConcept extends rex_api_function
{
    protected $published = true;
    
    public function execute()
    {
        $func = rex_request( 'func','string','' );
        
        if( $func == 'create' )
        {
            self::createSlice();
        }
        else if( $func == 'update' )
        {
            self::updateSlice();
        }
    }
    
    private static function createSlice()
    {
        $moduleId = rex_request( 'module_id','string','' );
        $articleId = rex_request( 'article_id','string','' );
        
        $sql = rex_sql::factory();
        $sql->setDBQuery('INSERT INTO rex_article_slice (module_id,article_id,clang_id,ctype_id,value1,value2) VALUES ("'.$moduleId.'","'.$articleId.'",1,1,"Lorem ipsum","Dolor sit amet") ');
        rex_article_cache::delete($articleId);
        
        echo $sql->getLastId();
        
        exit();
    }
    
    private static function updateSlice()
    {
        $value = rex_request( 'rex-value','string','' );
        $slice = rex_request( 'rex-slice','string','' );
        $data = rex_request( 'data','string','' );
        
        $sql = rex_sql::factory();
        $sql->setDebug(true);
        $sql->setDBQuery('UPDATE rex_article_slice SET '.$value.'="'.rex_escape($data).'" WHERE id='.$slice);
        
        $sql = rex_sql::factory();
        $sql->setDebug(true);
        $sql->setTable('rex_article_slice');
        $sql->setWhere('id = "'.$slice.'"');
        $sql->select('*');
        rex_article_cache::delete($sql->getValue('article_id'));
        
        exit();
    }
}

?>