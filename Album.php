<?php

class Album
{
    const OWNER = 'iO Academy';

    // Properties
    private int $id;
    private string $name;
    private string $release_date;
    private string $album_or_single;
    private ?string $link_to_image;
    private string $reason_for_inclusion;
    private ?string $artists;

    public function __construct(
        int $id, string $name, string $release_date, string $album_or_single, ?string $link_to_image,
        string $reason_for_inclusion, ?string $artists
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->release_date = $release_date;
        $this->album_or_single = $album_or_single;
        $this->link_to_image = $link_to_image;
        $this->reason_for_inclusion = $reason_for_inclusion;
        $this->artists = $artists;
    }

    // Methods

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    /**
     * @param string $release_date
     */
    public function setReleaseDate(string $release_date): void
    {
        $this->release_date = $release_date;
    }

    /**
     * @return string
     */
    public function getAlbumOrSingle(): string
    {
        return $this->album_or_single;
    }

    /**
     * @param string $album_or_single
     */
    public function setAlbumOrSingle(string $album_or_single): void
    {
        $this->album_or_single = $album_or_single;
    }

    /**
     * @return string
     */
    public function getLinkToImage(): string
    {
        return $this->link_to_image;
    }

    /**
     * @param string $link_to_image
     */
    public function setLinkToImage(string $link_to_image): void
    {
        $this->link_to_image = $link_to_image;
    }

    /**
     * @return string
     */
    public function getReasonForInclusion(): string
    {
        return $this->reason_for_inclusion;
    }

    /**
     * @param string $reason_for_inclusion
     */
    public function setReasonForInclusion(string $reason_for_inclusion): void
    {
        $this->reason_for_inclusion = $reason_for_inclusion;
    }

    /**
     * @return string|null
     */
    public function getArtists(): ?string
    {
        return $this->artists;
    }

    /**
     * @param string|null $artists
     */
    public function setArtists(?string $artists): void
    {
        $this->artists = $artists;
    }




}

