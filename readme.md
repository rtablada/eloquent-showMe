Installation
========================

In your `composer.json` include `rtablada/eloquent-show-me`. Then in your `app/config/app.php`, you can change your `Eloquent` alias to `Rtablada\EloquentShowMe\Model`.

Use
========================

Adding a `$includeInToArray` array will tell Eloquent to always include those mutated attributes in any `toArray` or `toJson` calls.


Example
========================

```php

class Sprite extends \Rtablada\EloquentShowMe\Model
{
	$includeInToArray = array(
		'photoUrl'
	);
}
