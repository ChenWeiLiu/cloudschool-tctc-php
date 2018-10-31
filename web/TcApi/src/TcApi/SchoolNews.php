<?php
/**
 * Created by PhpStorm.
 * User: liuchenwei
 * Date: 2018/10/17
 * Time: 11:29 AM
 */

namespace TcApi;


class SchoolNews extends TcApi
{
    public function __construct()
    {
        parent::__construct();
        $this->method = "POST";
        $this->apiName = 'school-news';
    }

    /**
     * @return resource
     */
    public function getListAll($page = null)
    {
        if ($page) {
            $this->apiName = 'school-news?page=' . $page;
        }
        $json_array = [
            'action' => 'list-all'
        ];
        return $this->getData($json_array);
    }

    public function getID($id = null)
    {
        $json_array = [
            'action' => 'get',
            'id' => $id
        ];
        return $this->getData($json_array);
    }
}