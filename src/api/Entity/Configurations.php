<?php

namespace Core\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Configurations
 *
 * @ORM\Table(name="configurations", indexes={@ORM\Index(name="Index_configuration_name", columns={"configname"}), @ORM\Index(name="Index_configuration_side", columns={"configside"})})
 * @ORM\Entity()
 * @ApiFilter(
 *      SearchFilter::class,
 *      properties={
 *          "configurationName": "exact",
 *          "configurationSide": "exact"
 *      }
 * )
 * @ApiResource(
 *     attributes={"order"={"configurationName": "ASC"}},
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('SuperAdmin', object)",
*               "normalization_context"={
 *                  "groups"={"get"}
 *              }
 *          },
 *          "put"={
 *              "access_control"="is_granted('SuperAdmin', object)",
 *              "denormalization_context"={
 *                  "groups"={"put"}
 *              },
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              }
 *          },
 *          "delete"={
 *              "access_control"="is_granted('SuperAdmin', object)",
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              }
 *          }
 *      },
 *      collectionOperations={
 *          "get"={
 *              "access_control"="is_granted('SuperAdmin', object)",
 *              "normalization_context"={
 *                  "groups"={"get-list"}
 *              }
 *          },
 *          "post"={
 *              "access_control"="is_granted('SuperAdmin', object)",
 *              "denormalization_context"={
 *                  "groups"={"post"}
*               },
 *              "normalization_context"={
 *                "groups"={"get"}
 *              }
 *          }
 *      }
 * )
 */
class Configurations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"get", "get-list"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="configname", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     * @Groups({"get", "post", "put", "get-list"})
     */
    private $configurationName;

    /**
     * @var string
     *
     * @ORM\Column(name="configvalue", type="string", length=5000)
     * @Assert\Length(max=5000)
     * @Groups({"get", "post", "put", "get-list"})
     */
    private $configurationValue;

    /**
     * @var string
     *
     * @ORM\Column(name="configside", type="string", length=10)
     * @Assert\NotBlank()
     * @Assert\Length(max=10)
     * @Groups({"get", "post", "put", "get-list"})
     */
    private $configurationSide;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfigurationName(): ?string
    {
        return $this->configurationName;
    }

    public function setConfigurationName(string $configurationName): self
    {
        $this->configurationName = $configurationName;

        return $this;
    }

    public function getConfigurationValue(): ?string
    {
        return $this->configurationValue;
    }

    public function setConfigurationValue(string $configurationValue): self
    {
        $this->configurationValue = $configurationValue;

        return $this;
    }

    public function getConfigurationSide(): ?string
    {
        return $this->configurationSide;
    }

    public function setConfigurationSide(string $configurationSide): self
    {
        $this->configurationSide = $configurationSide;

        return $this;
    }

}
