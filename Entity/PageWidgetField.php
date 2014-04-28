<?php

namespace Cekurte\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * PageWidgetField
 *
 * @ORM\Table(name="page_widget_field")
 * @ORM\Entity
 */
class PageWidgetField
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
     * @Gedmo\Slug(fields={"title"}, updatable=false, separator="_")
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var \PageWidgetType
     *
     * @ORM\ManyToOne(targetEntity="PageWidgetType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page_widget_type_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $widgetType;

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
     * @ORM\OneToMany(targetEntity="\Cekurte\PageBundle\Entity\PageWidgetCustomField", mappedBy="widget")
     */
    private $widgetCustomField;

    /**
     * Construct
     */
    public function __construct(PageWidgetType $widgetType, $title, $description = null)
    {
        $this
            ->setWidgetType($widgetType)
            ->setTitle($title)
            ->setDescription($description)
        ;

        $this->widgetCustomField = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set slug
     *
     * @param string $slug
     * @return PageWidgetField
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return PageWidgetField
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
     * @return PageWidgetField
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
     * Set widgetType
     *
     * @param \Cekurte\PageBundle\Entity\PageWidgetType $widgetType
     * @return PageWidgetField
     */
    public function setWidgetType(\Cekurte\PageBundle\Entity\PageWidgetType $widgetType)
    {
        $this->widgetType = $widgetType;

        return $this;
    }

    /**
     * Get widgetType
     *
     * @return \Cekurte\PageBundle\Entity\PageWidgetType
     */
    public function getWidgetType()
    {
        return $this->widgetType;
    }

    /**
     * Add widgetCustomField
     *
     * @param \Cekurte\PageBundle\Entity\PageWidgetCustomField $widgetCustomField
     * @return PageWidgetField
     */
    public function addWidgetCustomField(\Cekurte\PageBundle\Entity\PageWidgetCustomField $widgetCustomField)
    {
        $this->widgetCustomField[] = $widgetCustomField;

        return $this;
    }

    /**
     * Remove widgetCustomField
     *
     * @param \Cekurte\PageBundle\Entity\PageWidgetCustomField $widgetCustomField
     */
    public function removeWidgetCustomField(\Cekurte\PageBundle\Entity\PageWidgetCustomField $widgetCustomField)
    {
        $this->widgetCustomField->removeElement($widgetCustomField);
    }

    /**
     * Get widgetCustomField
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWidgetCustomField()
    {
        return $this->widgetCustomField;
    }
}
