<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SchoolController extends AbstractActionController
{
    public function indexAction()
    {
        $mysqlConn = [
            'host' => "mysqldb",
            'user' => "root",
            'password' => "root",
            'dbname' => "school_cms",
            'charset' => "utf8mb4"
        ];

        $dsn = 'mysql:host=' . $mysqlConn['host'] . ';dbname=' . $mysqlConn['dbname'] . ';charset=' . $mysqlConn['charset'];

        $mysqlPdo = new \PDO($dsn, $mysqlConn['user'], $mysqlConn['password']);

        $sql = "SELECT * FROM student";

        $arr = $mysqlPdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

//        print_r($arr);

        $viewModel = new ViewModel();

        $viewModel->setVariable('data',$arr);

        return $viewModel;
    }
    
    public function helpAction()
    {
        echo "test";
    }
}
