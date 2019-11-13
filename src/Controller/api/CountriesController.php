<?php
namespace App\Controller;

use App\Controller\AppController;

class CountriesController extends AppController
{
    
    
    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150,
/*        'fields' => [
            'id', 'name'
        ],
*/        'sortWhitelist' => [
            'id', 'name'
        ]
    ];
    
    
   
}
