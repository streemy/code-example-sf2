<?php
namespace Tasks\ContactBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tasks\ContactBundle\Entity\Message;

/**
 * Class ContactUsController
 *
 * Contains contactAction() controller
 *
 * @package Tasks\ContactBundle\Controller
 */
class ContactUsController extends Controller
{
    /**
     * Render contact form
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction(Request $request)
    {
        $enquiry = $this->get('tasks_contact_enquiry');
        $form = $this->createForm($this->get('tasks_contact_form'), $enquiry);
        if ($request->isMethod('POST')) {
            $form->submit($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject($form->get('subject')->getData())
                    ->setFrom($form->get('email')->getData())
                    ->setBody(
                        $this->renderView(
                            'TasksContactBundle:ContactUs:mail-template.html.twig',
                            array(
                                'ip' => $request->getClientIp(),
                                'name' => $form->get('name')->getData(),
                                'email' => $form->get('email')->getData(),
                                'message' => $form->get('message')->getData()
                            )
                        ),
                        'text/html'
                    );

                $messageModel = $this->get('tasks_contact_message.model');
                $messageModel->saveMessage($enquiry);

                $this->get('mailer')->send($message);

                return $this->render('TasksContactBundle:ContactUs:success-page.html.twig', array(
                    'name' => $form->get('name')->getData(),
                    'email' => $form->get('email')->getData(),
                    'message' => $message,

                ));
            }

        }
        return $this->render('TasksContactBundle:ContactUs:contact-form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}


