<?php

final class ControllerDevTest
{
    public function defautAction(){
        //http://localhost:8080/index.php?url=helloworld
        $O_helloworld =  new HelloworldModel();
        View::show('helloworld/HelloworldView', array('helloworld' =>  $O_helloworld->donneMessage()));
    }

    public function indexAction(){
        $O_apimodel =  new ApiModel();
        $O_apimodel->setIdCar("1493131276665295");
        View::show('index', array("batteryCharge" => $O_apimodel->batteryLevelData()["level"]));

    }

    //http://localhost:8080/index.php?url=helloworld&action=wake_up
    /**
     * @throws Exception
     */
    public function controlAction(){
        //View::show('control', array());
        $O_apimodel =  new ApiModel();
        $O_apimodel->setIdCar("1493131276665295");
        View::show('control', array("ischarging" => $O_apimodel->isCharging()));
    }

    //http://localhost:8080/index.php?url=helloworld&action=wake_up
    /**
     * @throws Exception
     */
    public function fanAction(){
        //View::show('control', array());
        $O_apimodel =  new ApiModel();
        $O_apimodel->setIdCar("1493131276665295");
        View::show('fan', array("ischarging" => $O_apimodel->isCharging()));
    }

    //http://localhost:8080/index.php?url=helloworld&action=wake_up
    /**
     * @throws Exception
     */
    public function positionAction(){
        //View::show('control', array());
        $O_apimodel =  new ApiModel();
        $O_apimodel->setIdCar("1493131276665295");
        View::show('position', array("ischarging" => $O_apimodel->isCharging()));
    }

    //http://localhost:8080/index.php?url=helloworld&action=wake_up
    /**
     * @throws Exception
     */
    public function planningAction(){
        //View::show('control', array());
        $O_apimodel =  new ApiModel();
        $O_apimodel->setIdCar("1493131276665295");
        View::show('planning', array("ischarging" => $O_apimodel->isCharging()));
    }

    //http://localhost:8080/index.php?url=helloworld&action=wake_up
    /**
     * @throws Exception
     */
    public function statsAction(){
        //View::show('control', array());
        $O_apimodel =  new ApiModel();
        $O_apimodel->setIdCar("1493131276665295");
        View::show('stats_reload', array("ischarging" => $O_apimodel->isCharging()));
    }

    public function flash_lightAction(){
        $O_apimodel =  new ApiModel();
        $O_apimodel->setIdCar("1493131276665295");
        View::show('APIresponse', array("retour" => $O_apimodel->postFlashLights()));
    }

    public function honk_hornAction(){
        $O_apimodel = new ApiModel();
        $O_apimodel->setIdCar("1493131276665295");
        View::show('APIresponse', array("retour" => $O_apimodel->postHonkHorn()));
    }

    public function control_doorsAction(){
        $O_apimodel = new ApiModel();
        $O_apimodel->setIdCar("1493131276665295");
        $O_apimodel->isVehicleLocked() ? View::show('APIresponse', array("retour" => $O_apimodel->postDoorLock())) : View::show('APIresponse', array("retour" => $O_apimodel->postDoorUnlock()));
    }
}
