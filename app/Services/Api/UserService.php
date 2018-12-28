<?php
/**
 * Created by PhpStorm.
 * User: samina-mac-mini
 * Date: 2/1/18
 * Time: 2:49 PM
 */

namespace App\Services\Api;


use App\Exceptions\Api\ItemNotFoundException;
use App\Services\CommonService;
use App\Services\ConstantStatusService;
use App\User;

class UserService
{
    private $user;

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->user = new User();
        $this->commonService = new CommonService();
    }

    /**
     * @return mixed
     *
     */
    function getAllArticles()
    {
        return $this->user->paginate(50);

    }

    /**
     * @param $id
     * @return mixed
     */
    function findById($id)
    {
        return $this->user->find($id);
    }

    /**
     * @param $data
     * @return static
     */
    function store($data)
    {

        return $this->user->create($data);
    }

    /**
     * @param $email
     * @return mixed
     */
    function checkEmail($email, $data)
    {

        $user = $this->user->where('email', $email)->first();
        if ($user == null)

            return $this->commonService->errorCustomError($this->itemNotFound(), null, ConstantStatusService::NOTFOUNDSTATUS);
        $user->update($data);
        return $user;
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     * @throws ItemNotFoundException
     */
    function update($id, $data)
    {
        $article = $this->user->find($id);
        if ($article == null)
            return $this->commonService->errorCustomError($this->itemNotFound(), null, ConstantStatusService::NOTFOUNDSTATUS);

        $article->update($data);
        return $article;

    }

    /**
     * @param $id
     * @return mixed
     * @throws ItemNotFoundException
     */
    function deleteByID($id)
    {
        $article = $this->user->find($id);

        if ($article == null)
            return $this->commonService->errorCustomError($this->itemNotFound(), null, ConstantStatusService::NOTFOUNDSTATUS);

        return $article->delete();

    }

    function itemNotFound()
    {
        $error['error'] = "not-found";
        $error['message'] = "Item not found";
    }


}