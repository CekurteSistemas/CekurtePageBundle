<?php

namespace Cekurte\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageWidgetType
 *
 * @ORM\Table(name="page_widget_type")
 * @ORM\Entity
 */
class PageWidgetType
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="\Cekurte\PageBundle\Entity\PageWidgetField", mappedBy="widgetType")
     */
    private $widgetField;

    /**
     * Construct
     */
    public function __construct($title, $description = null)
    {
        $this
            ->setTitle($title)
            ->setDescription($description)
        ;

        $this->widgetField = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set title
     *
     * @param string $title
     * @return PageWidgetType
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return PageWidgetType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add widgetField
     *
     * @param \Cekurte\PageBundle\Entity\PageWidgetField $widgetField
     * @return PageWidgetType
     */
    public function addWidgetField(\Cekurte\PageBundle\Entity\PageWidgetField $widgetField)
    {
        $this->widgetField[] = $widgetField;

        return $this;
    }

    /**
     * Remove widgetField
     *
     * @param \Cekurte\PageBundle\Entity\PageWidgetField $widgetField
     */
    public function removeWidgetField(\Cekurte\PageBundle\Entity\PageWidgetField $widgetField)
    {
        $this->widgetField->removeElement($widgetField);
    }

    /**
     * Get widgetField
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWidgetField()
    {
        return $this->widgetField;
    }
}
