<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu", indexes={@ORM\Index(name="IDX_D28E2E1EEC93897", columns={"menu_parent"})})
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="css", type="string", length=255, nullable=true)
     */
    private $css;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=255, nullable=true)
     */
    private $style;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_option", type="integer", nullable=true)
     */
    private $orderOption;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo", type="integer", nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="status_option", type="string", nullable=true)
     */
    private $statusOption;

    /**
     * @var string
     *
     * @ORM\Column(name="default_option", type="string", length=255, nullable=true)
     */
    private $defaultOption;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @var \Menu
     *
     * @ORM\ManyToOne(targetEntity="Menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menu_parent", referencedColumnName="id")
     * })
     */
    private $menuParent;



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
     *
     * @return Menu
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
     * Set path
     *
     * @param string $path
     *
     * @return Menu
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set css
     *
     * @param string $css
     *
     * @return Menu
     */
    public function setCss($css)
    {
        $this->css = $css;

        return $this;
    }

    /**
     * Get css
     *
     * @return string
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * Set style
     *
     * @param string $style
     *
     * @return Menu
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Menu
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
     * Set description
     *
     * @param string $description
     *
     * @return Menu
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
     * Set label
     *
     * @param string $label
     *
     * @return Menu
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set orderOption
     *
     * @param integer $orderOption
     *
     * @return Menu
     */
    public function setOrderOption($orderOption)
    {
        $this->orderOption = $orderOption;

        return $this;
    }

    /**
     * Get orderOption
     *
     * @return integer
     */
    public function getOrderOption()
    {
        return $this->orderOption;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     *
     * @return Menu
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set statusOption
     *
     * @param string $statusOption
     *
     * @return Menu
     */
    public function setStatusOption($statusOption)
    {
        $this->statusOption = $statusOption;

        return $this;
    }

    /**
     * Get statusOption
     *
     * @return string
     */
    public function getStatusOption()
    {
        return $this->statusOption;
    }

    /**
     * Set defaultOption
     *
     * @param string $defaultOption
     *
     * @return Menu
     */
    public function setDefaultOption($defaultOption)
    {
        $this->defaultOption = $defaultOption;

        return $this;
    }

    /**
     * Get defaultOption
     *
     * @return string
     */
    public function getDefaultOption()
    {
        return $this->defaultOption;
    }

    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return Menu
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set menuParent
     *
     * @param \AppBundle\Entity\Menu $menuParent
     *
     * @return Menu
     */
    public function setMenuParent(\AppBundle\Entity\Menu $menuParent = null)
    {
        $this->menuParent = $menuParent;

        return $this;
    }

    /**
     * Get menuParent
     *
     * @return \AppBundle\Entity\Menu
     */
    public function getMenuParent()
    {
        return $this->menuParent;
    }
}
