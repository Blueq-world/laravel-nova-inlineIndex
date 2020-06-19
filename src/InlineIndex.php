<?php

namespace Ncus\InlineIndex;

use Laravel\Nova\Fields\Field;

class InlineIndex extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'InlineIndex';

    public $event = 'keyup.enter';

    public $type = 'text';

     /**
     * Set the event and type options.
     	$options = ['event' => keyup.enter, 'type' => 'text']
     *
     * @param  array  $options
     * @return $this
     */
    public function options(array $options)
    {
        return $this->withMeta($options);
    }
}
