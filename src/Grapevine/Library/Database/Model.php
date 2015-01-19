<?php
namespace FloatingPoint\Grapevine\Library\Database;

use Eloquence\Database\Traits\CamelCaseModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
	use CamelCaseModel;
}
