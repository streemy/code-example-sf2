<?php
namespace Tasks\ContactBundle\Model;

use Symfony\Component\DependencyInjection\Container;
use Tasks\ContactBundle\Entity\Message;

class MessageModel {

    private $container;

    /**
     * set service container
     *
     * @param Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    /**
     * save message in to DB
     *
     * @param Message $enquiry
     */
    public function saveMessage(Message $enquiry)
    {
        $em = $this->container->get('doctrine')->getManager();
        $em->persist($enquiry);
        $em->flush();
    }

}