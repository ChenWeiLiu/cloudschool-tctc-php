<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceManager;
use Zend\View\Model\ViewModel;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $config = $this->getServiceManager()->get('Config');
        $db = $config['db'];
        $dsn = 'mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'] . ';charset=' . $db['charset'];

        $mysqlPdo = new \PDO($dsn, $db['user'], $db['password']);

        $sql = "SELECT * FROM student";

        $arr = $mysqlPdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

        $viewModel = new ViewModel();

        $viewModel->setVariable('data',$arr);
        return $viewModel;

    }

    public function helpAction()
    {
        $arr = [
            'abc' => '1234',
            'def' => '5050505'
        ];
        $viewModel = new ViewModel();
        $viewModel-> setVariable('data', $arr);
        return $viewModel;
    }
}
