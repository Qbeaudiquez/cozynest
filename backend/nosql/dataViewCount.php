<?php 

function getViewArticle($dbMangoConnect, $articleId) {
    $mongoCollection = 'viewCount';
    $mongoDb = 'cozynest';
    $filter = ['article_id' => (int)$articleId];
    $query = new MongoDB\Driver\Query($filter);

    try {

        $cursor = $dbMangoConnect->executeQuery("$mongoDb.$mongoCollection", $query);
        
        $viewData = current($cursor->toArray());


        if ($viewData) {
            $viewsCount = $viewData->views_count;
        } else {
            $viewsCount = 0;
        }
    } catch (MongoDB\Driver\Exception\Exception $e) {

        echo "Erreur MongoDB : " . $e->getMessage();
        $viewsCount = 0;
    }

    return $viewsCount;
}

function getTotalViews($dbMangoConnect) {
    $mongoCollection = 'viewCount';
    $mongoDb = 'cozynest';
    
    // Définition du pipeline d'agrégation
    $pipeline = [
        ['$group' => [
            '_id' => null,
            'totalViews' => ['$sum' => '$views_count']
        ]]
    ];

    try {
        // Utilisation de executeCommand avec l'option 'cursor'
        $command = new MongoDB\Driver\Command([
            'aggregate' => $mongoCollection,
            'pipeline' => $pipeline,
            'cursor' => new stdClass()  // Ajouter l'option 'cursor'
        ]);
        
        $cursor = $dbMangoConnect->executeCommand($mongoDb, $command);

        $result = current($cursor->toArray());

        if ($result) {
            return $result->totalViews;
        } else {
            return 0;
        }
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "Erreur MongoDB : " . $e->getMessage();
        return 0;
    }
}
