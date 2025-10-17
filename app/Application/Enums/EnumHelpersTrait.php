<?php

namespace App\Application\Enums;

trait EnumHelpersTrait
{
    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function selectOptions(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = __('enum_labels.' . $case->value);
        }
        return $options;
    }

    public function label(): string
    {
        if (!$this->value) {
            return 'n/a';
        }

        return __('enum_labels.' . $this->value);
    }

    public function is(self $option): bool
    {
        return $this === $option;
    }
}
