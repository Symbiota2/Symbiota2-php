<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadspecparameters
 *
 * @ORM\Table(name="uploadspecparameters", indexes={@ORM\Index(name="FK_uploadspecparameters_coll", columns={"CollID"})})
 * @ORM\Entity
 */
class Uploadspecparameters
{
    /**
     * @var int
     *
     * @ORM\Column(name="uspid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uspid;

    /**
     * @var int
     *
     * @ORM\Column(name="UploadType", type="integer", precision=0, scale=0, nullable=false, options={"default"="1","unsigned"=true,"comment"="1 = Direct; 2 = DiGIR; 3 = File"}, unique=false)
     */
    private $uploadtype = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Platform", type="string", length=45, precision=0, scale=0, nullable=true, options={"default"="1","comment"="1 = MySQL; 2 = MSSQL; 3 = ORACLE; 11 = MS Access; 12 = FileMaker"}, unique=false)
     */
    private $platform = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="server", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $server;

    /**
     * @var int|null
     *
     * @ORM\Column(name="port", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $port;

    /**
     * @var string|null
     *
     * @ORM\Column(name="driver", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $driver;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Code", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Path", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $path;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PkField", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $pkfield;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Username", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Password", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SchemaName", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $schemaname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="QueryStr", type="string", length=2000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $querystr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cleanupsp", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $cleanupsp;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dlmisvalid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $dlmisvalid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omcollections
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CollID", referencedColumnName="CollID", nullable=true)
     * })
     */
    private $collid;


    /**
     * Get uspid.
     *
     * @return int
     */
    public function getUspid()
    {
        return $this->uspid;
    }

    /**
     * Set uploadtype.
     *
     * @param int $uploadtype
     *
     * @return Uploadspecparameters
     */
    public function setUploadtype($uploadtype)
    {
        $this->uploadtype = $uploadtype;

        return $this;
    }

    /**
     * Get uploadtype.
     *
     * @return int
     */
    public function getUploadtype()
    {
        return $this->uploadtype;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Uploadspecparameters
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set platform.
     *
     * @param string|null $platform
     *
     * @return Uploadspecparameters
     */
    public function setPlatform($platform = null)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform.
     *
     * @return string|null
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Set server.
     *
     * @param string|null $server
     *
     * @return Uploadspecparameters
     */
    public function setServer($server = null)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Get server.
     *
     * @return string|null
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set port.
     *
     * @param int|null $port
     *
     * @return Uploadspecparameters
     */
    public function setPort($port = null)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get port.
     *
     * @return int|null
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set driver.
     *
     * @param string|null $driver
     *
     * @return Uploadspecparameters
     */
    public function setDriver($driver = null)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Get driver.
     *
     * @return string|null
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * Set code.
     *
     * @param string|null $code
     *
     * @return Uploadspecparameters
     */
    public function setCode($code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set path.
     *
     * @param string|null $path
     *
     * @return Uploadspecparameters
     */
    public function setPath($path = null)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path.
     *
     * @return string|null
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set pkfield.
     *
     * @param string|null $pkfield
     *
     * @return Uploadspecparameters
     */
    public function setPkfield($pkfield = null)
    {
        $this->pkfield = $pkfield;

        return $this;
    }

    /**
     * Get pkfield.
     *
     * @return string|null
     */
    public function getPkfield()
    {
        return $this->pkfield;
    }

    /**
     * Set username.
     *
     * @param string|null $username
     *
     * @return Uploadspecparameters
     */
    public function setUsername($username = null)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password.
     *
     * @param string|null $password
     *
     * @return Uploadspecparameters
     */
    public function setPassword($password = null)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set schemaname.
     *
     * @param string|null $schemaname
     *
     * @return Uploadspecparameters
     */
    public function setSchemaname($schemaname = null)
    {
        $this->schemaname = $schemaname;

        return $this;
    }

    /**
     * Get schemaname.
     *
     * @return string|null
     */
    public function getSchemaname()
    {
        return $this->schemaname;
    }

    /**
     * Set querystr.
     *
     * @param string|null $querystr
     *
     * @return Uploadspecparameters
     */
    public function setQuerystr($querystr = null)
    {
        $this->querystr = $querystr;

        return $this;
    }

    /**
     * Get querystr.
     *
     * @return string|null
     */
    public function getQuerystr()
    {
        return $this->querystr;
    }

    /**
     * Set cleanupsp.
     *
     * @param string|null $cleanupsp
     *
     * @return Uploadspecparameters
     */
    public function setCleanupsp($cleanupsp = null)
    {
        $this->cleanupsp = $cleanupsp;

        return $this;
    }

    /**
     * Get cleanupsp.
     *
     * @return string|null
     */
    public function getCleanupsp()
    {
        return $this->cleanupsp;
    }

    /**
     * Set dlmisvalid.
     *
     * @param int|null $dlmisvalid
     *
     * @return Uploadspecparameters
     */
    public function setDlmisvalid($dlmisvalid = null)
    {
        $this->dlmisvalid = $dlmisvalid;

        return $this;
    }

    /**
     * Get dlmisvalid.
     *
     * @return int|null
     */
    public function getDlmisvalid()
    {
        return $this->dlmisvalid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Uploadspecparameters
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set collid.
     *
     * @param \App\Entities\Omcollections|null $collid
     *
     * @return Uploadspecparameters
     */
    public function setCollid(\App\Entities\Omcollections $collid = null)
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * Get collid.
     *
     * @return \App\Entities\Omcollections|null
     */
    public function getCollid()
    {
        return $this->collid;
    }
}
