<?php

namespace Cekurte\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageWidget
 *
 * @ORM\Table(name="page_widget")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class PageWidget
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
     * @var \Page
     *
     * @ORM\ManyToOne(targetEntity="Page")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $page;

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
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="\Cekurte\PageBundle\Entity\PageWidgetCustomField", mappedBy="widget")
     */
    private $widgetCustomField;

    /**
     * Construct
     */
    public function __construct(Page $page, PageWidgetType $widgetType)
    {
        $this
            ->setPage($page)
            ->setWidgetType($widgetType)
        ;

        $this->widgetCustomField = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->setActive(true);
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
     * Set active
     *
     * @param boolean $active
     * @return PageWidget
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set page
     *
     * @param \Cekurte\PageBundle\Entity\Page $page
     * @return PageWidget
     */
    public function setPage(\Cekurte\PageBundle\Entity\Page $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Cekurte\PageBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set widgetType
     *
     * @param \Cekurte\PageBundle\Entity\PageWidgetType $widgetType
     * @return PageWidget
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
     * @return PageWidget
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
