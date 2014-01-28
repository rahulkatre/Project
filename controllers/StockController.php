<?php

class StockController extends CController
{
   public function actions()
    {
       return array(
          'wreader' => array(
          'class' => 'CWebServiceAction',
        ),
      );
    }

    /**
     * @param string username
     * @return float
     * @soap
     */
     public function getauth($uname,$jsonobj)
     {
               
            $session = Yii::app()->session;
            $session['u_id'] = 1111;
            return 1;
     }

     /**
     * @param string username,JSON
     * @return float
     * @soap
     */
     public function getemp($uname)
     {
        $session = Yii::app()->session;
        return isset($session['u_id'])?$session['u_id']:999;
     }
     
    /**
     * @return string
     * @soap
     */
     
     public function myfunction()
     {
        return "ram";
     /* header('Content-type: application/json');
      echo CJSON::encode($data);

     foreach (Yii::app()->log->routes as $route) {
        if($route instanceof CWebLogRoute) {
            $route->enabled = false; // disable any weblogroutes
        }
    } Yii::app()->end();
     */
     }
     
    /**
     * @return JSON
     * @soap
     */
     
    
     public function myfunction1() {
     	$data=array(
     	'name'=>'rahul','lastname'=>'katre'
     	);
     return CJSON::encode($data)
     	
     
     }
     
     
} 