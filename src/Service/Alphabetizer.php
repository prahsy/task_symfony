<?php
/**
 * Created by PhpStorm.
 * User: panthro
 * Date: 30/11/18
 * Time: 00:33
 */

namespace App\Service;

/**
 * Class Alphabetizer
 * @package App\Service
 * requires sting
 * 
 * returns sorted array
 * => Asc
 * =>Desc
 */
class Alphabetizer
{
    private $list;

    public function __construct(string $list)
    {
        $this->list = $list;
    }

    /*
     * Sorts list
     */
    public function sortAsc()
    {
        $listArray = explode("\n", str_replace("\r", "", $this->list));

        asort($listArray);

       return $listArray;

    }

    public function sortDesc()
    {
        $listArray = explode("\n", str_replace("\r", "", $this->list));

        rsort($listArray);

        return $listArray;
    }


}