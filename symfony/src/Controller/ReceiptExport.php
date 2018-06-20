<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 20/06/2018
 * Time: 16:35
 */

namespace App\Controller;

use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Bundle\SnappyBundle\KnpSnappyBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ReceiptExport extends Controller
{
    public function pdfAction()
    {
        $html = $this->renderView('base.html.twig', array(
            'some'  => $var
        ));

        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'file.pdf'
        );
    }
}