<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UploadParameters
 *
 * @ORM\Table(name="uploadspecparameters", indexes={@ORM\Index(name="FK_uploadspecparameters_coll", columns={"CollID"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploadParametersRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class UploadParameters implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="uspid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Collections
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CollID", referencedColumnName="CollID")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $collectionId;

    /**
     * @var int
     *
     * @ORM\Column(name="UploadType", type="integer", options={"default"="1","unsigned"=true,"comment"="1 = Direct; 2 = DiGIR; 3 = File"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $uploadType = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Platform", type="string", length=45, nullable=true, options={"comment"="1 = MySQL; 2 = MSSQL; 3 = ORACLE; 11 = MS Access; 12 = FileMaker"})
     * @Assert\Length(max=45)
     */
    private $platform;

    /**
     * @var string|null
     *
     * @ORM\Column(name="server", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $server;

    /**
     * @var int|null
     *
     * @ORM\Column(name="port", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $port;

    /**
     * @var string|null
     *
     * @ORM\Column(name="driver", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $driver;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Code", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Path", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $path;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PkField", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $primaryKeyField;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Username", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Password", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SchemaName", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $schemaName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="QueryStr", type="string", length=2000, nullable=true)
     * @Assert\Length(max=2000)
     */
    private $queryString;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cleanupsp", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $postUploadProcedure;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dlmisvalid", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $isValid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUploadType(): ?int
    {
        return $this->uploadType;
    }

    public function setUploadType(int $uploadType): self
    {
        $this->uploadType = $uploadType;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(?string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getServer(): ?string
    {
        return $this->server;
    }

    public function setServer(?string $server): self
    {
        $this->server = $server;

        return $this;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function setPort(?int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getDriver(): ?string
    {
        return $this->driver;
    }

    public function setDriver(?string $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getPrimaryKeyField(): ?string
    {
        return $this->primaryKeyField;
    }

    public function setPrimaryKeyField(?string $primaryKeyField): self
    {
        $this->primaryKeyField = $primaryKeyField;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSchemaName(): ?string
    {
        return $this->schemaName;
    }

    public function setSchemaName(?string $schemaName): self
    {
        $this->schemaName = $schemaName;

        return $this;
    }

    public function getQueryString(): ?string
    {
        return $this->queryString;
    }

    public function setQueryString(?string $queryString): self
    {
        $this->queryString = $queryString;

        return $this;
    }

    public function getPostUploadProcedure(): ?string
    {
        return $this->postUploadProcedure;
    }

    public function setPostUploadProcedure(?string $postUploadProcedure): self
    {
        $this->postUploadProcedure = $postUploadProcedure;

        return $this;
    }

    public function getIsValid(): ?int
    {
        return $this->isValid;
    }

    public function setIsValid(?int $isValid): self
    {
        $this->isValid = $isValid;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getCollectionId(): ?Collections
    {
        return $this->collectionId;
    }

    public function setCollectionId(?Collections $collectionId): self
    {
        $this->collectionId = $collectionId;

        return $this;
    }


}
