<?php

namespace {

from('Application')
-> import('Controller.Generic');

}

namespace Application\Controller {

class Video extends Generic {

    public function DefaultAction ( ) {

        $this->view->addOverlay('hoa://Application/View/Video/Video.xyl');
        $this->render();

        return;
    }

    public function PraspelAction ( )  {

        $this->view->addOverlay('hoa://Application/View/Video/Praspel.xyl');
        $this->render();

        return;
    }

    public function PopcodeAction ( )  {

        $this->view->addOverlay('hoa://Application/View/Video/Popcode.xyl');
        $this->render();

        return;
    }
}

}
