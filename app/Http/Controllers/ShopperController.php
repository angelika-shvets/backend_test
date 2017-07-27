<?php

namespace App\Http\Controllers;

use App\Models\ErrorsModel;
use App\Models\ShopperModel;
use App\Models\SuccessModel;
use App\Shoppers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class ShopperController extends Controller
{


    public function getIndex()
    {
        return View::make('test');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function createNewShopper(Request $request)
    {
        $model = $this->getNewShoppersModel()->loadFromArray($request->all());


        /**
         * @todo Validation Part( need add new class for validation data)
         */
        try{

        if ($this->verificationEmailExist($model)) {

            return response()->json($this->generateError($this->getErrorsModel()->getEmailExist()));
        }

        $shopper = $this->saveNewShopper($model);

        if ($shopper->id > 0) {

            $model->setId($shopper->id);

            return response()->json($this->generateSuccess($model->loadArrayFromModel($this->getSuccessModel()->getCreateNewShopper())));
        }
        }
        catch(\Exception $e){

           return response()->json($this->generateError($this->getErrorsModel()->getSystemProblem()));
        }
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function updateShopper(Request $request)
    {

        $model = $this->getNewShoppersModel()->loadFromArray($request->all());
        /**
         * Validation Part( need add new class for validation data)
         */
        try{

        $shopper = $this->saveUpdateShopper($model);

        if($shopper->id > 0){

            return response()->json($this->generateSuccess($model->loadArrayFromModel($this->getSuccessModel()->getCreateNewShopper())));

        }

        } catch(\Exception $e){

            return response()->json($this->generateError($this->getErrorsModel()->getSystemProblem()));
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function getShopperById(Request $request,$id) {

        $model = $this->getNewShoppersModel();

        $model->setId($id);
        /**
         * Validation Part( need add new class for validation data)
         */
        try{

            $shopper = $this->getShopper($model);

            if($shopper->id > 0){

                $model->loadModelFromPDOModel($shopper);

                return response()->json($this->generateSuccess($model->loadArrayFromModel($this->getSuccessModel()->getGetShopper())));

            }
            return response()->json($this->generateError($this->getErrorsModel()->getShopperNotExist()));

        } catch(\Exception $e){

            return response()->json($this->generateError($this->getErrorsModel()->getSystemProblem()));
        }

    }
    /**
     * @param ShopperModel $model
     * @return Shoppers
     */
    private function saveNewShopper($model){

        $shopper = $this->getNewPDOShoppersModel();

        $shopper = $model->loadPDOModelFromModel($shopper);

        $shopper->save();

        return $shopper;

    }
    /**
     * @param ShopperModel $model
     * @return Shoppers
     */
    private function saveUpdateShopper($model){

        $shopper = $this->getNewPDOShoppersModel();

        $shopper = $shopper::find($model->getId());

        $shopper = $model->loadPDOModelFromModel($shopper);

        $shopper->update();

        $shopper->save();

        return $shopper;

    }
    /**
     * @param ShopperModel $model
     * @return integer
     */
    private function verificationEmailExist($model){

        $shopper = $this->getNewPDOShoppersModel();

        return  $shopper::where('email', '=', $model->getEmail())->count();
        
    }
    /**
     * @param ShopperModel $model
     * @return Shoppers
     */
    private function getShopper($model){

        $shopper = $this->getNewPDOShoppersModel();

        $shopper = $shopper::find($model->getId());

        return $shopper;

    }
    /**
     * @todo need to add Factory and Registry classes and for example how I use it you can see below
     */
    /**
     * @return Shoppers
     */
    private function getNewPDOShoppersModel(){

        return new Shoppers;
    }

    /**
     * @return ShopperModel
     */
    private function getNewShoppersModel(){

        return new ShopperModel();
    }

    /**
     * @return ErrorsModel
     */
    private function getErrorsModel(){
        return new ErrorsModel();
    }

    /**
     * @return SuccessModel
     */
    private function getSuccessModel(){
        return new SuccessModel();
    }
    /**
     * @param $data
     * @return mixed
     */
    private  function generateSuccess($data){
       $data['success']= true;
       return $data;
    }
    /**
     * @param string $error
     * @return array
     */
    private  function generateError($error){

        return [
            'success' => false,
             'error' => $error
        ];
    }

    /**
     * @param $data
     * @return mixed
     */
    private  function sendJsonResponse($data){

        return response()->json($data);
    }
    public function getAll() 
    {
        return Todos::all();
    }


}
