<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;

final class CaseStudyService
{
    public static array $metaKeys = [
        'client_name',
        'project_features',
        'client_overview',
        'project_features',
        'project_goals',
        'project_results',
        'client',
    ];

    public static function getMeta(?int $postID = null): Collection
    {
        if (empty($postID)) {
            $postID = get_the_ID();
        }

        return collect(get_post_meta($postID))
            ->only(self::$metaKeys)
            ->filter(fn (array $item) => ! empty($item[0]))
            ->map(fn (array $item) => $item[0]);
    }
}
