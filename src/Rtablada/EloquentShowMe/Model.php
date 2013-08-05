<?php namespace Rtablada\EloquentShowMe;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
	protected $includeInToArray = array();

	/**
	 * Convert the model's attributes to an array.
	 *
	 * @return array
	 */
	public function attributesToArray()
	{
		$attributes = $this->getArrayableAttributes();

		// We want to spin through all the mutated attributes for this model and call
		// the mutator for the attribute. We cache off every mutated attributes so
		// we don't have to constantly check on attributes that actually change.
		foreach ($this->getMutatedAttributes() as $key)
		{
			if (array_key_exists($key, $attributes)) {
				$attributes[$key] = $this->mutateAttribute($key, $attributes[$key]);
			}

			if (in_array($key, $this->includeInArray)) {
				$attributes[$key] = $this->mutateAttribute($key, null);
			}
		}

		return $attributes;
	}
}
