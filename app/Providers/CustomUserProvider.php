<?php

namespace App\Providers;

use App\Lib\Traits\Log\CustomLogger;
use App\User;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Log;

class CustomUserProvider extends EloquentUserProvider
{
	/**
	 * Create a new database user provider.
	 *
	 * @param  \Illuminate\Contracts\Hashing\Hasher $hasher
	 * @param  string                               $model
	 *
	 * @return  void
	 */
	public function __construct(HasherContract $hasher, $model)
	{
		parent::__construct($hasher, $model);
	}

	/**
	 * Validate a user against the given credentials.
	 *
	 * @param  \Illuminate\Contracts\Auth\Authenticatable $user
	 * @param  array                                      $credentials
	 *
	 * @return  bool
	 */
	public function validateCredentials(UserContract $user, array $credentials)
	{
		$plain = $credentials['password'];

		if ($this->isMD5($user->getAuthPassword())) {
			if ($userModel = User::find($user->getAuthIdentifier())) {
				if ($this->checkMD5Password($plain, $userModel)) {
					$userModel->password = bcrypt($plain);
					$userModel->save();
					Log::debug('MD5 password for user ' . $userModel->username
						. ' (' . $userModel->name . ') successfully rehashed.');

					return true;
				}
			}
		}

		return $this->hasher->check($plain, $user->getAuthPassword());
	}

	/**
	 * Check if the given string looks like a MD5 hash
	 *
	 * @param  $password
	 *
	 * @return  false|int
	 */
	private function isMD5($password)
	{
		return preg_match('/^[a-f0-9]{32}$/', $password);
	}

	/**
	 * Custom method for checking passwords for our former digest authentication.
	 *
	 * @param            $plain
	 * @param  User $user
	 *
	 * @return  bool
	 */
	private function checkMD5Password($plain, User $user)
	{
		// If the old password was MD5-hashed alone, then the following would suffice:
		// return $user->password === md5($plain);

		// Our case: username:realm:password
		$hash = md5($user->username . ':' . config('app.old_realm') . ':' . $plain);

		return $hash === $user->password;
	}
}
