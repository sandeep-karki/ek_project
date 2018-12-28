<?php
namespace App\Services\Api;


use App\Article;
use App\Exceptions\Api\ItemNotFoundException;

class ArticleService
{
    private $article;

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->article = new Article();
    }

    /**
     * @return mixed
     *
     */
    function getAllArticles()
    {
        return $this->article->paginate(50);

    }

    /**
     * @param $id
     * @return mixed
     */
    function findById($id)
    {
        return $this->article->find($id);
    }

    /**
     * @param $data
     * @return static
     */
    function store($data)
    {

        return $this->article->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     * @throws ItemNotFoundException
     */
    function update($id, $data)
    {
        $article = $this->article->find($id);
        if($article == null)
            throw new ItemNotFoundException("Item not found",404);

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
        $article = $this->article->find($id);

        if($article == null)
            throw new ItemNotFoundException("Item not found",404);

        return $article->delete();

    }

    /**
     * @param $id
     * @param $relationshipIds
     * @return mixed
     */
    function updateRelationship($id,$relationshipIds)
    {
        $article = $this->findById($id);
        if($article != null)
        {
            $article->categories()->sync($relationshipIds);
        }
        return $article;
    }

}