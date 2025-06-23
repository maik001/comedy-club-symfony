<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;

class Show {
    public const DATE_FORMAT = 'Y-m-d';
    public const TIME_FORMAT = 'G:i';

    private int $id;

    private DateTime $date;

    /** Show start time */
    private DateTime $time;

    private string $name;

    private string $description;

    /**
     * Participant comedians.
     * @var Comedian[]
     */
    private $participants;

    /**
     * @param Comedian[] $participants Participant comedians.
    */
    public static function create(int $id, string $date, string $time, string $name, string $description, array $participants): self {
        $show = new Show();
        $show->id = $id;
        $show->date = DateTime::createFromFormat(self::DATE_FORMAT, $date);
        $show->time = DateTime::createFromFormat(self::TIME_FORMAT, $time);
        $show->name = $name;
        $show->description = $description;
        $show->participants = $participants;
        return $show;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getDate(): DateTime {
        return $this->date;
    }

    public function getDateStr(): string {
        return $this->date->format(self::DATE_FORMAT);
    }

    public function getTime(): DateTime {
        return $this->time;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    /**
     * Get participant comedians.
     *
     * @return Comedian[]
     */
    public function getParticipants()
    {
        return $this->participants;
    }
}