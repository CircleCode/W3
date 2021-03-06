<?php

namespace {

from('Application')
-> import('Controller.Generic');

}

namespace Application\Controller {

class Index extends Generic {

    public function DefaultAction ( )  {

        $blogApi = $this->router->unroute('b') . 'api/posts?limit=5';

        if(false !== $json = @file_get_contents($blogApi))
            if(null !== $handle = json_decode($json, true))
                $this->data->blog = $handle;

        $this->view->addOverlay('hoa://Application/View/Welcome.xyl');
        $this->render();

        return;
    }

    public function SourceAction ( ) {

        $this->view->addOverlay('hoa://Application/View/Source.xyl');
        $this->render();

        return;
    }

    public function AboutAction ( ) {

        $this->view->addOverlay('hoa://Application/View/About.xyl');
        $this->render();

        return;
    }

    public function ContactAction ( ) {

        $this->view->addOverlay('hoa://Application/View/Contact.xyl');
        $this->render();

        return;
    }

    public function WhouseAction ( $who ) {

        $this->view->addOverlay('hoa://Application/View/Whouse/' . ucfirst($who) . '.xyl');
        $this->render();

        return;
    }

    public function ProjectAction ( ) {

        $this->view->addOverlay('hoa://Application/View/Project.xyl');
        $this->render();

        return;
    }

    public function ErrorAction ( \Hoa\Core\Exception $exception ) {

        switch(get_class($exception)) {

            case 'Hoa\Router\Exception\NotFound':
                $this->view->getOutputStream()->sendStatus(
                    \Hoa\Http\Response::STATUS_NOT_FOUND
                );
              break;

            default:
                $this->view->getOutputStream()->sendStatus(
                    \Hoa\Http\Response::STATUS_INTERNAL_SERVER_ERROR
                );
        }

        $this->view->addOverlay('hoa://Application/View/Error.xyl');
        $this->render();

        return;
    }
}

}
