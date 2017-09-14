<?php

namespace Modules\Users\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getHomePage()
	{
		return view('users::edit');
	}

	/**
	 * @param Request $request
	 *
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function postEditUser(Request $request)
	{
		$validator = Validator::make( $request->all(), [
			'old_password' => 'required|string|min:6',
			'password' => 'required|string|min:6|confirmed',
		]);

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}

		$user = $request->user();

		if (\Hash::check($request->get('password'), $user->password))
		{
			$user->password = $request->get('password');
			$user->save();
			return redirect()->back();
		} else {
			return redirect()
				->back()
				->withErrors(
					[
						'old_password' => 'Wrong password'
					]
				)->withInput();
		}
	}
}