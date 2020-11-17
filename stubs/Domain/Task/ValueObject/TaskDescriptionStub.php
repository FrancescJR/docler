<?php
declare(strict_types=1);

namespace Cesc\Docler\Stubs\Domain\Task\ValueObject;

use Cesc\Docler\Domain\User\ValueObject\TaskDescription;

class TaskDescriptionStub
{

    public const DEFAULT_DESCRIPTION = "Schedule a meeting with the head of the department";

    /**
     * @return TaskDescription
     */
    public static function default(): TaskDescription
    {
        return new TaskDescription(self::DEFAULT_DESCRIPTION);
    }

    /**
     * @param string $description
     *
     * @return TaskDescription
     */
    public static function custom(string $description):TaskDescription
    {
        return new TaskDescription($description);
    }

}
