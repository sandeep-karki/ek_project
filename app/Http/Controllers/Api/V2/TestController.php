<?php
/**
 * Created by PhpStorm.
 * User: samina
 * Date: 12/14/16
 * Time: 4:15 PM
 */

namespace App\Http\Controllers\Api\V2;

use App\Exceptions\Api\ItemNotFoundException;
use App\Exceptions\Api\ParserException;
use App\Http\Controllers\ControllerBoilerPlate\ControllerInterface;
use App\Services\Api\ArticleService;
use App\Services\ConstantStatusService;
use App\Transformers\ArticleTransformer;
use League\Fractal\Manager;
use Mockery\Exception;
use validator;
use Config;
use DB;
use Illuminate\Http\Request;
use EkParser;
use Input;

class TestController extends ApiController implements ControllerInterface
{
    /**
     * @var ArticleTransformer
     */
    private $articleTransformer,$articleService;


    /**
     * TestController constructor.
     * @param ArticleService $articleService
     * @param Manager        $fractal
     */
    public function __construct(ArticleService $articleService,Manager $fractal)
    {
        parent::__construct($fractal);
        $this->articleTransformer = new ArticleTransformer();
        $this->articleService = $articleService;
    }

    /**
     * @return api|\Illuminate\Http\Response
     */
    public function index() {

        $articles = $this->articleService->getAllArticles();

        return $this->respondWithCollection($articles,new ArticleTransformer,'articles');
    }


    /**
     * @param int $id
     * @return api|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->articleService->findById($id);
        return $this->respondWithItem($article,new ArticleTransformer,'articles');
    }


    /**
     * @param Request $request
     * @return api|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Response
     */
    public function store(Request $request)
    {

        try {
            $data = EkParser::get("data.attributes");
            $relationshipExists = EkParser::contain("data.relationships.categories.data.:first");
            $relationship = EkParser::get("data.relationships.categories.data");
            $relationshipIds = EkParser::getKeyVal($relationship,'id');

        } catch (ParserException $e) {
            return $this->errorInternalError($e->getMessage());
        }

        $rules = Config::get("ValidationBoilerPlate.article.validation_rules");

               $validator = $this->validatePayload($data,$rules);

        if($validator !== null) {
            return $this->errorUnprocessableMultipleEntity($validator);
        }

        try{
            DB::beginTransaction();
            $article = $this->articleService->store($data);
            if($relationshipExists)
                $article->categories()->attach($relationshipIds);

            DB::commit();
        }catch (Exception $e) {
            DB::rollback();
            $this->errorInternalError($e->getMessage());
        }

        return $this->respondWithItem($article,new ArticleTransformer,'articles');

    }


    /**
     * @param Request $request
     * @param int     $id
     * @return api|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Response
     */
    public function update(Request $request,$id)
    {

        try {
            $data = EkParser::get("data.attributes");
        } catch (ParserException $e) {
            return $this->errorInternalError($e->getMessage());
        }

        $rules = Config::get("ValidationBoilerPlate.article.validation_rules");

        $validator = $this->validatePayload($data,$rules);

        if($validator !== null) {
            return $this->errorUnprocessableMultipleEntity($validator);
        }

        try{
            DB::beginTransaction();
            $article = $this->articleService->update($id,$data);

            DB::commit();
        }catch (ItemNotFoundException $e) {
            return $this->errorInternalError($e->getMessage(),$e->getCode());
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorInternalError($e->getMessage());
        }

        return $this->respondWithItem($article,new ArticleTransformer,'articles');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $this->articleService->deleteByID($id);
            DB::commit();
            return response()->json(
                null, ConstantStatusService::NOCONTENTSTATUS);

        }catch (\Exception $exception)
        {
            DB::rollback();
            return $this->errorInternalError($exception->getMessage());
        }

    }


    /**
     * @param $id
     * @return api|\Response
     */
    public function updateRelationship($id)
    {
        try {
            $relationship = EkParser::get("data");
            $relationshipIds = EkParser::getKeyVal($relationship,'id');
        } catch (ParserException $e) {
            return $this->errorInternalError($e->getMessage());
        }

        try{
            DB::beginTransaction();
            $article = $this->articleService->updateRelationship($id,$relationshipIds);

            DB::commit();
        }catch (ItemNotFoundException $e) {
            return $this->errorInternalError($e->getMessage(),$e->getCode());
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorInternalError($e->getMessage());
        }

        return $this->respondWithItem($article,new ArticleTransformer,'articles');

    }


}