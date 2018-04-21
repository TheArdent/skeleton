<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Modules\Users\Entities{
/**
 * Modules\Users\Entities\Permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Users\Entities\Role[] $roles
 */
	class Permission extends \Eloquent {}
}

namespace Modules\Users\Entities{
/**
 * Modules\Users\Entities\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Users\Entities\Permission[] $permissions
 */
	class Role extends \Eloquent {}
}

namespace Modules\Users\Entities{
/**
 * Modules\Users\Entities\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Users\Entities\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Users\Entities\Role[] $roles
 * @property-write mixed $password
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User wherePermissionIs($permission = '')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Entities\User whereRoleIs($role = '')
 */
	class User extends \Eloquent {}
}

