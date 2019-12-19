<?php

// src/Entity/Album.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ApiResource(
 *     iri="http://schema.org/MusicAlbum",
 *     collectionOperations = {
 *          "get" = {
 *              "method"="GET",
 *              "path"="/album.{_format}",
 *          },
 *          "post" = {
 *              "method" = "POST",
 *              "path" = "/album.{_format}",
 *          },
 *     },
 *     itemOperations = {
 *          "get"={
 *              "method"="GET",
 *              "path"="/album/{id}.{_format}",
 *          },
 *          "put"={
 *              "method"="PUT",
 *              "path"="/album/{id}.{_format}",
 *          },
 *          "delete"={
 *              "method"="DELETE",
 *              "path"="/album/{id}.{_format}",
 *          },
 *     },
 * )
 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\column(type="string")
     * @ApiProperty(iri="http://schema.org/name")
     */
    private $title;

    /**
     * @var \DateTime|null
     * @ORM\column(type="datetime")
     * @Assert\NotNull()
     * @ApiProperty(iri="http://schema.org/datePublished")
     */
    private $releaseDate;

    /**
     * @Assert\GreaterThan(0)
     * @ORM\column(type="integer")
     * @ApiProperty(iri="http://schema.org/numTracks")
     */
    private $trackCount;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Album
     */
    public function setTitle($title): Album
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getReleaseDate(): ?\DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param \DateTime $releaseDate
     *
     * @return Album
     */
    public function setReleaseDate($releaseDate): Album
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTrackCount(): ?int
    {
        return $this->trackCount;
    }

    /**
     * @param int $trackCount
     *
     * @return Album
     */
    public function setTrackCount($trackCount): Album
    {
        $this->trackCount = $trackCount;

        return $this;
    }
}