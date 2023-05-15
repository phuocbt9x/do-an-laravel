<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class BannerPosition extends Enum
{
    const BannerTop = 1;
    const BannerLeft = 2;
    const BannerRight = 3;
}
