<?php

namespace Cekurte\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageWidgetCustomField
 *
 * @ORM\Table(name="page_widget_custom_field")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class PageWidgetCustomField
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
     * @var \PageWidget
     *
     * @ORM\ManyToOne(targetEntity="PageWidget")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page_widget_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $widget;

    /**
     * @var \PageWidgetField
     *
     * @ORM\ManyToOne(targetEntity="PageWidgetField")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page_widget_field_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $widgetField;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=false)
     */
    private $value;

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
     * Set value
     *
     * @param string $value
     * @return PageWidgetCustomField
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set widget
     *
     * @param \Cekurte\PageBundle\Entity\PageWidget $widget
     * @return PageWidgetCustomField
     */
    public function setWidget(\Cekurte\PageBundle\Entity\PageWidget $widget)
    {
        $this->widget = $widget;

        return $this;
    }

    /**
     * Get widget
     *
     * @return \Cekurte\PageBundle\Entity\PageWidget
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * Set widgetField
     *
     * @param \Cekurte\PageBundle\Entity\PageWidgetField $widgetField
     * @return PageWidgetCustomField
     */
    public function setWidgetField(\Cekurte\PageBundle\Entity\PageWidgetField $widgetField)
    {
        $this->widgetField = $widgetField;

        return $this;
    }

    /**
     * Get widgetField
     *
     * @return \Cekurte\PageBundle\Entity\PageWidgetField
     */
    public function getWidgetField()
    {
        return $this->widgetField;
    }
}
