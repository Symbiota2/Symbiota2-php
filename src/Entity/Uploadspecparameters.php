<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadspecparameters
 *
 * @ORM\Table(name="uploadspecparameters", indexes={@ORM\Index(name="FK_uploadspecparameters_coll", columns={"CollID"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploadspecparametersRepository")
 */
class Uploadspecparameters
{
    /**
     * @var int
     *
     * @ORM\Column(name="uspid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uspid;

    /**
     * @var \Omcollections
     *
     * @ORM\ManyToOne(targetEntity="Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CollID", referencedColumnName="CollID")
     * })
     */
    private $collid;

    /**
     * @var int
     *
     * @ORM\Column(name="UploadType", type="integer", nullable=false, options={"default"="1","unsigned"=true,"comment"="1 = Direct; 2 = DiGIR; 3 = File"})
     */
    private $uploadtype = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Platform", type="string", length=45, nullable=true, options={"default"="1","comment"="1 = MySQL; 2 = MSSQL; 3 = ORACLE; 11 = MS Access; 12 = FileMaker"})
     */
    private $platform = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="server", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $server = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="port", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $port = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="driver", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $driver = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Code", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $code = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Path", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $path = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PkField", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $pkfield = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Username", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $username = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Password", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $password = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="SchemaName", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $schemaname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="QueryStr", type="string", length=2000, nullable=true, options={"default"=NULL})
     */
    private $querystr = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cleanupsp", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $cleanupsp = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="dlmisvalid", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $dlmisvalid = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getUspid(): ?int
    {
        return $this->uspid;
    }

    public function getUploadtype(): ?int
    {
        return $this->uploadtype;
    }

    public function setUploadtype(int $uploadtype): self
    {
        $this->uploadtype = $uploadtype;

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

    public function getPkfield(): ?string
    {
        return $this->pkfield;
    }

    public function setPkfield(?string $pkfield): self
    {
        $this->pkfield = $pkfield;

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

    public function getSchemaname(): ?string
    {
        return $this->schemaname;
    }

    public function setSchemaname(?string $schemaname): self
    {
        $this->schemaname = $schemaname;

        return $this;
    }

    public function getQuerystr(): ?string
    {
        return $this->querystr;
    }

    public function setQuerystr(?string $querystr): self
    {
        $this->querystr = $querystr;

        return $this;
    }

    public function getCleanupsp(): ?string
    {
        return $this->cleanupsp;
    }

    public function setCleanupsp(?string $cleanupsp): self
    {
        $this->cleanupsp = $cleanupsp;

        return $this;
    }

    public function getDlmisvalid(): ?int
    {
        return $this->dlmisvalid;
    }

    public function setDlmisvalid(?int $dlmisvalid): self
    {
        $this->dlmisvalid = $dlmisvalid;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getCollid(): ?Omcollections
    {
        return $this->collid;
    }

    public function setCollid(?Omcollections $collid): self
    {
        $this->collid = $collid;

        return $this;
    }


}
