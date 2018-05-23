<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 18/05/18
 * Time: 10:30
 */

namespace AppBundle\Repository\Interfaces;


interface RepoInterface
{

    public function find($id);
    public function findAll();


}