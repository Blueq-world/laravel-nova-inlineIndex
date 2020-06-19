# Add InlineIndex to your nova resources

This package allows you to update a text field or number field of a resource in the index view (inline edit).

## Usage

```php
use Ncus\InlineIndex\InlineIndex;

InlineIndex::make('name')
          ->options([
              'event' => 'blur',
              'type' => 'text',
          ])->rules('required');
```
Note: event default keyup.enter, type default text
