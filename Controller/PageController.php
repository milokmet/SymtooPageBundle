<?php

namespace Symtoo\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symtoo\PageBundle\Entity\Page;

class PageController extends Controller
{

    public function showAction($slug)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $pageRepo = $em->getRepository('SymtooPageBundle:Page');

        $page = $pageRepo->findOneBySlug($slug);

        if (! $page instanceof Page) {
            throw new NotFoundHttpException('The current url does not exist!');
        }

        // TODO: spraviť šablónu na extend z konfigurácie alebo priamo z page
        $baseTemplate = '::base.html.twig';

        return $this->render('SymtooPageBundle:Page:show.html.twig', array('page' => $page, 'baseTemplate' => $baseTemplate));
    }
}