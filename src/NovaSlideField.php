<?php

namespace Human018\NovaSlideField;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\SupportsDependentFields;

class NovaSlideField extends Field
{
    use SupportsDependentFields;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-slide-field';

    /**
     * Set the minimum value, defaults to 0
     * @param float $min
     * @return NovaSlideField
     */
    public function min(float $min)
    {
        return $this->withMeta(['min' => $min]);
    }

    /**
     * Set the maximum value, defaults to 100
     * @param float $max
     * @return NovaSlideField
     */
    public function max(float $max)
    {
        return $this->withMeta(['max' => $max]);
    }

    /**
     * Set the interval of which the slider should increment/decrement, default is 1
     * @param float $step
     * @return NovaSlideField
     */
    public function step(float $step)
    {
        return $this->withMeta(['step' => $step]);
    }
}
