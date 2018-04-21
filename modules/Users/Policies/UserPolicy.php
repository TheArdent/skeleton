<?php

namespace Modules\Users\Policies;

use Modules\Users\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
	use HandlesAuthorization;

	/**
	 * @param User   $user
	 * @param string $ability
	 *
	 * @return bool
	 */
	public function before(User $user, $ability, User $item)
	{
		return true;
	}

	/**
	 * @param User $user
	 * @param User $item
	 *
	 * @return bool
	 */
	public function display(User $user, User $item)
	{
		return true;
	}

	/**
	 * @param User $user
	 * @param User $item
	 *
	 * @return bool
	 */
	public function create(User $user, User $item)
	{
		return true;
	}

	/**
	 * @param User $user
	 * @param User $item
	 *
	 * @return bool
	 */
	public function edit(User $user, User $item)
	{
		return true;
	}

	/**
	 * @param User $user
	 * @param User $item
	 *
	 * @return bool
	 */
	public function delete(User $user, User $item)
	{
		return true;
	}

	/**
	 * @param User $user
	 * @param User $item
	 *
	 * @return bool
	 */
	public function restore(User $user, User $item)
	{
		return true;
	}
}
