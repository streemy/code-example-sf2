<?php

namespace Tasks\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tasks\ContactBundle\Entity\Message
 *
 * @ORM\Entity
 * @ORM\Table(name="messages")
 * @ORM\Entity(repositoryClass="Example\ContactUsBundle\Repository\MessageRepository")
 */
class Message
{
    /**
     * @var $id
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *  @var $name
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     *  @var $email
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $email;

    /**
     *  @var $subject
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $subject;

    /**
     *  @var $message
     *
     * @ORM\Column(type="text", length=500)
     */
    protected $message;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Message
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Message
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return Message
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }
}
